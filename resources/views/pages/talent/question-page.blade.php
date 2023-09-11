@extends('pages.talent.layouts.quiz-app')

@section('content')

    <style>
        li {
            list-style: none;
        }

        .btn-primary:disabled {
            color: #000000;
        }

        #next-link {
            pointer-events: none;
        }

        .prevent-select {
            -webkit-user-select: none;
            /* Safari */
            -ms-user-select: none;
            /* IE 10 and IE 11 */
            user-select: none;
            /* Standard syntax */
        }
    </style>
    <div class="container" style="height: 100%;">

        <div class="content">
            @include('includes.email-verify')
            <div class="container-fluid">

                <h2 class="mb-3 text-center">BrainX Skill Assessment</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <p>
                                Do not click back button on browser. If so, you will be considered as unsuccessfull.
                            </p>
                        </div>
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">

                                <h4>{{ 'Question ' . ($index + 1) . '/10' }}</h4>
                                <span><span id="minutes"></span>: <span id="seconds"></span> </span>
                            </div>
                            <div class="card-body m-3 prevent-select">
                                <p>
                                    {{ $question->question }}
                                </p>
                                <ul class="ms-3">
                                    <li>
                                        <label for="1">
                                            <input type="radio" name="answer" id="1"
                                                value="{{ $question->option1 }}" onchange="onSelectOption(this)" />
                                            {{ $question->option1 }}

                                        </label>
                                    </li>
                                    <li>
                                        <label for="2">
                                            <input type="radio" name="answer" id="2"
                                                value="{{ $question->option2 }}" onchange="onSelectOption(this)" />
                                            {{ $question->option2 }}

                                        </label>

                                    </li>
                                    <li>
                                        <label for="3">
                                            <input type="radio" name="answer" id="3"
                                                value="{{ $question->option3 }}" onchange="onSelectOption(this)" />
                                            {{ $question->option3 }}

                                        </label>

                                    </li>
                                    <li>
                                        <label for="4">
                                            <input type="radio" name="answer" id="4"
                                                value="{{ $question->option4 }}" onchange="onSelectOption(this)" />
                                            {{ $question->option4 }}

                                        </label>

                                    </li>
                                </ul>

                                <div class="mt-5">
                                    <input type="hidden" name="quiz_question_id" id="quiz_question_id"
                                        value="{{ $quiz_question_id }}" />
                                    <input type="hidden" name="quiz_id" id="quiz_id" value="{{ session('quiz_id') }}" />
                                    {{-- @if ($index > 0)
                                            <a href="{{ route('assessment.progress', ['index' => $index - 1]) }}">
                                                <button class="btn btn-primary">Prev</button>
                                            </a>
                                        @endif --}}
                                    @if ($index < 9)
                                        <a href="{{ route('assessment.progress', ['index' => $index + 1]) }}"
                                            id="next-link">
                                            <button class="btn btn-primary" id="next" disabled>Next</button>
                                        </a>
                                    @endif
                                    @if ($index == 9)
                                        <a href="{{ route('assessment.result') }}">
                                            <button class="btn btn-primary">Finish</button>
                                        </a>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @section('custom-js')
        <script>
            function onSelectOption(el) {

                $('#next-link').css('pointer-events', 'auto');
                $('#next').attr('disabled', false);

                $.ajax({
                    method: "POST",
                    url: "/send-answer",
                    data: {
                        answer: el.value,
                        quiz_question_id: $("#quiz_question_id").val(),
                        quiz_id: $("#quiz_id").val()
                    },
                    success: function(res, textStatus, htttStatus) {
                        if (htttStatus.status != 200) {
                            window.location.reload();
                        }
                        if (res.status === "ok") {

                        }
                    },
                });
            }

            function makeTimer() {
                // var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
                var endTime = new Date("{{ $endTime }} UTC");

                endTime = (Date.parse(endTime) / 1000);
                var now = new Date();
                now = (Date.parse(now) / 1000);
                var timeLeft = endTime - now;
                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                if (hours < "10") {
                    hours = "0" + hours;
                }
                if (minutes < "10") {
                    minutes = "0" + minutes;
                }
                if (seconds < "10") {
                    seconds = "0" + seconds;
                }
                $("#minutes").html(minutes);
                $("#seconds").html(seconds);

                if (minutes <= "00" && seconds <= "00") {
                    window.location.href = "{{ route('assessment.result') }}"
                }
            }
            setInterval(function() {
                makeTimer();
            }, 1000);
            document.addEventListener('contextmenu', event => event.preventDefault());
            makeTimer()
        </script>
    @endsection
@endsection
