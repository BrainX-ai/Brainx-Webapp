@extends('app')

@section('content')
    <style>
        .skills {
            border-bottom: solid 1px rgb(217, 207, 207);
        }

        .prog-lang .form-group {
            margin: 20px;
        }

        .skills .form-group label {
            margin-left: 5px;
        }

        .chat-cont-right {
            /* height: 100%; */
            /* overflow-y: hidden; */
            min-height: calc(100vh - 90px);
        }

        ul li {
            padding: 10px 0px;
        }

        .chat-header.border-bottom {
            border-bottom: 1px solid #adaaaa !important;
            margin-right: -16px;
        }

        .chat-window .card {
            box-shadow: none;
        }

        .chat-cont-right .chat-header .media {
            -webkit-box-align: center;
            -ms-flex-align: center;
            /* align-items: center; */
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
    <div class="content desktop-section">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="chat-window">

                        @include('pages.talent.includes.job-request-list-sidebar')
                        <!-- Chat Right -->
                        <div class="chat-cont-right chat-scrol" style="z-index: 99; ">


                            @foreach ($actions as $action)
                                <div class="mb-3">

                                    @if (
                                        (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) &&
                                            $action->action_type == 'MESSAGE_WITH_CLIENT_REQUEST')
                                        @include('pages.talent.includes.message-views.message-from-system')
                                    @endif
                                    @if (
                                        (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) &&
                                            $action->action_type == 'MESSAGE_WITH_MY_PROFILE')
                                        @include('pages.talent.includes.message-views.message-from-system')
                                    @endif

                                </div>
                            @endforeach

                            <!-- /Chat Right -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    @foreach ($actions as $action)
        @if ($action->job != null)
            @include('pages.talent.includes.modals.client-request')
            @include('pages.talent.includes.modals.accept-message')
            @include('pages.talent.includes.modals.rejection-message')
        @endif
    @endforeach
@endsection
