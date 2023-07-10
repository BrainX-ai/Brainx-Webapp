<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link rel="stylesheet" href="/assets/css/feather.css">
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
        @if (Request::is('/') || Request::is('talent') || Request::is('terms-of-service') || Request::is('privacy-policy'))
            @include('includes.header')
        @else
            @include('pages.talent.includes.header')
        @endif
        @yield('content')
        @if (Request::is('/') || Request::is('talent') || Request::is('terms-of-service') || Request::is('privacy-policy'))
            @include('includes.footer')
        @endif
    </div>

    <!-- jQuery -->
    <script src="/assets/js/jquery-3.6.1.min.js"></script>

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

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

    @yield('custom-js')
    @yield('custom-edit-js')
    @yield('feedback-js')
    @yield('invitation-js')
    @yield('add-milestone-js')
    @yield('is-email-exist-js')
    @yield('chat-js')
    @yield('edit-profile-js')
</body>

</html>
