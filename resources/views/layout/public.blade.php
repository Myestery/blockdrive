@include('partials._header')

<body class="layout-light side-menu">

    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href="/dashboard">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="svg">
                    </a>
                </div>

                <div class="top-menu">
                    <div class="hexadash-top-menu position-relative">
                        <ul>
                            <li class="has-subMenu">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/dashboards/*') ? 'active' : '' }}">Dashboard</a>
                                <ul class="subMenu">

                                    <li><a class="{{ Request::is(app()->getLocale() . '/dashboard') ? 'active' : '' }}"
                                            href="/dashboard">{{ trans('menu.dashboard-demo-two') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navbar-right">
                <ul class="navbar-right__menu">
                    <li class="nav-search">
                        <a href="#" class="search-toggle">
                            <i class="uil uil-search"></i>
                            <i class="uil uil-times"></i>
                        </a>
                        <form action="/" class="search-form-topMenu">
                            <span class="search-icon uil uil-search"></span>
                            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..."
                                aria-label="Search">
                        </form>
                    </li>

                </ul>
                <div class="navbar-right__mobileAction d-md-none">
                    <a href="#" class="btn-search">
                        <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg feather-search">
                        <img src="{{ asset('assets/img/svg/x.svg') }}" alt="x" class="svg feather-x">
                    </a>
                    <a href="#" class="btn-author-action">
                        <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical"
                            class="svg"></a>
                </div>
            </div>
        </nav>

    </header>
    <main class="main-content">
        <div class="pub" id="app">
            @yield('content')
        </div>
        <footer class="footer-wrapper">
            @include('partials._footer')
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
        @include('partials._customizer')
    </div>

    <script>
        var env = {
            iconLoaderUrl: "{{ asset('assets/js/json/icons.json') }}",
            googleMarkerUrl: "{{ asset('assets/img/markar-icon.png') }}",
            editorIconUrl: "{{ asset('assets/img/ui/icons.svg') }}",
            mapClockIcon: "{{ asset('assets/img/svg/clock-ticket1.sv') }}g"
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
    @production
        <script src="{{ asset('js/app.min.js') }}"></script>
    @endproduction
    @env('local')
    <script src="{{ asset('js/app.js') }}"></script>
    @endenv
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>
