@extends('pages.client.layouts.app')

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
                                <div class="user-name"><a style="text-decoration: underline;"
                                        href="{{ route('client.show.profile', encrypt($talent->id)) }}">{{ $talent->name }}</a>
                                </div>
                                <div class="message"> {{ $talent->talent->standout_job_title }} </div>

                            </div>
                            <div>
                                <span class="h4">${{ $service->price }}</span>
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
                        <div class="border text-center p-4 pb-4 pt-4">

                            <h5 class="text-center">
                                {{ $service->delivery_time }} days delivery
                            </h5>

                            <div class="mb-2">
                                @if (Auth::check())
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#checkout">Continue
                                        (${{ $service->price }})</button>
                                @else
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#client-signup">Continue
                                        (${{ $service->price }})</button>
                                @endif
                            </div>
                            <div>
                                @if (Auth::check())
                                    <a href="{{ route('client.messages', ['service_id' => $service->id]) }}">
                                        <button class="btn btn-primary w-100">Message </button>
                                    </a>
                                @else
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#client-signup">Message
                                    </button>
                                @endif
                            </div>

                        </div>
                        <p>
                            Fund upfront. The freelancer gets paid once you are satisfied with the work.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.client.includes.modals.signup')
    @include('pages.client.includes.modals.signin')
    @include('pages.client.includes.modals.checkout')
@endsection
