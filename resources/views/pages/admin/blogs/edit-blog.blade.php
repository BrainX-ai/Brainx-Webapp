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
                <h3 class="page-title">Create blog</h3>
            </div>

        </div>
    </div>
    <!-- /Page Header -->

    <!-- Table -->
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="  card m-2 border-0 text-center col-md-12 ">
                        <form action="/blog/update/{{ $post->id }}" method="post">
                            @csrf <!-- Add this if you're using Laravel's built-in CSRF protection -->

                            <label for="title">Title:</label><br>
                            <input type="text" id="title" class="form-control  " name="title"
                                value="{{ $post->title }}" required><br><br>

                            <label for="content">Content:</label><br>
                            <textarea name="content" id="content" rows="5" class="form-control  " value="">{{ $post->content }}</textarea>

                            <label for="author">Author:</label><br>
                            <input type="text" id="author" name="author" value="{{ $post->author }}"
                                class="form-control  " value="{{ $post->title }}" required><br><br>

                            <button type="submit">Update Blog Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/4.21.0/standard-all/ckeditor.js"></script>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script> --}}
    <script>
        var editor = {};
        CKEDITOR.replace('content', {
            extraPlugins: 'editorplaceholder',
            editorplaceholder: `Blog contents here...`,
            removeButtons: 'PasteFromWord'
        });
    </script>
@endsection
