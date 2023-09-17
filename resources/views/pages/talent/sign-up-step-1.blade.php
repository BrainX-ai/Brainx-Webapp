@extends('app')

@section('content')
    <style>
        .skills {
            border-bottom: solid 1px rgb(217, 207, 207);
        }

        .prog-lang .form-group {
            margin: 20px;
        }

        .chat-cont-right {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .skills .form-group label {
            margin-left: 5px;
        }

        .chat-cont-right {
            /* height: 100%; */
            /* overflow-y: hidden; */
        }

        ul li {
            padding: 10px 0px;
        }

        .chat-header.border-bottom {
            border-bottom: 1px solid #adaaaa !important;
            /* margin-right: -16px; */
        }

        .chat-window .card {
            box-shadow: none;
        }

        .use-desktop {
            display: none;
        }

        @media only screen and (max-width: 767.98px) {
            .use-desktop {
                display: block !important;
            }

            .desktop-section {
                display: none;
            }
        }
    </style>
    <div class="content use-desktop ">
        <div class="container-fuild">
            <div class="row">

                <div class="col-md-12">

                    <div class="chat-window mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5>
                                    For your best experience, please
                                    kindly use a PC.
                                </h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="content ">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 offset-md-2">

                    <div class="chat-window">

                        <!-- Chat Right -->
                        <div class="chat-cont-right chat-scrol" style="z-index: 99; ">
                            <div class="">

                                <div class="chat-header border-0">
                                    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                        <i class="material-icons">chevron_left</i>
                                    </a>
                                    <div class="media d-flex">
                                        <div class="media-img-wrap flex-shrink-0">
                                            <div class="avatar avatar-online">
                                                <img src="assets/img/BrainX/logo-outline.svg" alt="User Image"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body flex-grow-1">
                                            <div class="user-status">Welcome to BrainX! Let’s start building your
                                                profile and AI service</div>
                                            <div><strong>1/3. Sign up</strong></div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12  mt-2 mb-5 ps-4 ms-5">

                                        <div class="col-md-5 text-center">
                                            <a class="btn" href="{{ route('auth.linkedin') }}">
                                                <button class="btn btn-primary sub-btn ps-5 pe-5">
                                                    <img class="avatar-img rounded-circle me-3"
                                                        src="assets/img/BrainX/linkedin.png" alt="">Sign in with
                                                    Linkedin</button>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /Chat Right -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection
