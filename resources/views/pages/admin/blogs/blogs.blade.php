@extends('pages.admin.layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="page-title">Blogs</h3>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add
                    new</a>
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
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->title }}</td>

                                        <td>{{ $blog->author }}</td>
                                        @if ($blog->status == 'UNPUBLISHED')
                                            <td> <span class="badge badge-danger ">{{ $blog->status }}</span></td>
                                        @else
                                            <td> <span class="badge badge-success ">{{ $blog->status }}</span> </td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.blog.edit', ['slug' => $blog->slug]) }}"
                                                class="btn btn-danger">Edit</a>
                                            <a class="btn btn-info"
                                                href="{{ route('admin.blog.show', ['slug' => $blog->slug]) }}">View</a>
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
