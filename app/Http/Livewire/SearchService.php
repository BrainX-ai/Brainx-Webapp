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
    public $serviceArray = [
        [
            'image' => 'fashion_model.png',
            'title' => 'Create an AI fashion model',
            'price' => '300',
            'industry' => 'Ecommerce',
            'talent' => [
                'talent' => [
                    'name' => 'Silvio',
                    'standout_job_title' =>
                    'Fashion generative AI expert',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ],
        [
            'image' => 'trading_bot.png',
            'title' => 'Develop a trading bot',
            'price' => '2000',
            'industry' =>
            'Finance',
            'talent' => [
                'talent' => [
                    'name' => 'David',
                    'standout_job_title' =>
                    'AI specialist in finance',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ],
        [
            'image' => 'Develop_an_English_tutor_app.png',
            'title' => 'Develop an English tutor app',
            'price' => '2000',
            'industry' =>
            'Education',
            'talent' => [
                'talent' => [
                    'name' => 'Tom',
                    'standout_job_title' => 'AI engineer',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ],
        [
            'image' => 'Fine_tuning_OpenAI_GPT4s_model.png',
            'title' => 'Fine tuning OpenAI GPT4’s model',
            'price' => '200',
            'industry' =>
            'IT',
            'talent' => [
                'talent' => [
                    'name' => 'Nicolas',
                    'standout_job_title' =>
                    'Data scientist',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ], [
            'image' => 'AI-generated_movie_trailer.png',
            'title' => 'Create AI-generated  movie trailer',
            'price' => '200',
            'industry' =>
            'Media & Entertainment',
            'talent' => [
                'talent' => [
                    'name' => 'Bill',
                    'standout_job_title' =>
                    'Prompt engineer',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ],
        [
            'image' => 'Create_AI-generated_video_for_your_car_company.png',
            'title' => 'Create AI-generated video for your car company',
            'price' => '200',
            'industry' =>
            'Marketing',
            'talent' => [
                'talent' => [
                    'name' => 'Huyen Chip',
                    'standout_job_title' =>
                    'Generative AI specialist',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ],
        [
            'image' => 'Develop_conversational_AI_for_sales_call.png',
            'title' => 'Develop conversational AI for sales call',
            'price' => '1500',
            'industry' =>
            'Sales',
            'talent' => [
                'talent' => [
                    'name' => 'Lily',
                    'standout_job_title' => 'NLP expert',
                    'photo' => '/assets/img/BrainX/service_example.png'
                ]
            ]
        ],
    ];

    public function mount()
    {
        $this->defaultServices = [];
        foreach ($this->serviceArray as $subArray) {
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
            $this->defaultServices = $this->getService($this->search);
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
