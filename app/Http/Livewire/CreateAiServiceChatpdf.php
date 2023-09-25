<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Utils\ChatPDF;
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
        // $this->suggestions = $this->getSuggestionsFromChatpdf($this->pdf->store('resumes'));
        // Display a success message
        // TODO: Replace this with your own code to display the success message in the view
    }

    public function render()
    {

        return view('livewire.create-ai-service-chatpdf');
    }

    public function getSuggestionsFromChatpdf($path)
    {
        $path = 'https://test-brainx.azurewebsites.net/resumes/21680031331.pdf';
        // dd($path);
        $chatpdf = new ChatPDF();
        $chatpdf->setPostFields(json_encode(array(
            'url' => $path
        )));
        $response = $chatpdf->uploadFile();

        $chatpdf->setSourceId($response->sourceId);
        $chatpdf->setPostFields(json_encode([
            "sourceId" => $chatpdf->getSourceId(),
            "messages" => [
                [
                    "role" => "user",
                    "content" => "What are the AI services this person can provide for businesses?"
                ]
            ]
        ]));
        $response = $chatpdf->sendMessage();
        return $response->content;
    }
}
