<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class SearchService extends Component
{

    public $searchIndustry;
    public $search = 'All';
    // public $industries = ['All', 'Marketing', 'Sales', 'Real estate', 'Ecommerce', 'Finance', 'Education', 'Robotics', 'Transportation & logistics', 'Retail', 'Media & Entertainment', 'Tourism & hospotality', 'Gaming', 'Manufacturing', 'Healthcare', 'IT', 'Energy', 'Art & Design'];
    public $industries = ['All', 'Ecommerce', 'Finance', 'Education', 'IT', 'Media & Entertainment', 'Marketing', 'Sales', 'Others'];

    public $defaultServices = [];
    public static $serviceArray = [];
    public function mount()
    {
        $this->defaultServices = [];
        foreach (static::$serviceArray as $subArray) {
            // dd(is_array($subArray));
            $this->defaultServices[] =   (object)$subArray;
            // dd($this->services);
        }
    }

    public function convertToObject($array)
    {
        $object = [];
        if (!is_array($array)) {
            return $array;
        }
        foreach ($array as $subArray) {
            $object[] = is_array($subArray) ? (object) $subArray : $this->convertToObject($subArray);
        }
        // dd($object);
        return $object;
    }

    public function render()
    {
        $this->mount();
        // dd($this->services);

        if ($this->search != 'All') {
            $this->defaultServices = []; //$this->getService($this->search);
        }
        // dd($this->getServicesFromDB());
        return view('livewire.search-service', [
            'defaultServices' => $this->defaultServices,
            'services' => $this->getServicesFromDB()
        ]);
    }

    public function getService($industry)
    {
        foreach ($this->defaultServices as $service) {
            if ($this->search == $service->industry) {
                return [$service];
            }
        }
        return []; //$this->services;
    }

    public function getServicesFromDB()
    {
        $services = Service::inRandomOrder()->with('talent')->whereStatus('PUBLISHED');
        if ($this->search != 'All') {
            $services = $services->where('industry', 'LIKE', '%' . $this->search . '%');
        }
        return $services = $services->get();
    }

    // public function render()
    // {

    //     $services = Service::inRandomOrder()->with('talent');
    //     if ($this->search != 'All') {
    //         $services = $services->where('industry', $this->search);
    //     }
    //     $services = $services->get();
    //     return view('livewire.search-service', [
    //         'services' => $services
    //     ]);
    // }
}
