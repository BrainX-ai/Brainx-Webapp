@extends('app')

@section('content')
    <style>
        .service-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background-position: center;
        }
    </style>
    <div class="container" style="height: 100%;">

        <div class="content">
            @include('includes.email-verify')
            <div class="container-fluid">
                <div class="row mb-5 pb-5">
                    <div class="col-md-8 border p-3">
                        @if ($service->image != null)
                            <img src="/uploads/{{ $service->image }}" alt="" class="service-image">
                        @else
                            <img src="/assets/img/BrainX/plus.png" alt="" class="service-image">
                        @endif
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

                    <div class="col-md-4 p-4">
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
