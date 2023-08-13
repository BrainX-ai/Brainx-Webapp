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
</style>
<!-- Header -->
<header class="header">
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
                <img src="assets/img/BrainX_logo.png" class="img-fluid" alt="Logo"><br>

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
                        class="@if (Request::is('talent')) active-page @endif">Sell AI solution/service</a>
                </li> --}}
                <li class="submenu">
                    <a href="/talent" data-bs-toggle="modal" data-bs-target="#client-signin"
                        class="@if (Request::is('talent')) active-page @endif">Login</a>
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
                    class="@if (Request::is('talent')) active-page @endif">Sell AI solution/service</a>
            </li> --}}
            <li class="submenu">
                <a href="/talent" data-bs-toggle="modal" data-bs-target="#client-signin"
                    class="@if (Request::is('talent')) active-page @endif">Login</a>
            </li>

            {{-- <li><a href="post-project.html" class="login-btn">Post a Project </a></li> --}}
        </ul>
    </nav>
</header>
<!-- /Header -->
