<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>@yield('title','Portal Teknik Elektro UNS')</title>

        <meta name="description" content="Portal Teknik Elektro">
        <meta name="author" content="yudhi kusuma">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <!-- <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}"> -->

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('/css/codebase.css') }}">
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{asset('/js/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('/js/plugins/flatpickr/flatpickr.min.css')}}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/corporate.css') }}"> -->
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
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll sidebar-inverse page-header-fixed page-header-modern enable-cookies">
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
                                <a class="link-effect font-w700" href="{{url('/home')}}">
                                    <i class="fa fa-rebel text-primary"></i>
                                    <span class="font-size-xl text-dual-primary-dark">Portal</span><span class="font-size-xl text-primary">Elektro</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side User -->
                    <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <!-- Visible only in mini mode -->
                        <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                        </div>
                        <!-- END Visible only in mini mode -->

                        <!-- Visible only in normal mode -->
                        <div class="sidebar-mini-hidden-b text-center">
                            <a class="img-link" href="javascript:void(0)">
                                <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                            </a>
                            <ul class="list-inline mt-10">
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="{{route('profil.index')}}">{{ Auth::user()->name }}</a>
                                </li>
                                <!-- <li class="list-inline-item">
                                     Layout API, functionality initialized in Template._uiApiLayout() 
                                    <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                        <i class="si si-drop"></i>
                                    </a>
                                </li> -->
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="si si-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Visible only in normal mode -->
                    </div>
                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a class="{{ request()->is('home') ? ' active' : '' }}" href="{{url('/home')}}">
                                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
                                </a>
                            </li>
                            @can('manage-users')
                            <li class="{{ request()->is('admin/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-lock"></i><span class="sidebar-mini-hide">Admin</span></a>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? ' active' : '' }}" href="{{route('admin.users.index')}}">
                                            User Management</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/akademik') || request()->is('admin/akademik/*') ? ' active' : '' }}" href="{{route('admin.akademik.index')}}">
                                            Pembimbing Akademik</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/dosen') || request()->is('admin/dosen/*') ? ' active' : '' }}" href="{{route('admin.dosen.index')}}">
                                            List Dosen</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/mahasiswa') || request()->is('admin/mahasiswa/*') ? ' active' : '' }}" href="{{route('admin.mahasiswa.index')}}">
                                            List Mahasiswa</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/matkul') || request()->is('admin/matkul/*') ? ' active' : '' }}" href="{{route('admin.matkul.index')}}">
                                            List Mata Kuliah</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/user') || request()->is('admin/user/*') ? ' active' : '' }}" href="{{route('admin.user.index')}}">
                                            List User</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/peminatan') || request()->is('admin/peminatan/*') ? ' active' : '' }}" href="{{route('admin.peminatan.index')}}">
                                            List Peminatan</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ruang') || request()->is('admin/ruang/*') ? ' active' : '' }}" href="{{route('admin.ruang.index')}}">
                                            List Ruang</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/jabatan') || request()->is('admin/jabatan/*') ? ' active' : '' }}" href="{{route('admin.jabatan.index')}}">
                                            List TTD Jabatan</a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('dosen')
                            <li class="{{ request()->is('dosen/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Dosen</span></a>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('dosen/akademik') ? ' active' : '' }}" href="{{route('dosen.akademik.index')}}">
                                            Bimbingan Akademik</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('dosen/kp') || request()->is('dosen/kp/*') ? ' active' : '' }}" href="{{route('dosen.kp.index')}}">
                                            Bimbingan KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('dosen/ta') || request()->is('dosen/ta/*') ? ' active' : '' }}" href="{{route('dosen.ta.index')}}">
                                            Bimbingan TA</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('dosen/semhas') || request()->is('dosen/semhas/*') ? ' active' : '' }}" href="{{route('dosen.semhas.index')}}">
                                            Seminar Hasil</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('dosen/pendadaran') || request()->is('dosen/pendadaran/*') ? ' active' : '' }}" href="{{route('dosen.pendadaran.index')}}">
                                            Pendadaran TA</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('dosen/tawaran') || request()->is('dosen/tawaran/*') ? ' active' : '' }}" href="{{route('dosen.tawaran.index')}}">
                                            Tawaran Topik TA</a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('mahasiswa')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">KP</span><span class="sidebar-mini-hidden">Kerja Praktek</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('kp/pendaftaran') || request()->is('kp/pendaftaran') ? ' active' : '' }}" href="{{route('kp.pendaftaran.index')}}">
                                    <i class="si si-badge"></i><span class="sidebar-mini-hide">Pendaftaran KP</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('kp/pelaksanaan/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Pelaksanaan Kerja Praktek</span></a>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('kp/pelaksanaan/cetak_lmbr_tugas') ? ' active' : '' }}" href="{{url('kp/pelaksanaan/cetak_lmbr_tugas')}}" target="_blank">Cetak Lembar Tugas KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('kp/pelaksanaan/cetak_form_nilai') ? ' active' : '' }}" href="{{url('kp/pelaksanaan/cetak_form_nilai')}}" target="_blank">Cetak Form Nilai KP</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="{{ request()->is('kp/selesaikp') || request()->is('kp/selesaikp') ? ' active' : '' }}" href="{{route('kp.selesaikp.index')}}">
                                    <i class="si si-envelope"></i><span class="sidebar-mini-hide">Selesai KP</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('kp/seminar/*') || request()->is('kp/seminar') ? ' active' : '' }}" href="{{url('/kp/seminar')}}">
                                    <i class="si si-layers"></i><span class="sidebar-mini-hide">Seminar KP</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('kp/laporan/*') || request()->is('kp/laporan') ? ' active' : '' }}" href="{{url('/kp/laporan')}}">
                                    <i class="si si-docs"></i><span class="sidebar-mini-hide">Laporan Seminar KP</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">TA</span><span class="sidebar-mini-hidden">Tugas Akhir</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('ta/pendaftaran') || request()->is('ta/pendaftaran/*') ? ' active' : '' }}" href="{{url('/ta/pendaftaran')}}">
                                    <i class="si si-key"></i><span class="sidebar-mini-hide">Pengajuan TA</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('ta/logbook') || request()->is('ta/logbook/*') ? ' active' : '' }}" href="{{url('/ta/logbook')}}">
                                    <i class="si si-book-open"></i><span class="sidebar-mini-hide">Log Book TA</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('ta/semhas') || request()->is('ta/semhas/*') ? ' active' : '' }}" href="{{url('/ta/semhas')}}">
                                    <i class="si si-magic-wand"></i><span class="sidebar-mini-hide">Seminar Hasil</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('ta/pendadaran') || request()->is('ta/pendadaran/*') ? ' active' : '' }}" href="{{url('/ta/pendadaran')}}">
                                    <i class="si si-graduation"></i><span class="sidebar-mini-hide">Pengajuan Pendadaran</span>
                                </a>
                            </li>
                            @endcan
                            @can('koordinatorkp')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">KKP</span><span class="sidebar-mini-hidden">Koordinator KP</span>
                            </li>
                            <li class="{{ request()->is('admin/kp/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bell"></i><span class="sidebar-mini-hide">Kerja Praktek</span></a>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/pembimbing') || request()->is('admin/kp/pembimbing/*') ? ' active' : '' }}" href="{{route('admin.pembimbing.index')}}">
                                            Pembimbing KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/pengajuan') || request()->is('admin/kp/pengajuan/*') ? ' active' : '' }}" href="{{route('admin.pengajuan.index')}}">
                                            Pengajuan KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/permohonan') || request()->is('admin/kp/permohonan/*') ? ' active' : '' }}" href="{{route('admin.permohonan.index')}}">
                                            Permohonan KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/balasan') || request()->is('admin/kp/balasan/*') ? ' active' : '' }}" href="{{route('admin.balasan.index')}}">
                                            Surat Balasan KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/penugasan') || request()->is('admin/kp/penugasan/*') ? ' active' : '' }}" href="{{route('admin.penugasan.index')}}">
                                            Penugasan KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/selesaikp') || request()->is('admin/kp/selesaikp/*') ? ' active' : '' }}" href="{{route('admin.selesaikp.index')}}">
                                            Selesai KP</a>
                                    </li>
                                    <li class="nav-main-heading">
                                        <span class="sidebar-mini-visible">SKP</span><span class="sidebar-mini-hidden">Seminar Kerja Praktek</span>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/listsemkp') ? ' active' : '' }}" href="{{route('admin.listsemkp.index')}}">
                                            List Seminar KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/seminarkp') || request()->is('admin/seminarkp/*') ? ' active' : '' }}" href="{{route('admin.seminarkp.index')}}">
                                            Pendaftaran Seminar KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/presensi') ? ' active' : '' }}" href="{{route('admin.presensi.index')}}">
                                            Presensi Seminar KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/laporan') || request()->is('admin/laporan/*') ? ' active' : '' }}" href="{{route('admin.laporan.index')}}">
                                            Laporan Seminar KP</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/kp/nilaikp') || request()->is('admin/nilaikp/*') ? ' active' : '' }}" href="{{route('admin.nilaikp.index')}}">
                                            Nilai KP</a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('koordinatorta')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">KTA</span><span class="sidebar-mini-hidden">Koordinator TA</span>
                            </li>
                            <li class="{{ request()->is('admin/ta/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-star"></i><span class="sidebar-mini-hide">Tugas Akhir</span></a>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/listta') ? ' active' : '' }}" href="{{route('admin.listta')}}">
                                            List Tugas Akhir</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/pendaftaran') || request()->is('admin/ta/pendaftaran/*') ? ' active' : '' }}" href="{{route('admin.pendaftaran.index')}}">
                                            Pendaftaran Tugas Akhir</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/surattugas') || request()->is('admin/ta/surattugas/*') ? ' active' : '' }}" href="{{route('admin.surattugas.index')}}">
                                            Surat Tugas TA</a>
                                    </li>
                                    <li class="nav-main-heading">
                                        <span class="sidebar-mini-visible">SHTA</span><span class="sidebar-mini-hidden">Seminar Hasil Tugas Akhir</span>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/semhas') || request()->is('admin/ta/semhas/*') ? ' active' : '' }}" href="{{route('admin.semhas.index')}}">
                                            Pendaftaran Semhas TA</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/listsemhas') || request()->is('admin/ta/listsemhas/*') ? ' active' : '' }}" href="{{route('admin.listsemhas.index')}}">
                                            List Seminar Hasil TA</a>
                                    </li>
                                    <li class="nav-main-heading">
                                        <span class="sidebar-mini-visible">PTA</span><span class="sidebar-mini-hidden">Pendadaran Tugas Akhir</span>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/pendadaran') || request()->is('admin/ta/pendadaran/*') ? ' active' : '' }}" href="{{route('admin.pendadaran.index')}}">
                                            Pendadaran TA</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin/ta/listpendadaran') || request()->is('admin/ta/listpendadaran/*') ? ' active' : '' }}" href="{{route('admin.listpendadaran.index')}}">
                                            List Pendadaran TA</a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('koordinatorsel')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">KBS</span><span class="sidebar-mini-hidden">Koordinator SEL</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('sel') || request()->is('sel/*') ? ' active' : '' }}" href="{{route('admin.sel.index')}}">
                                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Koordinator SEL</span>
                                </a>
                            </li>
                            @endcan
                            @can('koordinatorsm')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">KBSM</span><span class="sidebar-mini-hidden">Koordinator SM</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('meka') || request()->is('meka/*') ? ' active' : '' }}" href="{{route('admin.meka.index')}}">
                                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Koordinator SM</span>
                                </a>
                            </li>
                            @endcan
                            @can('koordinatorict')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">KBI</span><span class="sidebar-mini-hidden">Koordinator ICT</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('ict') || request()->is('ict/*') ? ' active' : '' }}" href="{{route('admin.ict.index')}}">
                                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Koordinator ICT</span>
                                </a>
                            </li>
                            @endcan
                            @can('operatorta')
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">OTA</span><span class="sidebar-mini-hidden">Operator TA</span>
                            </li>
                            <li>
                                <a class="{{ request()->is('opta/ta') || request()->is('opta/ta/*') ? ' active' : '' }}" href="{{route('opta.ta.index')}}">
                                    <i class="si si-doc"></i><span class="sidebar-mini-hide">Surat Tugas TA</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('opta/semhas') || request()->is('opta/semhas/*') ? ' active' : '' }}" href="{{route('opta.semhas.index')}}">
                                    <i class="si si-docs"></i><span class="sidebar-mini-hide">Seminar Hasil TA</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('opta/pendadaran') || request()->is('opta/pendadaran/*') ? ' active' : '' }}" href="{{route('opta.pendadaran.index')}}">
                                    <i class="si si-envelope"></i><span class="sidebar-mini-hide">Pendadaran TA</span>
                                </a>
                            </li>
                            @endcan
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
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Layout Options (used just for demonstration) -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
                                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                                <h6 class="dropdown-header">Color Themes</h6>
                                <div class="row no-gutters text-center mb-5">
                                    <div class="col-2 mb-5">
                                        <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-elegance" data-toggle="theme" data-theme="{{ asset('/css/themes/elegance.css') }}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-pulse" data-toggle="theme" data-theme="{{ asset('/css/themes/pulse.css') }}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-flat" data-toggle="theme" data-theme="{{ asset('/css/themes/flat.css') }}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-corporate" data-toggle="theme" data-theme="{{ asset('/css/themes/corporate.css') }}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 mb-5">
                                        <a class="text-earth" data-toggle="theme" data-theme="{{ asset('/css/themes/earth.css') }}" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- <h6 class="dropdown-header">Header</h6>
                                <div class="row gutters-tiny text-center mb-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                                    </div>
                                </div>
                                <h6 class="dropdown-header">Sidebar</h6>
                                <div class="row gutters-tiny text-center mb-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                                    </div>
                                </div>
                                <div class="d-none d-xl-block">
                                    <h6 class="dropdown-header">Main Content</h6>
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                                </div> -->
                            </div>
                        </div>
                        <!-- END Layout Options -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                                <i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                                <a class="dropdown-item" href="{{route('profil.index')}}">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>
                                @can('manage-users')
                                <a class="dropdown-item" href="{{ route('admin.users.index')}}">
                                    <i class="si si-wrench mr-5"></i> User Management
                                </a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="si si-logout mr-5"></i> Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-sm clearfix">
                    <div class="float-right">
                        <strong>Version</strong> 3.1
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Codebase</a> &copy; <span class="js-year-copy">2017</span>
                        <a class="font-w600" href="https://www.instagram.com/ydhiksm/" target="_blank">Yudhi Kusuma</a>. All rights reserved.
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ asset('js/codebase.app.js') }}"></script>
        <script src="{{ asset('js/my.js') }}"></script>
        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{asset('/js/plugins/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('/js/plugins/flatpickr/flatpickr.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
        <!-- <script src="{{asset('/js/pages/be_forms_plugins.min.js')}}"></script> -->

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ asset('js/laravel.app.js') }}"></script> -->

        @yield('js_after')
    </body>
</html>