@extends('app')

@section('content')


    <style>
        :root {
            --line-border-fill: #0B0D63;
            --line-border-empty: #e0e0e0;
        }

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
            height: calc(100vh - 90px);
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
            /* align-items:
                                                                                            center; */
        }

        .chat-cont-left {
            margin-right: 0%;
        }

        .chat-container {
            height: calc(100vh - 200px);
            /* Set the height of the container */
            overflow-y: scroll;
            /* Enable vertical scrolling */
            padding: 10px;
            /* Add some padding to the container */
        }

        .progress-container {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 20px;
            max-width: 95%;
            transform: translateY(-50%);
            height: 4px;
            text-align: center;
            margin-left: 40px;
        }

        .progress-container-text {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 20px;
            max-width: 100%;
            transform: translateY(-50%);
            height: 4px;
            color: white;
        }

        .progress-container::before {
            content: '';
            background-color: var(--line-border-empty);
            position: absolute;
            top: 350%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            z-index: -1;
        }

        .progress {
            background-color: var(--line-border-fill);
            position: absolute;
            top: 350%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            z-index: -1;
            transition: 0.4s ease;
        }

        .circle {
            background-color: var(--line-border-empty);
            color: #fff;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.4s ease;
        }

        .circle-text {

            color: #000;
            border-radius: 50%;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.4s ease;
        }

        .circle.active {
            background-color: var(--line-border-fill);
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

                        @include('pages.talent.includes.service-list-sidebar')
                        <!-- Chat Right -->
                        <div class="chat-cont-right chat-scrol" style="z-index: 99; ">
                            {{-- <div class="mt-4 mb-5 row">
                                <div class="col-md-12">

                                    <div class="progress-container">
                                        <div class="progress" id="progress"></div>
                                        <div class="circle active">1</div>
                                        <div class="circle active">2</div>
                                        <div class="circle active">3</div>
                                        <div class="circle active">4</div>
                                    </div>
                                    <div class="progress-container-text mt-4">
                                        <div class="circle-text border-0 ">Privacy guideline</div>
                                        <div class="circle-text border-0 me-4">Interview</div>
                                        <div class="circle-text border-0 me-4">Sign NDA</div>
                                        <div class="circle-text border-0">Contract</div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="chat-container">

                                <div id="messages">
                                    @foreach ($actions as $action)
                                        <div class="mb-4">
                                            @if (
                                                (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) &&
                                                    $action->action_type == 'CONTRACT')
                                                @include('pages.talent.includes.message-views.contract-message')
                                            @endif
                                            @if (
                                                (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) &&
                                                    $action->action_type == 'ACCEPTENCE_MESSAGE')
                                                @include('pages.talent.includes.message-views.acceptence-message')
                                            @endif
                                            @if ($action->action_type == 'ONLY_MESSAGE')
                                                @include('pages.talent.includes.message-views.only-message')
                                            @endif
                                            @if ($action->action_type == 'ONLY_MESSAGE_WITH_FILE')
                                                @include('pages.talent.includes.message-views.message-with-file')
                                            @endif

                                            @if ($action->action_type == 'SERVICE_BOUGHT_MESSAGE')
                                                @include('pages.talent.includes.message-views.bought-service-message')
                                            @endif
                                        </div>
                                    @endforeach
                                    @if (sizeof($actions) == 0)
                                        <h5 class="text-center">No conversation found</h5>
                                    @endif
                                </div>
                                <div id="focus"></div>
                            </div>

                            <div class="chat-footer">
                                <div class="input-group">
                                    <div class="btn-file btn ">
                                        <i class="fa fa-paperclip"></i>
                                        <input type="file" name="file" id="file" onchange="sendFile()">
                                    </div>
                                    <input type="hidden" value="{{ $selectedServiceTransaction->service->id }}"
                                        id="service_id" />
                                    <input type="hidden" value="{{ $selectedServiceTransaction->id }}"
                                        id="service_transaction_id" />
                                    <input type="hidden" name="receiver_id"
                                        value="{{ $selectedServiceTransaction->client_id }}" id="receiver_id" />
                                    <input type="hidden" name="photo" value="/assets/img/BrainX/AI-focused-profile.png"
                                        id="photo" />
                                    <input type="text" class="input-msg-send form-control" name="message" id="message"
                                        placeholder="Reply...">

                                    <button type="button" class="btn btn-primary msg-send-btn rounded-pill"
                                        id="send_message"><i class="fab fa-telegram-plane"></i></button>
                                </div>
                            </div>


                            <!-- /Chat Right -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->


    @section('chat-js')
        <script>
            $(document).ready(function(e) {
                document.getElementById('focus').scrollIntoView();

            })

            function sendFile() {
                // Get the selected file
                var files = $('#file')[0].files;

                if (files.length > 0) {
                    var fd = new FormData();

                    // Append data 
                    fd.append('file', files[0]);
                    fd.append('receiver_id', $('#receiver_id').val());
                    fd.append('photo', $('#photo').val());
                    fd.append('job_id', $('#job_id').val());


                    // AJAX request 
                    $.ajax({
                        url: '{{ route('upload.chat.file') }}',
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {

                        },
                        error: function(response) {
                            console.log("error : " + JSON.stringify(response));
                        }
                    });
                }
            }
        </script>

        <script>
            function requestInvoice(milestone_id, job_id) {

                $('#milestone_deposit_job_id').val(job_id);
                $('#milestone_deposit_id').val(milestone_id);
            }

            function approvePayment(milestone_id, job_id) {

                $('#milestone_approval_job_id').val(job_id);
                $('#milestone_approval_id').val(milestone_id);
            }
        </script>
    @endsection
@endsection
