@extends('pages.admin.layouts.app')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-md-10">
            <h3 class="page-title">Skills</h3>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-skill">Add new</button>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Table -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Skill Name</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $skill->skill_id }}</td>
                                <td>{{ $skill->skill_name }}</td>
                                <td>{{ $skill->category->category_name }}</td>
                                <td>
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-skill" onclick="replaceCategory('{{ $skill->skill_id }}', '{{ $skill->skill_name }}')">Edit</button>
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
@include('pages.admin.includes.modals.add-skill')
@include('pages.admin.includes.modals.edit-skill')


@section('custom-js')
    <script>

        function replaceCategory(id, skill_name) {

            $('#skill_id').val(id);
            $('#skill_name').val(skill_name);

        }

    </script>
@endsection
@endsection