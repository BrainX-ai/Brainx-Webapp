<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddServices extends Component
{
    use WithFileUploads;
    public $industries = ['Ecommerce', 'Finance', 'Education', 'IT', 'Media & Entertainment', 'Marketing', 'Sales', 'Others'];

    public $file = null, $title, $description, $delivery_time, $industry = [], $price;

    public function render()
    {
        return view('livewire.add-services');
    }



    public function addService()
    {
        dd($this->industry);
        if ($this->file != null)
            $fileName = $this->file->store('uploads');

        $create = Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $fileName ?? null,
            'price' => $this->price,
            'delivery_time' => $this->delivery_time,
            'industry' => implode(',', $this->industry),
            'status' => 'PUBLISHED',
            'user_id' => Auth::user()->id
        ]);
    }
}
