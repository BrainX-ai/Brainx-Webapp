<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Utils\ChatPDF;
use App\Models\ChatPDF as ModelsChatPDF;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAiServiceChatpdf extends Component
{
    use WithFileUploads;

    public $fileUploaded = false;
    public $pdf, $suggestions = null;

    public $listeners = [
        'upload:finished' => 'uploadDocument',
    ];

    /**
     * Validates the uploaded document and displays a success message.
     *
     * @param  string  $documentModel  The name of the document model.
     * @return void
     */
    public function uploadDocument($documentModel)
    {
        // Validate the uploaded document
        $this->validate([
            $documentModel => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
        ], [
            $documentModel . '.required' => 'The document is required',
            $documentModel . '.mimes'    => 'The document format must be either .pdf, .jpg, .jpeg or .png',
        ]);


        $this->fileUploaded = true;
        $this->suggestions = $this->getSuggestionsFromChatpdf($this->pdf->store('public'));
        // Display a success message
        // TODO: Replace this with your own code to display the success message in the view
    }

    public function render()
    {

        $chatPDFData = ModelsChatPDF::where('user_id', Auth::user()->id)->first();
        if ($chatPDFData->content != null) {
            $this->suggestions = $chatPDFData->content;
        }

        return view('livewire.create-ai-service-chatpdf');
    }

    public function getSuggestionsFromChatpdf($path)
    {

        $chatpdf = new ChatPDF();
        $chatPDFData = ModelsChatPDF::where('user_id', Auth::user()->id)->first();
        if ($chatPDFData != null) {
            $sourceId = $chatPDFData->source_id;
            if ($chatPDFData->content != null) {
                return $chatPDFData->content;
            }
        } else {
            $chatpdf->setPostFields(json_encode(array(
                'url' => 'https://test-brainx.azurewebsites.net/storage/9r0spBn2dnpukWbH5TOfwz0c83GbFXvWY76xCpNY.pdf'
                // 'url' => url('storage/' . explode('/', $path)[1])
            )));
            $response = $chatpdf->uploadFile();

            if (isset($response->sourceId)) {
                $sourceId = $response->sourceId;
            }
        }

        if (isset($sourceId) && $sourceId != null) {

            $chatpdf->setSourceId($sourceId);
            $chatpdf->setPostFields(json_encode([
                "sourceId" => $chatpdf->getSourceId(),
                "messages" => [
                    [
                        "role" => "user",
                        "content" => "Create AI or Data Science services that I can sell to business clients"
                    ]
                ]
            ]));
            $response = $chatpdf->sendMessage();

            if ($chatPDFData) {
                $chatPDFData->content = $response->content;
                $chatPDFData->save();
            } else {
                ModelsChatPDF::create([
                    'user_id' => Auth::user()->id,
                    'source_id' => $chatpdf->getSourceId(),
                    'content' => $response->content
                ]);
            }

            return $response->content;
        } else {
            return 'Something went wrong ' . url($path);
        }
    }
}
