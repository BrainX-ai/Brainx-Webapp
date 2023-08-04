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
                margin-top: 70px;
            }
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
                            Empower your business with creative AI solutions on demand.
                        </h1>


                        <p>
                            With global network of freelance AI talents, BrainX is democratizing AI to the global economy
                        </p>


                        <a class="btn join-us">
                            <button class="btn btn-primary boxes-shadow " data-bs-toggle="modal" data-bs-target="#add-feedback"
                                type="button">Join the waiting list</button>
                        </a>



                        <div class="col-md-6 col-sm-8 mt-4 ">
                            <img src="/assets/img/BrainX/ms-badge.png" alt="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 text-center text-muted only-web">

                    <h3>Version 3 <br />coming soon</h3>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /Home Banner -->

    @php
        
        $industries = ['All', 'Marketing', 'Sales', 'Real estate', 'Ecommerce', 'Finance', 'Education', 'Robotics', 'Transportation & logistics', 'Retail', 'Media & Entertainment', 'Tourism & hospotality', 'Gaming', 'Manufacturing', 'Healthcare', 'IT', 'Energy', 'Art & Design'];
        
    @endphp

    <!-- /Great About -->
    <section class="great-about container mb-5">
        <h5 class="col-md-12 mt-4 ms-2">
            Find AI solution/service that’s relevant to your business
        </h5>
        <div class="col-md-12 mt-4 ">
            @foreach ($industries as $industry)
                <button class="btn btn-sm rounded-pill btn-outline-dark m-1 ps-3 pe-3  shadow">{{ $industry }}</button>
            @endforeach

        </div>


    </section>
    <div class="col-md-12 mt-5 mb-5 pt-5 pb-5 text-center text-muted">


        <h3 class="mt-5 pt-5 mb-5 pb-5">Version 3 <br />coming soon</h3>


    </div>
    <section class="section developer mb-5">
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


    <section class="mb-5 pb-5 text-center mt-5 pt-5">

        <a class="btn ">
            <button class="btn btn-primary  boxes-shadow " data-bs-toggle="modal" data-bs-target="#add-feedback"
                type="button">Join the waiting list</button>
        </a>
    </section>









    @include('includes.feedback-modal')
    @include('includes.modals.login-modal')
    @include('includes.modals.desktop-msg')
    @include('pages.client.includes.modals.signup')
    @include('pages.client.includes.modals.signin')
@endsection
