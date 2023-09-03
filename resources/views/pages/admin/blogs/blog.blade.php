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
                <h3 class="page-title">Blog</h3>
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
                    <p>{{ $blog->title }}</p>
                    <h4>Meta description</h4>
                    <p>{{ $blog->meta_description }}</p>
                    <h4>Keywords</h4>
                    <p>{{ $blog->keywords }}</p>
                    <h4>Description</h4>
                    <p>
                        {!! $blog->content !!}</p>


                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ps-3">
                                Author Information
                            </h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6 mb-2">
                                <h6>Name</h6>
                                <h5>{{ $blog->author }}</h5>
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
