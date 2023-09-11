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
    public $portfolios = [], $services = [], $user, $bio, $selectedIndex;
    public $user_id;
    protected $queryString = ['user_id'];

    public $title, $description, $updateTitle, $updateDescription;
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
        $files = [];
        $id = ($this->user_id);
        $this->portfolios = Portfolio::where('user_id', $id)->get();
        $this->services = Service::where('user_id', $id)->get();
        $this->user = User::with('talent')->find($id);
        $this->bio = $this->user->talent->bio;
        if ($this->selectedPortfolio == null && sizeof($this->portfolios) > 0) {

            $this->selectedPortfolio = $this->portfolios[0];
            $this->updateTitle = $this->selectedPortfolio->title;
            $this->updateDescription = $this->selectedPortfolio->description;
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
            $name = $file->store('uploads');
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

        $this->files = [];
    }

    public function updatePortfolio()
    {

        $file_data = json_decode($this->selectedPortfolio->files);

        foreach ($this->files as $file) {
            $name = $file->store('uploads');
            // $name = time() . '.' . $name;

            $data = [
                'file_name' => $file->getClientOriginalName(),
                'file_extension' => $file->getClientOriginalExtension(),
                'file_type' => $file->getClientMimeType(),
                'file_url' => $name
            ];
            $file_data[] = $data;
        }
        $this->selectedPortfolio->title = $this->updateTitle;
        $this->selectedPortfolio->description = $this->updateDescription;
        $this->selectedPortfolio->files = json_encode($file_data);

        $this->selectedPortfolio->save();
    }

    public function deletePortfolio()
    {
        Portfolio::find($this->selectedPortfolio->id)->delete();
    }

    public function selectPortfolio($index)
    {
        $this->selectedIndex = $index;
        $this->selectedPortfolio = $this->portfolios[$index];
        $this->updateTitle = $this->selectedPortfolio->title;
        $this->updateDescription = $this->selectedPortfolio->description;
    }

    public function deleteFileFromPortfolio($index, $fileIndex)
    {

        $portfolio = $this->portfolios[$index];
        $files = [];
        foreach (json_decode($portfolio->files) as $key => $file) {
            if ($fileIndex != $key) {
                $files[] = $file;
            }
        }
        $portfolio->files = $files;
        $portfolio->save();
    }

    public function downloadPortfolioFile($portfolioIndex, $fileIndex)
    {

        $files = json_decode($this->portfolios[$portfolioIndex]->files);
        $downloadFile = null;
        foreach ($files as $key => $file) {
            if ($key == $fileIndex) {
                $downloadFile = $file;
                break;
            }
        }
        if ($downloadFile) {
            $file_path = storage_path('app/' . $downloadFile->file_url);
            $headers = array('Content-Type' => $downloadFile->file_type);

            return \Response::download($file_path, $file->file_name, $headers);
        }
        return false;
    }
}
