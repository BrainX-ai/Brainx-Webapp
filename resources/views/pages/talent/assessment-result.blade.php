@extends('pages.talent.layouts.quiz-app')

@section('content')
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <h2 class="mb-3 text-center">BrainX Skill Assessment</h2>
                <div class="row">
                    <div class="col-md-12">

                        @if ($quiz->remarks == 'PASSED')
                            <div class="card pt-5 pb-5">
                                <div class="card-body text-center">


                                    <h4>
                                        Congratulations! <br />
                                        
                                    </h4>
                                    <h5 class="mb-5 mt-3">
                                        You've earned the badge
                                    </h5>

                                    <a href="{{ route('show.profile', encrypt(Auth::guard()->user()->id)) }}" class="mt-5">
                                        <button class="btn btn-primary">Go back</button>
                                    </a>

                                </div>
                            </div>
                        @else
                            <div class="card pt-5 pb-5">

                                <div class="card-body text-center">
                                    <h4>
                                        Unfortunately, you didn’t pass
                                    </h4>
                                    <p>
                                        Don’t worry, you may be notified of another chance to take the test. Thank you!
                                    </p>
                                    <div>
                                        <a href="{{ route('show.profile', encrypt(Auth::guard()->user()->id)) }}">
                                            <button class="btn btn-primary">Go back</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
