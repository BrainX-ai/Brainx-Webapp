@extends('app')

@section('seo_content')
    <meta name="description" content="{{ $blog->meta_description }}">
    <meta name="keywords" content="{{ $blog->keywords }}">
    <meta name="author" content="{{ $blog->author }}">
@endsection

@section('content')
    <style>
        .service-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background-position: center;
        }

        ul li {
            margin: 20px 0px;
        }
    </style>
    <div class="container" style="height: 100%;">
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-5 pb-5">
                    <div class="col-md-12  p-3">
                        <div class="blog-view">
                            <div class="blog-single-post pro-post widget-box ps-3">
                                <div class="blog-image offset-md-2 col-md-8">
                                    <a href="javascript:void(0);"><img alt="" src="/uploads/{{ $blog->photo }}"
                                            class="img-fluid"></a>
                                </div>
                                <h3 class="blog-title ps-3">{{ $blog->title }}</h3>
                                <div class="blog-info clearfix">
                                    <div class="post-left ps-3">
                                        <ul>
                                            <li>
                                                <div class="post-author">
                                                    <a>
                                                        <span>{{ $blog->author }}</span></a>
                                                </div>
                                            </li>
                                            <li><a href="#"><i class="far fa-calendar"></i>{{ $blog->created_at }}</a>
                                            </li>
                                            {{-- <li><a href="#"><i class="far fa-comments"></i>12 Comments</a></li> --}}
                                            {{-- <li><i class="fas fa-tags"></i>Study Tips</li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-content ps-3 text-justify">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
