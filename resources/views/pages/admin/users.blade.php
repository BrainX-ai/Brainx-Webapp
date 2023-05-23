@extends('pages.admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="page-title">Talents</h3>
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
                                        <th>Talent</th>
                                        <th>Expertise</th>	
                                        <th>Linkedin</th>	
                                        <th>Country </th>	
                                        <th>Joined Date</th>	
                                        <th>Status</th>	
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
                                                <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a>
                                                <div>
                                                    <h5><a href="#">{{ $user->name  }}</a></h5>
                                                    <p>	{{ $user->email }}</p>
                                                </div>	
                                            </div>
                                        </td>
                                        <td>{{ $user->talent->standout_job_title }}</td>
                                        <td class="verify-mail"><i data-feather="linkedin" class="me-1 text-success"></i>
                                            <a href="{{ $user->talent->linkedin }}" target="_blank" class="link-info">Linkedin</a>
                                        </td>
                                        <td>
                                            {{ $user->talent->country }}
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.update.users.status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="talent_id" value="{{ $user->talent->talent_id }}">
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="INCOMPLETE" @if ($user->talent->status == 'INCOMPLETE')
                                                    {{ 'selected' }}
                                                @endif>INCOMPLETE</option>
                                                <option value="IN_REVIEW" @if ($user->talent->status == 'IN_REVIEW')
                                                    {{ 'selected' }}
                                                @endif>IN_REVIEW</option>
                                                <option value="PUBLISHED" @if ($user->talent->status == 'PUBLISHED')
                                                    {{ 'selected' }}
                                                @endif>PUBLISHED</option>
                                            </select>
                                        </form>
                                            </td>
                                        <td class="text-end three-dots">

                                            <a href="{{ route('admin.show.profile', encrypt($user->id)) }}" class="btn btn-primary">View</a>

                                            {{-- <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu user-menu-list">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#transaction-category"><img class="me-2 " src="assets/img/icon/icon-01.svg" alt=""> View Details</a>
                                                <a class="dropdown-item" href="#"><img class="me-2 " src="assets/img/icon/icon-02.svg" alt=""> Transaction</a>
                                                <a class="dropdown-item" href="#"><img class="me-2 " src="assets/img/icon/icon-03.svg" alt=""> Reset Password</a>
                                                <a class="dropdown-item" href="#"><img class="me-2 " src="assets/img/icon/icon-04.svg" alt=""> Suspend user</a>
                                                <a class="dropdown-item" href="#"><i data-feather="edit" class="me-2"></i> Edit</a>
                                                <a class="dropdown-item mb-0" href="#"><i data-feather="trash-2" class="me-2 text-danger"></i> Delete</a>
                                            </div> --}}
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