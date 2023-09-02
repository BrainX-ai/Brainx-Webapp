@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h2 class="mt-5 mb-5 text-center">Blogs</h2>
                <div class="col-lg-8 offset-lg-2 col-md-12">

                    <div class="row blog-grid-row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">
                                            @if ($blog->photo)
                                                <img src="/uploads/{{ $blog->photo }}" alt="Post Image">
                                        </a>
                                    @else
                                        <img src="/assets/img/BrainX/X.png" alt="Post Image"></a>
                        @endif
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">
                            <li>
                                <div class="post-author">
                                    <a> <span> {{ $blog->author }}</span></a>
                                </div>
                            </li>
                            <li><i class="far fa-clock"></i> {{ $blog->created_at }}</li>
                        </ul>
                        <h3 class="blog-title"><a
                                href="{{ route('blog.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="mb-0">
                            {{ substr(strip_tags($blog->content), 0, 50) . (strlen(strip_tags($blog->content)) > 50 ? '...' : '') }}
                        </p>
                    </div>
                </div>
                <!-- /Blog Post -->

            </div>
            @endforeach


        </div>

        <!-- Blog Pagination -->
        {{-- <div class="row">
                        <div class="col-md-12">
                            <ul class="paginations list-pagination">
                                <li class="page-item"><a href="#">Previous</a></li>
                                <li class="page-item"><a href="#" class="active">1</a></li>
                                <li class="page-item"><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div> --}}
        <!-- /Blog Pagination -->

    </div>

    <!-- Blog Sidebar -->
    {{-- <div class="col-lg-4 col-md-12 sidebar-right ">

                    <!-- Latest Posts -->
                    <div class=" pro-post widget-box post-widget">
                        <h4 class="pro-title">Latest Posts</h4>
                        <div class="pro-content pt-0">
                            <ul class="latest-posts">
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="assets/img/blog/blog-thumb-03.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
                                            <a href="blog-details.html">Kofejob - How to get job through online?</a>
                                        </h4>
                                        <a href="#" class="posts-date"><i class="far fa-calendar-alt"></i> 2 May
                                            2021</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="assets/img/blog/blog-thumb-02.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
                                            <a href="blog-details.html">People who completed NAND technology got job 90%
                                            </a>
                                        </h4>
                                        <a href="#" class="posts-date"><i class="far fa-calendar-alt"></i> 3 May
                                            2021</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="assets/img/blog/blog-thumb-01.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
                                            <a href="blog-details.html">There are many variations of passages</a>
                                        </h4>
                                        <a href="#" class="posts-date"><i class="far fa-calendar-alt"></i> 4 May
                                            2021</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Latest Posts -->



                    <!-- Share Widget -->
                    <div class="pro-post widget-box post-widget">
                        <h3 class="pro-title">Share</h3>
                        <div class="pro-content">
                            <a href="#" class="share-icon"><i class="fas fa-share-alt"></i> Share</a>
                        </div>
                    </div>
                    <!-- /Share Widget -->

                </div> --}}
    <!-- /Blog Sidebar -->

    </div>
    </div>
    </div>
    <!-- /Page Content -->
    @include('includes.feedback-modal')
    @include('includes.modals.login-modal')
    @include('includes.modals.desktop-msg')
    @include('pages.client.includes.modals.signup')
    @include('pages.client.includes.modals.signin')
@endsection
