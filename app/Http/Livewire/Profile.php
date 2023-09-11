<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Talent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{

    use WithFileUploads;
    public $tabs = [];
    public $activeTab = '';
    public $portfolios = [], $services = [], $user, $bio;
    public $user_id;
    protected $queryString = ['user_id'];

    public $title, $description;
    public Portfolio $selectedPortfolio;

    public $files = [];

    public function mount()
    {
        if (Auth::check() && Auth::user()->role == 'Talent') {
            $this->tabs[] = 'My AI services';
            $this->activeTab = 'My AI services';
        } else {
            $this->tabs[] = 'My AI services';
            $this->activeTab = 'My AI services';
        }
        $this->tabs[] = 'Bio';
        $this->tabs[] = 'AI portfolio';

        if (Auth::check() && Auth::user()->role == 'Talent')
            $this->tabs[] = 'How it works';
    }

    public function render()
    {

        $id = ($this->user_id);
        $this->portfolios = Portfolio::where('user_id', $id)->get();
        $this->services = Service::where('user_id', $id)->get();
        $this->user = User::with('talent')->find($id);
        $this->bio = $this->user->talent->bio;
        if (sizeof($this->portfolios) > 0) {

            $this->selectedPortfolio = $this->portfolios[0];
        }
        return view('livewire.profile');
    }

    public function updateBio()
    {
        $talent = Talent::where('user_id', $this->user_id)->first();
        $talent->brief_summary = $this->bio;
        $talent->save();
    }

    public function addPortfolio()
    {
        $file_data = [];
        foreach ($this->files as $file) {
            $name = ($file->store('uploads'));
            $name = time() . '.' . $name;

            $data = [
                'file_name' => $file->getClientOriginalName(),
                'file_extension' => $file->getClientOriginalExtension(),
                'file_type' => $file->getClientMimeType(),
                'file_url' => $name

            ];
            $file_data[] = $data;
        }



        $create = Portfolio::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'files' => json_encode($file_data)
        ]);
    }

    public function updatePortfolio()
    {
        $this->selectedPortfolio->save();
    }

    public function selectPortfolio($index)
    {
        $this->selectedPortfolio = $this->portfolios[$index];
    }
}
