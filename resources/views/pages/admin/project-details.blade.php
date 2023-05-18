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
                <h3 class="page-title">Projects</h3>
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
                    <p>{{ $job->job_title }}</p>
                    <h4>Description</h4>
                    <p>{{ strip_tags($job->job_description) }}</p>
                    <h4>Contract Type</h4>
                    <p>{{ $job->contract->contract_type }}</p>
                    <a href="" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#preview-{{ $job->contract->contract_type }}-contract">View the contract</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <h4>Project requests</h4>
                    <table class="table table-striped">
                        <thead>
                            <th>
                                Talent
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Response
                            </th>
                            <th>
                                Sent at
                            </th>
                            <th>
                                Updated at
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($job->project_requests as $request)
                            <tr>
                                <td>{{ $request->talent->name }} <br/>
                                    {{ $request->talent->email }}</td>
                                <td>
                                    {{ $request->message }}
                                </td>
                                <td>
                                    {{ $request->status }}
                                </td>
                                <td>
                                    {{ $request->created_at }}
                                </td>
                                <td>
                                    {{ $request->updated_at }}
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
                    
                </div>
            </div>
        </div>

    </div>
@section('custom-js')
    <script>
        function assignJobId(id) {
            $('#talent-list').modal('toggle');
            document.getElementById('job_id').value = id;
        }
    </script>
@endsection

{{-- @include('pages.admin.includes.modals.asign-talent') --}}
@include('pages.talent.includes.modals.preview-fixed-contract')
@include('pages.talent.includes.modals.preview-hourly-contract')
@endsection
