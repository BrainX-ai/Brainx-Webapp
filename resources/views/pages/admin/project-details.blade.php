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

        <div class=" text-end">
            <button class="btn btn-primary" onclick="assignJobId({{ $job->job_id }});">Assign Talent</button>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4>Title</h4>
                    <p>{{ $job->job_title }}</p>
                    <h4>Description</h4>
                    <p>{{ strip_tags($job->job_description) }}</p>
                    <h4>Contract Type</h4>
                    <p>{{ $job->job_type | $job->contract->contract_type }}</p>
                    @if ($job->job_type != 'Outsource AI projects')
                        <div class="col-md-6 pb-3">
                            <strong>Duration: </strong> <span class="h6">{{ $job->duration_in_weeks }} weeks</span>
                        </div>
                        <div class="col-md-6 pb-3">
                            <strong>Hours per week: </strong> <span class="h6">{{ $job->hours_per_week }}</span>
                        </div>
                        <div class="col-md-12 pb-3">
                            <strong>Client's budget: </strong><span
                                class="h6">{{ $job->hourly_rate_from . '$/h - ' . $job->hourly_rate_to . '$/h' }}</span>
                        </div>
                    @else
                        <div class="col-md-12 pb-3">
                            <strong>Client's budget: </strong><span class="h6">${{ $job->budget }}</span>
                        </div>
                    @endif
                    @if ($job->contract != null)
                        <a href="" class="text-primary fw-bold" data-bs-toggle="modal"
                            data-bs-target="#preview-{{ $job->contract->contract_type }}-contract">View the contract</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ps-3">
                                Client Information
                            </h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6 mb-2">
                                <h6>Name</h6>
                                <h5>{{ $job->client->name }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Email</h6>
                                <h5>{{ $job->client->email }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Country</h6>
                                <h5>{{ $job->client->client->country }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Payment Method</h6>
                                <h5 class="text-primary">{{ $job->client->client->country == 'Vietnam' ? 'Bank Transfer':'Payoneer' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($job->talent != null)
                    
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ps-3">
                                Talent Information
                            </h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6 mb-2">
                                <h6>Name</h6>
                                <h5>{{ $job->talent->name }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Email</h6>
                                <h5>{{ $job->talent->email }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Country</h6>
                                <h5>{{ $job->talent->talent->country }}</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <h6>Payment Method</h6>
                                <h5 class="text-primary">{{ $job->client->client->country == 'Vietnam' ? 'Bank Transfer':'Payoneer' }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h4>Transactions</h4>

                    <table class="table">
                        <thead>
                            <th>
                                Milestone Name
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Change Status
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($job->contract->milestones as $milestone)
                                @foreach ($milestone->transactions as $transaction)
                                    <tr>
                                        <td>
                                            {{ $milestone->caption }}
                                        </td>
                                        <td>
                                            {{ $milestone->amount }}
                                        </td>
                                        <td>
                                            {{ $transaction->status }}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.update.transaction.status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="milestone_id" value="{{ $milestone->id }}">
                                                <input type="hidden" name="transaction_id"
                                                    value="{{ $transaction->transaction_id }}">
                                                <select name="status" id="" onchange="this.form.submit()"
                                                    class="form-control">
                                                    <option value="">-Select status-</option>
                                                    <option value="CREATED_INVOICE">Created invoice</option>
                                                    <option value="INVOICE_REQUESTED">Invoice requested</option>
                                                    <option value="DEPOSITED">Deposited</option>
                                                    <option value="APPROVED">Approved</option>
                                                    <option value="RELEASED">Released</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
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
                                        <td>{{ $request->talent->name }} <br />
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


@include('pages.admin.includes.modals.asign-talent')
{{-- @include('pages.admin.includes.modals.asign-talent') --}}
@if ($job->talent != null)
    @include('pages.talent.includes.modals.preview-fixed-contract')
    @include('pages.talent.includes.modals.preview-hourly-contract')
@endif


@section('custom-js')
    <script>
        function assignJobId(id) {
            $('#talent-list').modal('toggle');
            document.getElementById('job_id').value = id;
        }
    </script>
@endsection
@endsection
