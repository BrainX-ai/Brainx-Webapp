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
            <h3 class="page-title">Projects</h3>
        </div>
        
    </div>
</div>
<!-- /Page Header -->

<!-- Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="text-end mb-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-question">Add question</button>
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
                                        <th>Question</th>
                                        <th>Options</th>	
                                        <th>Answer </th>	
                                        <th>Explanation</th>	
                                        
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
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
                                                    <h5><a href="#">{{ $question->question  }}</a></h5>
                                                
                                                </div>	
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <ol>
                                                    <li>
                                                        {{ $question->option1 }}
                                                    </li>
                                                    <li>
                                                        {{ $question->option2 }}
                                                    </li>
                                                    <li>
                                                        {{ $question->option3 }}
                                                    </li>
                                                    <li>
                                                        {{ $question->option4 }}
                                                    </li>
                                                </ol>
                                            </div>	
                                        </td>
                                        <td>
                                            {{ $question->answer }}
                                        </td>
                                        <td>{{ $question->explanation }}</td>
                                        
                                        <td>
                                            <div>
                                                {{ $question->category->category_name }}
                                            </div>	
                                        </td>
                                        <td class="text-end three-dots">
                                            
                                            
                                            <a href="{{ route('admin.edit.page.question', $question->id) }}" class="btn btn-light">Edit</a>
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

@include('pages.admin.includes.modals.add-question')

@endsection