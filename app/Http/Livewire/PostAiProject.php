<?php

namespace App\Http\Livewire;

use App\Models\AIProject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostAiProject extends Component
{

    public $name,
        $description, $email, $title, $budget;
    public $success = false;

    public function mount()
    {
        $this->name  = Auth::user() ? Auth::user()->name : '';
        $this->email = Auth::user() ? Auth::user()->email : '';
    }
    public function render()
    {
        return view('livewire.post-ai-project');
    }

    public function store()
    {

        try {
            AIProject::create([
                'name' => $this->name,
                'email' => $this->email,
                'title' => $this->title,
                'budget' => $this->budget,
                'description' => $this->description,
                'user_id' => Auth::user() ? Auth::user()->id : null
            ]);
            $this->success = true;
        } catch (\Exception $e) {
        }
    }
}
