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

        .sub-btn-demo {
            /* background: #0B0D63; */
            border-radius: 50px !important;
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
    </style>
    <!-- Start Navigation -->


    <!-- Home Banner -->
    <section class="section home-banner ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-7">
                    <div class="banner-content aos mt-5 pt-5" data-aos="fade-up">


                        <h1>
                            Build your AI products with global freelance AI talents
                        </h1>

                        <p>BrainX is a global freelance platform for building your AI products with quality AI talents.</p>
                        <div id="blog-slider1" class="owl-carousel owl-theme blog-slider aos between-slider"
                            data-aos="fade-up">

                            <div class="grid-blog blog-two aos">
                                <div class="banner-img aos text-center">
                                    <div class="text-center ps-5 ms-2">

                                        <img src="assets/img/imgpsh_fullsize_anim.png" class="img-fluid hero-img"
                                            alt="banner">

                                    </div>
                                    <div class="blurry">
                                    </div>
                                    <div class="freelance-info text-center">
                                        <h3 class="mt-2 text-primary">Vinh Dang PhD</h3>
                                        <h4 class="freelance-specific"><strong>Senior data scientist - Vietnam</strong></h4>
                                        <h5>Current - VNG & RMIT lecturer </h5>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <span class="open-desktop text-center">
                            <a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#desktop-modal">
                                <button class="btn btn-primary sub-btn " type="submit">Post a project</button>
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
                        <a class="btn join-us" href="https://calendly.com/hector-tan-brainx/brainx-discovery"
                            target="_blank">
                            <button class="btn btn-outline-primary sub-btn-demo " data-bs-toggle="modal"
                                data-bs-target="#client-signup" type="button">Book a demo</button>
                        </a>
                        <div class="col-md-6 col-sm-8 mt-4">
                            <img class="w-100" src="assets/img/BrainX/ms-badge.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5">

                    <div id="blog-slider" class="owl-carousel owl-theme blog-slider aos" data-aos="fade-up">
                        <div class="grid-blog blog-two aos" data-aos="fade-up">
                            <div class="banner-img aos text-center" data-aos="fade-up">
                                <img src="assets/img/imgpsh_fullsize_anim.png" class="img-fluid hero-img" alt="banner">
                                <div class="blurry">

                                </div>
                                <div class="freelance-info text-center">
                                    <h3 class="mt-2 text-primary">Vinh Dang PhD</h3>
                                    <h4 class="freelance-specific"><strong>Senior data scientist - Vietnam</strong></h4>
                                    <h6>Current - VNG & RMIT lecturer </h6>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <section class="section developer">
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
                                    <a href="developer-details.html">
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


    <!-- Great About -->
    <section class="section great-about about-project">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="section-header section-header-two aos" data-aos="fade-up">
                        <h2 class="header-title">Why BrainX?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon">
                            <img src="assets/img/BrainX/SuitableAItalentstoyourbusiness.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Collaboration tools</h4>
                            <p>
                                BrainX provide chat, contract creation and escrow service.
                                <br>&nbsp;<br>&nbsp;
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
                            <h4>Save cost</h4>
                            <p>
                                It’s much cheaper to hire freelance AI talents than permanent ones. And no charge for
                                clients. <br>&nbsp;
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6">
                    <div class="great-blk aos boxes-shadow" data-aos="fade-up">
                        <div class="great-icon">
                            <img src="assets/img/BrainX/Selective-AI-talents.png" alt="">
                        </div>
                        <div class="great-content">
                            <h4>Quality AI talents</h4>
                            <p>
                                Access remote talents globally. BrainX selects them carefully with criteria.
                                <br>&nbsp;
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
                            <h4>Save time</h4>
                            <p>BrainX tries to match your project to a suitable AI talent within 24h. <br>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Great About -->
    <section class="great-about text-center">
        <span class="open-desktop pt-0">
            <a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#desktop-modal">
                <button class="btn btn-primary sub-btn boxes-shadow " type="button">Post a project</button>
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



    <section class="section great-about mt-4">
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

    <section class="great-about text-center mb-5">
        <a href="#" data-bs-toggle="modal" data-bs-target="#add-feedback"
            class="btn btn-primary sub-btn boxes-shadow"> Give a feedback</a>

    </section>


    @include('includes.feedback-modal')
    @include('includes.modals.login-modal')
    @include('includes.modals.desktop-msg')
    @include('pages.client.includes.modals.signup')
    @include('pages.client.includes.modals.signin')
@endsection
