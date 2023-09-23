<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Utils\ChatPDF;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAiServiceChatpdf extends Component
{
    use WithFileUploads;
    public $industries = ['Ecommerce', 'Finance', 'Education', 'IT', 'Media & Entertainment', 'Marketing', 'Sales', 'Others'];

    public $fileUploaded = false;
    public $pdf, $suggestions = null;

    public function render()
    {

        if ($this->pdf && $this->pdf->path()) {
            $this->suggestions = $this->getSuggestionsFromChatpdf($this->pdf->path());
        }

        return view('livewire.create-ai-service-chatpdf');
    }

    public function getSuggestionsFromChatpdf($path)
    {

        $chatpdf = new ChatPDF();
        $chatpdf->setPostFields(json_encode(array(
            'url' => $path
        )));
        $response = $chatpdf->uploadFile();
        $chatpdf->setSourceId($response['sourceId']);
        $chatpdf->setPostFields(json_encode([
            "sourceId" => $chatpdf->getSourceId(),
            "messages" => [
                "role" => "user",
                "content" => "What are the AI services this person can provide for businesses?"
            ]
        ]));
        $response = $chatpdf->sendMessage();
        return $response['messages'][-1]['content'];
    }
}
