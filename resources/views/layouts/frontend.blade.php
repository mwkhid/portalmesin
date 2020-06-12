<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Portal Teknik Elektro UNS</title>

        <meta name="description" content="Portal Teknik Elektro">
        <meta name="author" content="yudhi kusuma">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <!-- <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}"> -->

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.css')}}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('/css/codebase.css') }}">

        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class=" sidebar-inverse enable-page-overlay side-scroll page-header-fixed page-header-inverse">
            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">p</span><span class="text-primary">e</span>
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->

                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="{{url('/')}}">
                                    <span class="font-size-xl text-white">Portal</span><span class="font-size-xl text-white"> Elektro</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a class="{{ request()->is('/login') ? ' active' : '' }}" href="{{url('/login')}}">
                                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Login</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">P</span><span class="sidebar-mini-hidden">Panduan</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('kp/seminar') ? ' active' : '' }}" href="{{url('#')}}">
                                    <i class="si si-note"></i><span class="sidebar-mini-hide">Kerja Praktek</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('kp/seminar') ? ' active' : '' }}" href="{{url('#')}}">
                                    <i class="si si-notebook"></i><span class="sidebar-mini-hide">Tugas Akhir</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header bg-gd-primary">
                    <!-- Left Section -->
                    <div class="content-header-section w-100">
                        <!-- Toggle Sidebar -->
                        <div class="row no-gutters">
                            <div class="col">
                                <!-- Toggle Sidebar -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                                    <i class="fa fa-navicon"></i>
                                </button>
                                <!-- END Toggle Sidebar -->

                                <!-- Header Navigation -->
                                <!--
                                Desktop Navigation, mobile navigation can be found in #sidebar

                                If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                                If your sidebar menu includes headings, they won't be visible in your header navigation by default
                                If your sidebar menu includes icons and you would like to hide them, you can add the class 'nav-main-header-no-icons'
                                -->
                                <ul class="nav-main-header">
                                    <li>
                                        <a class="font-w700" href="">
                                            <span class="d-none d-md-inline-block">
                                                <span class="font-size-xl text-white">Portal</span><span class="font-size-xl text-white"> Elektro</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- END Header Navigation -->
                            </div>
                            <div class="col text-right">
                                <!-- Open Search Section -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <!-- <button type="button" class="btn btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                                    <i class="fa fa-search"></i>
                                </button> -->
                                <!-- END Open Search Section -->

                                <!-- Compose -->
                                <a type="button" class="btn btn-warning ml-5 d-none d-sm-inline" href="{{url('/login')}}">
                                    <i class="si si-login text-white"></i>
                                    <span class="d-none d-sm-inline text-white">Login</span>
                                </a>
                                <!-- END Compose -->
                            </div>
                        </div>
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button> -->
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Left Section -->
                </div>
                <!-- END Header Content -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

            @yield('content');

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-sm clearfix">
                    <div class="text-center">
                        &copy; <span class="js-year-copy">2020</span>
                        <a class="font-w600" href="https://www.instagram.com/ydhiksm/" target="_blank">Yudhi Kusuma</a>. All rights reserved.
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ asset('js/codebase.app.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
        <script src="{{ asset('js/plugins/slick/slick.min.js')}}"></script>

        @yield('js_after')
    </body>
</html>
