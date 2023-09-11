@extends('app')

@section('content')
    <style>
        .great-icon {
            background: white;
            text-align: left;
        }

        .great-icon.number img {
            width: 45px;
            height: auto;
            justify-items: last baseline;
        }

        .great-icon img {
            width: 75px;
            height: auto;
            justify-items: last baseline;
        }

        .blurry {
            height: 20px;
            filter: blur(5px);
            margin-top: -10px;
            background: #ffffffff;
        }

        .great-about {
            padding: 40px 0px 40px;
        }

        .banner-content .sub-btn {
            text-transform: none;
        }

        h3 {
            /* color:  */
            /* text-decoration: underline; */
        }

        .btn-primary:disabled {
            color: black;
        }

        #blog-slider1 {
            display: none;
        }

        .developer {
            background-image: none !important;
        }

        @media only screen and (max-width:767.98px) {
            #blog-slider1 {
                display: block;
            }

            .banner-img {
                float: none;
                display: block;
            }
        }

        .banner-content .sub-btn {
            /* background: #0B0D63; */
            border-radius: 5px !important;
            font-weight: bold;
            border: 1px solid #0B0D63;
            height: 52px;
            margin: 9px;
            margin-left: 0px;
            font-size: 16px;
            line-height: 18px;
            padding: 10px 30px;
            /* color: #fff; */
            min-width: 172px;
            transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            -ms-transition: all 0.5s ease;
            -webkit-transition: all 0.5s ease;
            box-shadow: 3px 3px 3px #a2a2b5;
        }

        .only-mobile {
            display: none !important;
        }

        .only-web {
            display: block !important;
        }

        @media only screen and (max-width: 767.98px) {

            #developer-slider1.owl-carousel.owl-loaded,
            .mob-slider {
                display: block !important;
            }

            .only-mobile {
                display: block !important;
            }

            .only-web {
                display: none !important;
            }

            .great-icon.number img {
                width: 25px;
                height: auto;
                justify-items: last baseline;
            }
        }

        @media (max-width: 767.98px) {
            .join-us {
                display: block !important;
                margin-top: 40px;
                margin-bottom: 40px;
            }
        }

        @media only screen and (max-width: 767.98px) {

            .no-js .owl-carousel,
            .owl-carousel.owl-loaded {
                display: block !important;
            }
        }

        .default-image {
            width: 100% !important;
            /* height: auto !important; */
            text-align: center;
            object-fit: scale-down !important;
            opacity: 0.7;
        }

        .job-locate-blk img,
        .location-img {
            width: 100%;
            height: 200px;
            /* background-size: cover; */
            background-position: center;
            object-fit: cover;
        }
    </style>
    <!-- Start Navigation -->


    <!-- Home Banner -->
    <section class="section home-banner ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-7">
                    <div class="banner-content aos mt-5 pt-5" data-aos="fade-up">

                        <h1>
                            Empower your business with creative AI services on demand.
                        </h1>
                        <p>
                            BrainX is a marketplace empowering business with creative AI services from global network
                            of AI talents. <a href="/how-it-works" class="text-primary fw-bold text-decoration-underline">How
                                it
                                works?</a>
                        </p>
                        <a class="btn join-us">
                            <button class="btn btn-primary boxes-shadow ps-5 pe-5" onclick="scrollToElement('searchSection')"
                                data-bs-toggle="modal" data-bs-target="#client-signup" type="button">
                                <div class="text-center"><small>Client</small></div>Find AI service
                            </button>
                        </a>
                        <a class="btn join-us">
                            <button class="btn btn-outline-primary boxes-shadow ps-5 pe-5" data-bs-toggle="modal"
                                data-bs-target="#login-modal" type="button">
                                <div class="text-center"><small>Talent</small></div>Sell AI service
                            </button>
                        </a>

                        <div class="col-md-6 col-sm-8 mt-4 ">
                            <img src="/assets/img/BrainX/ms-badge.png" alt="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 ">
                    <div id="developers-slider2" class="owl-carousel owl-theme developers-slider aos" data-aos="fade-up">
                        @foreach ($talents as $talent)
                            @if (isset($talent->talent) && $talent->talent->status == 'PUBLISHED')
                                <div class="freelance-widget border-0">
                                    <div class="freelance-content">
                                        <div class="freelance-img">
                                            <a>
                                                <img src="{{ $talent->talent->photo }}" alt="User Image">
                                                <span class="verified"><i class="fas fa-check-circle"></i></span>
                                            </a>
                                        </div>
                                        <div class="freelance-info">
                                            <h3><a> {{ $talent->name }} </a></h3>
                                            <div class="freelance-specific">
                                                {{ $talent->talent->standout_job_title }}</div>

                                            <div class="freelance-specific">{{ $talent->talent->country }}</div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        {{-- </div>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    @php
        
        // $industries = ['All', 'Marketing', 'Sales', 'Real estate', 'Ecommerce', 'Finance', 'Education', 'Robotics', 'Transportation & logistics', 'Retail', 'Media & Entertainment', 'Tourism & hospotality', 'Gaming', 'Manufacturing', 'Healthcare', 'IT', 'Energy', 'Art & Design'];
    @endphp
    <section id="searchSection">

        @livewire('search-service')
    </section>
    <!-- /Great About -->


    <section class="section  mb-5 d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mx-auto">

                </div>
            </div>
            <div id="developers-slider" class="owl-carousel owl-theme developers-slider aos" data-aos="fade-up">
                @foreach ($talents as $talent)
                    @if (isset($talent->talent) && $talent->talent->status == 'PUBLISHED')
                        <div class="freelance-widget">
                            <div class="freelance-content">

                                <div class="freelance-img">
                                    <a>
                                        <img src="{{ $talent->talent->photo }}" alt="User Image">
                                        <span class="verified"><i class="fas fa-check-circle"></i></span>
                                    </a>
                                </div>
                                <div class="freelance-info">
                                    <h3><a href="developer-details.html"> {{ $talent->name }} </a></h3>
                                    <div class="freelance-specific">{{ $talent->talent->standout_job_title }}</div>
                                    <div class="text-bold"><strong>{{ (int) $talent->talent->hourly_rate }}$/hour</strong>
                                    </div>
                                    <div class="freelance-specific">{{ $talent->talent->country }}</div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>





    @include('includes.feedback-modal')
    @include('includes.modals.login-modal')
    @include('includes.modals.desktop-msg')
    @include('pages.client.includes.modals.signup')
    @include('pages.client.includes.modals.signin')

    <script>
        function scrollToElement(elementId) {
            const element = document.getElementById(elementId);

            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth'
                }); // Use { behavior: 'auto' } for instant scrolling
            }
        }
    </script>
@endsection
