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
    </style>
    <!-- Start Navigation -->


    <!-- Home Banner -->
    <section class="section home-banner ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-7">
                    <div class="banner-content aos mt-5 pt-5" data-aos="fade-up">


                        <h1 class="only-web">
                            Build your AI products with global freelance AI talents
                        </h1>
                        <h1 class="only-mobile">
                            Level up your business and career
                            with global network of freelance AI consultants and experts
                        </h1>

                        <p class="only-web">BrainX is a freelance platform for building your AI products with global network
                            of quality AI
                            talents. </p>

                        <p class="only-mobile">

                            BrainX is on the mission to democratize AI to the world.
                        </p>
                        <div id="blog-slider1" class="owl-carousel owl-theme blog-slider aos between-slider "
                            data-aos="fade-up">

                            <div class="grid-blog blog-two aos">
                                <div class="banner-img aos text-center">
                                    <div id="developers-slider1"
                                        class="owl-carousel owl-theme developers-slider aos mob-slider" data-aos="fade-up">
                                        @foreach ($talents as $talent)
                                            @if (isset($talent->talent) && $talent->talent->status == 'PUBLISHED')
                                                <div class="freelance-widget border-0">
                                                    <div class="freelance-content">

                                                        <div class="freelance-img">
                                                            <a>
                                                                <img src="{{ $talent->talent->photo }}" alt="User Image">
                                                                <span class="verified"><i
                                                                        class="fas fa-check-circle"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="freelance-info">
                                                            <h3><a> {{ $talent->name }} </a></h3>
                                                            <div class="freelance-specific">
                                                                {{ $talent->talent->standout_job_title }}</div>
                                                            <div class="text-bold ">
                                                                <strong>Start from 100$</strong>
                                                            </div>
                                                            <div class="freelance-specific">{{ $talent->talent->country }}
                                                            </div>
                                                            <div class="mt-3 only-web">
                                                                <a class="btn btn-outline-primary rounded-pill"
                                                                    href="{{ route('show.talent.profile', encrypt($talent->id)) }}">View</a>
                                                            </div>
                                                            <div class="mt-3 only-mobile">
                                                                <a class="btn btn-outline-primary rounded-pill"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#add-feedback">Book consultation</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                        </div>

                        <span class="open-desktop text-center d-none">
                            <a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#client-signup">
                                <button class="btn btn-primary sub-btn " type="submit">Get started</button>
                            </a>
                        </span>

                        @if (Auth::guard()->user() == null)
                            <a class="btn join-us">
                                <button class="btn btn-primary sub-btn " data-bs-toggle="modal"
                                    data-bs-target="#client-signup" type="button">Post a project</button>
                            </a>
                        @else
                            <a class="btn join-us">
                                <button class="btn btn-primary sub-btn " data-bs-toggle="modal"
                                    data-bs-target="#client-signup" type="button">Post a project</button>
                            </a>
                        @endif

                        <div class="col-md-12 mt-4 only-web">
                            <button class="btn btn-sm rounded-pill btn-outline-dark m-1 shadow">AI API integration</button>
                            <button class="btn btn-sm rounded-pill btn-outline-dark m-1 shadow ">ChatGPT for customer
                                service</button>
                            <button class="btn btn-sm rounded-pill btn-outline-dark m-1 shadow">Chatbot</button>
                            <button class="btn btn-sm rounded-pill btn-outline-dark m-1 shadow">GenerativeAI language
                                tutor</button>
                            <button class="btn btn-sm rounded-pill btn-outline-dark m-1  shadow">Employee face
                                recognition</button>
                            <button class="btn btn-sm rounded-pill btn-outline-dark m-1 shadow">Model customization</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5">

                    {{-- <div id="blog-slider" class="owl-carousel owl-theme blog-slider aos" data-aos="fade-up">
                        <div class="grid-blog blog-two aos" data-aos="fade-up">
                            <div class="banner-img aos text-center" data-aos="fade-up"> --}}
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
                                            <div class="text-bold">
                                                <strong>{{ (int) $talent->talent->hourly_rate }}$/hour</strong>
                                            </div>
                                            <div class="freelance-specific">{{ $talent->talent->country }}</div>
                                            <div class="mt-3">
                                                <a class="btn btn-outline-primary rounded-pill"
                                                    href="{{ route('show.talent.profile', encrypt($talent->id)) }}">View</a>
                                            </div>
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


    <!-- Great About -->
    <section class="section great-about about-project only-web">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="section-header section-header-two aos" data-aos="fade-up">
                        <h2 class="header-title">Why businesses go to BrainX?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon">
                            <img src="assets/img/BrainX/Specialize-in-freelance-AI-service.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>1. Specialize in freelance AI services</h4>
                            <p>
                                Global pool of AI talents with variety of AI skills: NLP, computer vision, generativeAI,...
                                <br>&nbsp;
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon">
                            <img src="assets/img/BrainX/No-1st-month-salary.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>2. Hire AI talents at an affordable cost</h4>
                            <p>
                                Unlock AI power and transform your business with freelance AI workforce.
                                <br>&nbsp;<br>&nbsp;
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon">
                            <img src="assets/img/BrainX/Save-time.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>3. Save your time</h4>
                            <p>
                                With support of our AI expert, you will be matched to a suitable AI talent within 24h.
                                <br>&nbsp;
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon">
                            <img src="assets/img/BrainX/SuitableAItalentstoyourbusiness.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>4. Remote collaboration tools</h4>
                            <p>Work with your freelancer via chat, contract creation and escrow service.
                                <br>&nbsp;<br>&nbsp;
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Great About -->
    <section class="great-about text-center only-web">
        <span class="open-desktop pt-0">
            <a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#client-signup">
                <button class="btn btn-primary sub-btn boxes-shadow " type="button">Get started</button>
            </a>
        </span>
        @if (Auth::guard()->user() == null)
            <a class="btn join-us">
                <button class="btn btn-primary sub-btn boxes-shadow join-us" data-bs-toggle="modal"
                    data-bs-target="#client-signup" type="button">Post a project</button>
            </a>
        @else
            <a class="btn join-us">
                <button class="btn btn-primary sub-btn boxes-shadow join-us" data-bs-toggle="modal"
                    data-bs-target="#client-signup" type="button">Post a project</button>
            </a>
        @endif
    </section>

    <section class="section developer only-web">
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
                                    <div class="mt-3">
                                        <a class="btn btn-primary"
                                            href="{{ route('show.talent.profile', encrypt($talent->id)) }}">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>




    @if (false)
        <section class="section  great-about ">
            <div class="about-position">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12 mx-auto">
                            <div class="section-header section-header-two aos" data-aos="fade-up">
                                <h2 class="header-title">AI services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center text-left">
                        <div class="col-md-6 d-flex ">
                            <div class="about-it-blk aos boxes-shadow" data-aos="fade-up">
                                <div class="about-it-img">
                                    <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Consult.png"
                                            alt=""></a>
                                </div>
                                <div class="about-it-content ">
                                    <h4>Hourly rate</h4>
                                    <p>Hire remote contract AI talents for fixed periods of time and pay in hourly rate</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="about-it-blk aos boxes-shadow" data-aos="fade-up">
                                <div class="about-it-img">
                                    <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Development.png"
                                            alt=""></a>
                                </div>
                                <div class="about-it-content text-left">
                                    <h4>Fixed price</h4>
                                    <p>
                                        Outsource AI projects to freelancers and pay them in a fixed price
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section class="section great-about mt-4 only-web">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="section-header section-header-two aos" data-aos="fade-up">
                        <h2 class="header-title">How BrainX works?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon number">
                            <img src="assets/img/BrainX/1.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Post a project</h4>
                            <p>
                                Send your AI project to our AI experts <br>&nbsp;
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon number">
                            <img src="assets/img/BrainX/2.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Review</h4>
                            <p>An AI expert reviews your project <br>&nbsp;</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon number">
                            <img src="assets/img/BrainX/3.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Match</h4>
                            <p>
                                The AI expert matches your project to a suitable AI talent
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section great-about  only-mobile">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="section-header section-header-two aos" data-aos="fade-up">
                        <h2 class="header-title">How BrainX works? (beta)</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="great-blk aos boxes-shadow d-flex" data-aos="fade-up">
                        <div class="great-icon number ps-3 pe-3">
                            <img src="assets/img/BrainX/1.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Choose an AI consultant</h4>
                            <p>
                                Find an expert who matches your need: <b>consult your startup’s AI project, find a specific
                                    AI solution for your small business, educate on how to apply AI into your life and
                                    career,...</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="great-blk aos boxes-shadow d-flex" data-aos="fade-up">
                        <div class="great-icon number">
                            <img src="assets/img/BrainX/2.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Book a session</h4>
                            <p>Select a date & time from the expert’s schedule and share what you want to talk about</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="great-blk aos boxes-shadow d-flex" data-aos="fade-up">
                        <div class="great-icon number">
                            <img src="assets/img/BrainX/3.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Join a video call</h4>
                            <p>
                                1-on-1 virtual session with your consultant to discuss your needs and projects
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- /Great About -->
    <section class="great-about text-center only-web">
        <span class="open-desktop pt-0">
            <a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#client-signup">
                <button class="btn btn-primary sub-btn boxes-shadow " type="button">Get started</button>
            </a>
        </span>
        @if (Auth::guard()->user() == null)
            <a class="btn join-us">
                <button class="btn btn-primary sub-btn boxes-shadow join-us" data-bs-toggle="modal"
                    data-bs-target="#client-signup" type="button">Get started</button>
            </a>
        @else
            <a class="btn join-us">
                <button class="btn btn-primary sub-btn boxes-shadow join-us" data-bs-toggle="modal"
                    data-bs-target="#client-signup" type="button">Get started</button>
            </a>
        @endif
    </section>

    <section class="only-mobile mb-4 text-center">
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
