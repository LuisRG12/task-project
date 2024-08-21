<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <script>
        var APP_URL = '{{ url('/') }}';
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js','public/css/bootstrap.css','public/css/style.css',
            'public/css/nice-select.css', 'public/css/meanmenu.css', 'public/css/animate.css','public/css/owl-carousel.css',
            'public/css/swiper-bundle.css','public/css/backtotop.css', 'public/css/magnific-popup.css', 'public/css/nice-select.css',
             'public/flaticon/flaticon.css', 'public/css/font-awesome-pro.css','public/css/default.css',
            'modules/TaskModule/resources/js/gender-register.js',
            'modules/TaskModule/resources/js/task-loads.js',
            'modules/TaskModule/resources/css/styles.css'
        ])

</head>
<body>


    <header class="header d-blue-bg">
        @include('taskmodule::layouts.partials.header.header-top')
        @include('taskmodule::layouts.partials.header.header-mid')
        @include('taskmodule::layouts.partials.header.header-bottom')
        
    </header>
    <div class="wrapper">
        @include('taskmodule::layouts.partials.header')
        @yield('content')
    </div>
    

    <footer>
        <div class="fotter-area d-dark-bg">
            @include('taskmodule::layouts.partials.footer.footer-top')
            @include('taskmodule::layouts.partials.footer.footer-bottom')
        </div>
    </footer>


    


    <script src="{{ asset('js/vendor/jquery.js') }}"></script>    
    <script src="{{ asset('js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('js/meanmenu.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('js/tweenmax.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <script src="{{ asset('js/parallax.js') }}"></script>
    <script src="{{ asset('js/backtotop.js') }}"></script>
    <script src="{{ asset('js/nice-select.js') }}"></script>
    <script src="{{ asset('js/countdown.min.js') }}"></script>
    <script src="{{ asset('js/counterup.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>