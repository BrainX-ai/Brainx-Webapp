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
                <h3 class="page-title">Errors</h3>
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
                                    <th>
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="select-all">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </th>
                                    <th>Error Message</th>
                                    <th>File</th>
                                    <th>Line</th>
                                    <th>Created Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($errors as $error)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{-- <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a> --}}
                                                <div>
                                                    <h5>
                                                        {{ $error->message }}
                                                    </h5>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{ $error->file }}
                                            </div>
                                        </td>
                                        <td>
                                            {{ $error->line }}
                                        </td>
                                        <td>{{ $error->created_at }}</td>


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
