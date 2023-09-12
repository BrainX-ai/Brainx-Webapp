<style>
    .has-submenu a {
        color: #000;
        border-bottom: #0B0D63;
    }

    .has-submenu a:active {
        color: #0B0D63;
    }

    .bar-icon span {
        background-color: #0B0D63;
    }

    .active-page {
        text-decoration: underline;
    }

    .img-fluid {
        max-width: 70% !important;
        height: auto;
    }

    .mob {
        display: none;
    }

    @media only screen and (max-width:767.98px) {
        .mob {
            display: block;
        }
    }

    @media (min-width: 992px) {
        .main-nav li {
            display: none;
            position: relative;
        }
    }

    .header-navbar-rht li .join-us .btn:hover {
        color: #fff !important;
    }
</style>
<!-- Header -->
<header class="header">
    @if (Auth::check() && Auth::user()->email_verified_at == null)
        <div class="alert alert-info text-center" role="alert">
            Your email is <span class="text-danger"> not</span> verified. Please check your email to verify your
            account.
            <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="d-inline btn btn-primary ms-3  ">
                    Resend email
                </button>.
            </form>
        </div>
    @endif
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="/" class="navbar-brand logo">
                <img src="/assets/img/BrainX_logo.png" class="img-fluid" alt="Logo"><br>

            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="/" class="menu-logo">
                    <img src="assets/img/BrainX_logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times text-primary"></i>
                </a>
            </div>
            <ul class="main-nav">

                {{-- <li class="submenu mob ">
                    <a href="/talent" data-bs-toggle="modal" data-bs-target="#login-modal"
                        class="@if (Request::is('talent')) active-page @endif">Sell AI service</a>
                </li> --}}
                <li class="submenu">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#post-project">

                        Client - Post AI project

                    </a>
                </li>
                <li class="submenu">
                    <a href="/talent" data-bs-toggle="modal" data-bs-target="#client-signin"
                        class="@if (Request::is('talent')) active-page @endif">Login</a>
                </li>

                <li class="submenu">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-feedback"
                        class="@if (Request::is('talent')) active-page @endif">Feedback</a>
                </li>

                <li class="submenu">
                    <a href="/blogs" class="@if (Request::is('talent')) active-page @endif">Blogs</a>
                </li>
                <li class="has-submenu fade" style="width: 200px">
                </li>
                <li class="has-submenu fade" style="width: 100px">
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht reg-head pt-3 pe-5">

            {{-- <li class="submenu">
                <a href="/talent" data-bs-toggle="modal" data-bs-target="#login-modal"
                    class="@if (Request::is('talent')) active-page @endif">Sell AI service</a>
            </li> --}}
            <li class="submenu"><a class="btn join-us">
                    <button class="btn btn-outline-primary  " data-bs-toggle="modal" data-bs-target="#post-project">
                        <div class="text-center"><small>Client</small></div>
                        <div>Post AI project</div>
                    </button>
                </a>
            </li>
            @if (Auth::check())
                @if (Auth::user()->role == 'Client')
                    <li class="submenu">
                        <a href="{{ route('client.messages.all') }}">Dashboard</a>
                    </li>
                @elseif(Auth::user()->role == 'Talent')
                    <li class="submenu">
                        <a href="{{ route('messages.all') }}">Dashboard</a>
                    </li>
                @endif
            @else
                <li class="submenu">
                    <a href="/talent" data-bs-toggle="modal" data-bs-target="#client-signin"
                        class="@if (Request::is('talent')) active-page @endif">Login</a>
                </li>
            @endif

            <li class="submenu">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add-feedback"
                    class="@if (Request::is('talent')) active-page @endif">Feedback</a>
            </li>

            <li class="submenu">
                <a href="/blogs" class="@if (Request::is('talent')) active-page @endif">Blogs</a>
            </li>

            {{-- <li><a href="post-project.html" class="login-btn">Post a Project </a></li> --}}
        </ul>
    </nav>
</header>

@livewire('post-ai-project')
<!-- /Header -->
