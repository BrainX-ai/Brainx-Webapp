@extends('app')

@section('content')
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <div class="row mb-5 pb-5">
                    <div class="col-md-8 border p-3">
                        <img src="/assets/img/BrainX/plus.png" alt="" class="img-fluid">

                        <h4 class="mt-4">{{ $service->title }}</h4>

                        <div class="media d-flex mt-5">
                            <div class="media-img-wrap flex-shrink-0">
                                <div class="avatar ">
                                    @if ($talent->talent->photo != null)
                                        <img src="{{ $talent->talent->photo }}" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    @else
                                        <img src="/assets/img/BrainX/AI-focused-profile.png" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    @endif
                                </div>
                            </div>
                            <div class="media-body flex-grow-1 ms-3">
                                <div class="user-name">{{ $talent->name }}</div>
                                <div class="message"> {{ $talent->talent->standout_job_title }} </div>

                            </div>
                        </div>
                        <h4 class="mt-5">
                            Description
                        </h4>
                        <p>
                            {{ $service->description }}
                        </p>
                    </div>

                    <div class="col-md-4 ">
                        <h5 class="text-center">
                            {{ $service->delivery_time }} days delivery
                        </h5>
                        <a href="{{ route('edit.service', ['id' => $service->id]) }}" class="btn btn-primary w-100">Edit
                            Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
