@extends('app')

@section('content')
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">

                                <h4>{{ $category->category_name }}</h4>
                                <span>45:00</span>
                            </div>
                            <div class="card-body m-3">
                                <ul class="ms-3">
                                    <li>
                                        Topics: Python, ML, Computer Vision, NLP

                                    </li>
                                    <li>
                                        10 multiple choice questions

                                    </li>
                                    <li>
                                        45-min countdown timer

                                    </li>
                                    <li>Internet needed
                                    </li>
                                    <li>
                                        No retake
                                    </li>
                                </ul>

                                <div class="mt-2">
                                    <a href="{{ route('assessment.running',['category_id' => $category->id]) }}">
                                        <button class="btn btn-primary">Challenge yourself</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
