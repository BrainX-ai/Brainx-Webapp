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
            <div class="container-fluid">
                <div class="row mb-5 pb-5">
                    <div class="col-md-8 border p-3">
                        {{-- @if ($service->image != null)
                            <img src="/uploads/{{ $service->image }}" alt="" class="service-image">
                        @else --}}
                        <img class="default-image" src="/assets/img/BrainX/X.png" alt="">
                        {{-- @endif --}}

                        <h4 class="mt-4">{{ $blog->title }}</h4>

                        <div class="media d-flex mt-5">

                            <div class="media-body flex-grow-1 ms-3">
                                <div class="user-name fw-bold"><a class="text-primary ">{{ $blog->author }}</a>
                                </div>
                                <div class="message"> {{ $blog->created_at }} </div>


                            </div>
                        </div>

                        <p class="mt-5">
                            {{ strip_tags($blog->content) }}
                        </p>
                    </div>

                    <div class="col-md-4 ">
                        @foreach ($services as $service)
                            @if ($service->talent->talent->status == 'PUBLISHED')
                                @include('pages.blogs.service-card')
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
