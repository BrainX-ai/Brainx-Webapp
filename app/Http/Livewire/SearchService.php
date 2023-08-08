<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class SearchService extends Component
{

    public $searchIndustry;
    public $search = 'All';
    public $industries = ['All', 'Marketing', 'Sales', 'Real estate', 'Ecommerce', 'Finance', 'Education', 'Robotics', 'Transportation & logistics', 'Retail', 'Media & Entertainment', 'Tourism & hospotality', 'Gaming', 'Manufacturing', 'Healthcare', 'IT', 'Energy', 'Art & Design'];




    public function render()
    {

        $services = Service::inRandomOrder()->with('talent');
        if ($this->search != 'All') {
            $services = $services->where('industry', $this->search);
        }
        $services = $services->get();
        return view('livewire.search-service', [
            'services' => $services
        ]);
    }
}
