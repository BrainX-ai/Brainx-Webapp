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

        .chat-container {
            height: calc(100vh - 270px);
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

                        @include('pages.talent.includes.job-request-list-sidebar')
                        <!-- Chat Right -->
                        <div class="chat-cont-right chat-scrol" style="z-index: 99; ">
                            <div class="border-bottom pb-4 text-end">
                                <button class="btn btn-primary" type="button" data-bs-target="#create-contract"
                                    data-bs-toggle="modal"> Create contract</button>
                            </div>
                            <div class="chat-container">
                                <div id="messages">

                                    @foreach ($actions as $action)
                                        <div class="mb-4">
                                            @if (Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id)
                                                @if ($action->action_type == 'MESSAGE_WITH_MY_REQUEST')
                                                    @include('pages.talent.includes.message-views.message-from-system')
                                                @endif
                                                @if ($action->action_type == 'CONTRACT')
                                                    @include('pages.talent.includes.message-views.contract-message')
                                                @endif
                                                @if ($action->action_type == 'ACCEPTENCE_MESSAGE')
                                                    @include('pages.talent.includes.message-views.acceptence-message')
                                                @endif
                                                @if ($action->action_type == 'ONLY_MESSAGE')
                                                    @include('pages.talent.includes.message-views.only-message')
                                                @endif
                                                @if ($action->action_type == 'ONLY_MESSAGE_WITH_FILE')
                                                    @include('pages.talent.includes.message-views.message-with-file')
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                    
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                        role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 0%"></div>
                                </div>
                                <div id="focus"></div>

                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <a href="" class="text-primary fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#client-request-{{ $action->id }}">View request</a>

                                    </li>
                                    @if ($job->contract != null)
                                    <li>
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
                                    <input type="hidden" name="receiver_id" value="{{ $job->client_id }}"
                                        id="receiver_id" />
                                    <input type="hidden" name="photo" value="{{ $job->talent->talent->photo }}"
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
    </div>
    <!-- /Page Content -->
    @include('pages.talent.includes.modals.client-request')
    @if ($job->contract != null)
        @if ($job->contract->contract_type == 'fixed')
            @include('pages.talent.includes.modals.preview-fixed-contract')
        @else
            @include('pages.talent.includes.modals.preview-hourly-contract')
        @endif
        @include('pages.talent.includes.modals.end-contract')
    @endif

    <form action="{{ route('submit.contract') }}" method="POST">
        @csrf
        @include('pages.talent.includes.modals.create-contract')
        @include('pages.talent.includes.modals.review-fixed-contract')
        @include('pages.talent.includes.modals.review-hourly-contract')
    </form>

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
@endsection
@endsection
