@extends('app')

@section('content')
    <style>
        .service-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background-position: center;
        }
    </style>
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <div class="row mb-5 pb-5">
                    <div class="col-md-8 border p-3">
                        @if ($service['image'] != null)
                            <img src="/uploads/{{ $service['image'] }}" alt="" class="service-image">
                        @else
                            <img src="/assets/img/BrainX/plus.png" alt="" class="service-image">
                        @endif
                        <h4 class="mt-4">{{ $service['title'] }}</h4>

                        <div class="media d-flex mt-5">
                            <div class="media-img-wrap flex-shrink-0">
                                <div class="avatar ">
                                    @if ($service['talent']['talent']['photo'] != null)
                                        <img src="{{ $service['talent']['talent']['photo'] }}" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    @else
                                        <img src="/assets/img/BrainX/AI-focused-profile.png" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    @endif
                                </div>
                            </div>
                            <div class="media-body flex-grow-1 ms-3">
                                <div class="user-name">{{ $service['talent']['talent']['name'] }}</div>
                                <div class="message"> {{ $service['talent']['talent']['standout_job_title'] }} </div>

                            </div>
                        </div>
                        <h4 class="mt-5">
                            How BrainX works
                        </h4>
                        <p>
                        <div class="  align-items-center mt-2">

                            <ul class="m-3 ms-5 me-5">
                                <li>
                                    <div>
                                        <strong>
                                            Step 1: Sign up
                                        </strong>
                                        <p>
                                        <ol>
                                            <li>Create a free BrainX profile with your LinkedIn.</li>
                                            <li>We welcome all types of AI talents: ML/AI engineers, prompt engineers, data
                                                scientists,
                                                data engineers, MLops, AI researchers, AI consultants, business intelligence
                                                developers…
                                            </li>

                                        </ol>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <strong>
                                            Step 2: Create your own AI service
                                        </strong>
                                        <p>
                                        <ol>
                                            <li>
                                                Based on your knowledge, experience and skills in Data Science, ML, AI,
                                                prompt
                                                engineering, you can quickly get started by creating simple AI services that
                                                you think
                                                business clients might need and hire you like fine tune models, customize
                                                chatGPT,
                                                create movie trailers with Runway Gen2, developing AI apps, consulting,...
                                                <p class="fw-bold">
                                                    You don’t have to start with AI solutions/products which might take you
                                                    months.
                                                </p>
                                            </li>
                                            <li>
                                                Set your own price for the AI service you want to sell.
                                            </li>
                                        </ol>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <strong>
                                            Step 3: Publish for sales
                                        </strong>
                                        <p>
                                        <ol>
                                            <li>
                                                Your AI service will be published on BrainX’s homepage. If clients see your
                                                service is
                                                helpful for them, they will fund BrainX in advance. After you successfully
                                                deliver AI
                                                service to them, BrainX will send 85% of the price you set to your Paypal.
                                            </li>
                                            <li>
                                                Complete your BrainX profile to build trust with clients.
                                            </li>
                                        </ol>
                                        </p>

                                    </div>
                                </li>
                            </ul>

                        </div>
                        </p>
                    </div>

                    <div class="col-md-4 p-4">

                        <a class="btn join-us">
                            <button class="btn btn-outline-primary boxes-shadow ps-5 pe-5" data-bs-toggle="modal"
                                data-bs-target="#login-modal" type="button">
                                <div class="text-center"><small>Talent</small></div>Sell AI service
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.modals.login-modal')
@endsection
