<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HQ72BVH2MS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-HQ72BVH2MS');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ 'https://brainx.biz/assets/img/BrainX_logo.png' }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title inertia>{{ config('app.name', 'BrainX') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/BrainX_logo.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">


    <!-- Feather CSS -->
    {{-- <link rel="stylesheet" href="/assets/css/feather.css"> --}}
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">

    <!-- Aos CSS -->
    <link rel="stylesheet" href="/assets/plugins/aos/aos.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">

    <!-- Main CSS -->
    {{-- <link rel="stylesheet" href="admin/css/style.css"> --}}

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "hut3byzihx");
    </script>

    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body class="home-page bg-one">
    <!-- Loader -->
    <div id="global-loader">
        <div class="whirly-loader"> </div>
        <div class="loader-img">
            <img src="/assets/img/BrainX/X.png" class="img-fluid" alt="">
        </div>
    </div>
    <!-- Loader -->
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @if (Request::is('/') ||
                Request::is('talent') ||
                Request::is('faq') ||
                Request::is('terms-of-service') ||
                Request::is('privacy-policy'))
            @include('includes.header')
        @else
            @include('pages.talent.includes.header')
        @endif
        @yield('content')
        @if (Request::is('/') ||
                Request::is('talent') ||
                Request::is('terms-of-service') ||
                Request::is('faq') ||
                Request::is('privacy-policy'))
            @include('includes.footer')
        @endif
    </div>

    <!-- jQuery -->
    <script src="/assets/js/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel -->
    <script src="/assets/js/owl.carousel.min.js"></script>

    <!-- counterup JS -->
    <script src="/assets/js/jquery.waypoints.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>

    <!-- Aos -->
    <script src="/assets/plugins/aos/aos.js"></script>

    <!-- Select2 JS -->
    <script src="/assets/plugins/select2/js/select2.min.js"></script>

    <!-- Slick JS -->
    <script src="/assets/js/slick.js"></script>

    <!-- Custom JS -->
    <script src="/assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

    @livewireScripts

    @yield('custom-js')
    @yield('custom-edit-js')
    @yield('feedback-js')
    @yield('invitation-js')
    @yield('add-milestone-js')
    @yield('is-email-exist-js')
    @yield('chat-js')
    @yield('edit-profile-js')
    @yield('add-service-js')
</body>

</html>
