@extends('pages.admin.layouts.app')

@section('content')
    <style>
        .table td,
        .table th {
            white-space: normal;
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="page-title">Service Details</h3>
            </div>

        </div>
    </div>
    <!-- /Page Header -->

    <!-- Table -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4>Title</h4>
                    <p>{{ $service->title }}</p>
                    <h4>Description</h4>
                    <p>{{ str_replace('&#39;', "'", strip_tags(html_entity_decode($service->description))) }}</p>
                    <h4>Rating</h4>
                    <p>{{ $service->rating }}</p>
                    <h4>Pricing</h4>
                    <p>{{ $service->price }}</p>
                    <h4>Industry</h4>
                    <p>{{ $service->industry }}</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ps-3">
                                Talent Information
                            </h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6 mb-2">
                                <h6>Name</h6>
                                <h5>{{ $service->talent->name }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Email</h6>
                                <h5>{{ $service->talent->email }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Country</h6>
                                <h5>{{ $service->talent->talent->country }}</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    </div>

    </div>
@endsection
