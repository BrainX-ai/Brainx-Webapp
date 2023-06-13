@extends('pages.client.layouts.app')

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
    </style>

    <!-- Content -->
    <div class="content ">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="chat-window">

                        @include('pages.client.includes.job-request-list-sidebar')
                        <!-- Chat Right -->
                        <div class="chat-cont-right chat-scrol" style="z-index: 99; ">

                            <div class="chat-container">

                                <div id="messages">
                                    @foreach ($actions as $action)
                                        <div class="mb-4">
                                            @if (Auth::user()->id == ($action->sender_id || $action->receiver_id) &&
                                                    $action->action_type == 'MESSAGE_WITH_MY_REQUEST')
                                                @include('pages.client.includes.message-views.message-from-system')
                                            @endif
                                            @if ($job->talent_user_id != null)
                                                @if (
                                                    (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) &&
                                                        $action->action_type == 'CONTRACT')
                                                    @include('pages.client.includes.message-views.contract-message')
                                                @endif
                                                @if (
                                                    (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) &&
                                                        $action->action_type == 'ACCEPTENCE_MESSAGE')
                                                    @include('pages.client.includes.message-views.acceptence-message')
                                                @endif
                                                @if ($action->action_type == 'ONLY_MESSAGE')
                                                    @include('pages.client.includes.message-views.only-message')
                                                @endif
                                                @if ($action->action_type == 'ONLY_MESSAGE_WITH_FILE')
                                                    @include('pages.client.includes.message-views.message-with-file')
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <div id="focus"></div>
                            </div>
                            @if (sizeof($job->latest_project_request) > 0 && $job->latest_project_request[0]->status == 'ACCEPTED')

                            <div>
                                <ul style="display: block;" class="d-flex mb-0">
                                    <li class="me-5 ms-3">
                                        <a href="" class="text-primary fw-bold"  data-bs-toggle="modal" data-bs-target="#view-request">View request</a>

                                    </li>
                                    @if ($job->contract != null)
                                    <li >
                                        <a href="" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#preview-{{ $action->job->contract->contract_type }}-contract">View contract</a>
                                    </li>                                        
                                    @endif
                                </ul>
                            </div>
                                <div class="chat-footer">
                                    <div class="input-group">
                                        <div class="btn-file btn d-none">
                                            <i class="fa fa-paperclip"></i>
                                            <input type="file" name="file" id="file" onchange="sendFile()">
                                        </div>
                                        <input type="hidden" value="{{ $job->job_id }}" id="job_id" />
                                        <input type="hidden" name="receiver_id" value="{{ $job->talent_user_id }}"
                                            id="receiver_id" />
                                        <input type="hidden" name="photo"
                                            value="/assets/img/BrainX/AI-focused-profile.png" id="photo" />
                                        <input type="text" class="input-msg-send form-control" name="message"
                                            id="message" placeholder="Reply...">

                                        <button type="button" class="btn btn-primary msg-send-btn rounded-pill"
                                            id="send_message"><i class="fab fa-telegram-plane"></i></button>
                                    </div>
                                </div>
                            @endif

                            <!-- /Chat Right -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        @if ($job->contract != null && $job->talent_user_id != null)
            @if ($job->contract->contract_type == 'fixed')
                @include('pages.client.includes.modals.preview-fixed-contract')
            @else
                @include('pages.client.includes.modals.preview-hourly-contract')
            @endif
            @include('pages.talent.includes.modals.end-contract')
        @endif

        @include('pages.client.includes.modals.my-request')
        @include('pages.client.includes.modals.request-invoice')
        @include('pages.client.includes.modals.confirm-approval')

        @include('includes.modals.client-request')
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
