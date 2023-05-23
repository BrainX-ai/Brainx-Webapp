@extends('pages.admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="page-title">Clients</h3>
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
                                              <label class="form-check-label" ></label>
                                            </div>
                                        </th>
                                        <th>Client</th>
                                        <th>Job title</th>	
                                        <th>Country </th>	
                                        <th>Joined Date</th>	
                                        
                                        <th></th>	
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox">
                                              <input type="checkbox" class="form-check-input" >
                                              <label class="form-check-label" ></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-avatar user-profile">
                                                {{-- <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a> --}}
                                                <div>
                                                    <h5><a href="#">{{ $user->name  }}</a></h5>
                                                    <p>	{{ $user->email }}</p>
                                                </div>	
                                            </div>
                                        </td>
                                        <td>{{ $user->client->job_title }}</td>
                                        
                                        <td>
                                            {{ $user->client->country }}
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        
                                        <td class="text-end three-dots">

                                            <a href="{{ route('admin.clients.delete', encrypt($user->id)) }}" class="btn btn-danger">delete</a>

                                           
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

@endsection