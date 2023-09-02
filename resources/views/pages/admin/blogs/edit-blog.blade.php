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
                    <div class="  card m-2 border-0 col-md-12 ">
                        <form action="{{ route('admin.blog.update', ['id' => $post->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf <!-- Add this if you're using Laravel's built-in CSRF protection -->
                            <label for="image">Image: (1200 x 800)</label><br>
                            <input type="file" id="image" class="form-control" name="image"><br><br>

                            <label for="title">Title:</label><br>
                            <input type="text" id="title" class="form-control  " name="title"
                                value="{{ $post->title }}" required><br><br>
                            <label for="meta_desc">Meta description:</label><br>
                            <textarea name="meta_desc" id="meta_desc" rows="5" class="form-control  ">{{ $post->meta_description }}</textarea>
                            <label for="keywords">Primary keywords:</label><br>
                            <input type="text" id="keywords" class="form-control " name="keywords" required
                                value="{{ $post->keywords }}"><br><br>

                            <label for="content">Content:</label><br>
                            <textarea name="content" id="content" rows="5" class="form-control  " value="">{{ $post->content }}</textarea>

                            <label for="author">Author:</label><br>
                            <input type="text" id="author" name="author" value="{{ $post->author }}"
                                class="form-control  " required><br><br>

                            <button type="submit" class="btn btn-primary">Update Blog Post</button>
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
