@extends('pages.admin.layouts.app')

@section('content')

<style>
    
.table td, .table th {
    white-space: normal;
}
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="page-title">Assessment Category</h3>
        </div>
        
    </div>
</div>
<!-- /Page Header -->

<!-- Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="text-end mb-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-assessment-category">Add Category</button>
        </div>
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
                                        <th>Category name</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox">
                                              <input type="checkbox" class="form-check-input" >
                                              <label class="form-check-label" ></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div >
                                                {{-- <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a> --}}
                                                <div>
                                                    <h5>{{ $category->category_name  }}</h5>
                                                
                                                </div>	
                                            </div>
                                        </td>
                                        <td>
                                            {{ $category->description }}
                                        </td>
                                        
                                        
                                        <td>
                                            <div>
                                                -
                                            </div>	
                                        </td>
                                        <td class="text-end three-dots">
                                            
                                            
                                            {{-- <a href="{{ route('admin.project.details', $job->job_id) }}" class="btn btn-light">Details</a> --}}
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

@include('pages.admin.includes.modals.add-assessment-category')

@endsection