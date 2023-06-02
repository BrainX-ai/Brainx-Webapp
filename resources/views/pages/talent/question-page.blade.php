@extends('app')

@section('content')

    <style>
        li {
            list-style: none;
        }
    </style>
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                                <div class="card-header d-flex justify-content-between">

                                    <h4>{{ 'Question ' . ($index + 1) . '/10' }}</h4>
                                    <span>40:15</span>
                                </div>
                                <div class="card-body m-3">
                                    <p>
                                        {{ $question->question }}
                                    </p>
                                    <ul class="ms-3">
                                        <li>
                                            <label for="1">
                                                <input type="radio" name="answer" id="1"
                                                    value="{{ $question->option1 }}" onchange="onSelectOption(this)"/>
                                                {{ $question->option1 }}

                                            </label>

                                        </li>
                                        <li>
                                            <label for="2">
                                                <input type="radio" name="answer" id="2"
                                                    value="{{ $question->option2 }}"  onchange="onSelectOption(this)"/>
                                                {{ $question->option2 }}

                                            </label>

                                        </li>
                                        <li>
                                            <label for="3">
                                                <input type="radio" name="answer" id="3"
                                                    value="{{ $question->option3 }}" onchange="onSelectOption(this)"/>
                                                {{ $question->option3 }}

                                            </label>

                                        </li>
                                        <li>
                                            <label for="4">
                                                <input type="radio" name="answer" id="4"
                                                    value="{{ $question->option4 }}" onchange="onSelectOption(this)"/>
                                                {{ $question->option4 }}

                                            </label>

                                        </li>
                                    </ul>

                                    <div class="mt-5">
                                        <input type="hidden" name="quiz_question_id" id="quiz_question_id" value="{{ $quiz_question_id }}" />
                                        @if ($index > 0)
                                            <a href="{{ route('assessment.progress', ['index' => $index - 1]) }}">
                                                <button class="btn btn-primary">Prev</button>
                                            </a>
                                        @endif
                                        @if ($index < 2)
                                        <a href="{{ route('assessment.progress', ['index' => $index + 1]) }}">
                                            <button class="btn btn-primary">Next</button>
                                        </a>
                                        @endif
                                        @if ($index == 2)
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


                $.ajax({
                    method: "POST",
                    url: "/send-answer",
                    data: {
                        answer: el.value,
                        quiz_question_id: $("#quiz_question_id").val(),
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
        </script>
    @endsection
@endsection
