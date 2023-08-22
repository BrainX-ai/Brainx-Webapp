<?php

namespace App\Http\Livewire;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Talent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $tabs = ['My AI services', 'Bio', 'AI portfolio', 'How it works'];
    public $activeTab = 'My AI services';
    public $portfolios = [], $services = [], $user, $bio;
    public $user_id;
    protected $queryString = ['user_id'];

    public $title, $description;
    public function render()
    {

        $id = ($this->user_id);
        $this->portfolios = Portfolio::where('user_id', $id)->get();
        $this->services = Service::where('user_id', $id)->get();
        $this->user = User::with('talent')->find($id);
        $this->bio = $this->user->talent->bio;
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

        $create = Portfolio::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::user()->id
        ]);
    }
}
