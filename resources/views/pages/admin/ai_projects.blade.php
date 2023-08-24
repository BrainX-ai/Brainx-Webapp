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
                <h3 class="page-title">AI Projects</h3>
            </div>

        </div>
    </div>
    <!-- /Page Header -->

    <!-- Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover mb-0 datatable">
                            <thead>
                                <tr>

                                    <th>Project title</th>
                                    <th class="th-lg">Description</th>
                                    <th>Client</th>
                                    <th>Budget </th>
                                    <th>Created Date</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>

                                        <td>
                                            <div>

                                                <div>
                                                    <h5> {{ $project->title }} </h5>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $project->description }}
                                        </td>
                                        <td>
                                            <div>
                                                @if (isset($project->user_id))
                                                    <h5><a href="#">{{ $project->client->name }}</a></h5>
                                                    <p> {{ $project->client->email }}</p>
                                                @else
                                                    <h5><a href="#">{{ $project->name }}</a></h5>
                                                    <p> {{ $project->email }}</p>
                                                @endif

                                            </div>
                                        </td>
                                        <td>
                                            {{ $project->budget }}
                                        </td>
                                        <td>{{ $project->created_at }}</td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
