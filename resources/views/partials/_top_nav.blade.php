<nav class="navbar navbar-light">
    <div class="navbar-left">
        <div class="logo-area">
            <a class="navbar-brand" href="/dashboard">
                <img src="{{ asset('assets/img/logo.png') }}" alt="svg">
            </a>
            <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg') }}" alt="img"></a>
        </div>

        <div class="top-menu">
            <div class="hexadash-top-menu position-relative">
                <ul>
                    <li class="has-subMenu">
                        <a href="#"
                            class="{{ Request::is(app()->getLocale() . '/dashboards/*') ? 'active' : '' }}">Dashboard</a>
                        <ul class="subMenu">

                            <li><a class="{{ Request::is(app()->getLocale() . '/dashboards/demo-two') ? 'active' : '' }}"
                                    href="{{ route('dashboard.demo_two', app()->getLocale()) }}">{{ trans('menu.dashboard-demo-two') }}</a>
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
                <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical" class="svg"></a>
        </div>
    </div>
</nav>
