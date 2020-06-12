@extends('layouts.frontend')

@section('content')
<!-- Hero -->
<!-- <div class="bg-image bg-image-bottom" style="background-image: url('{{asset('/media/photos/photo34@2x.jpg')}}');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Teknik Elektro</h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Selamat Datang di Portal Elektro!</h2>
            </div>
        </div>
    </div>
</div> -->
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Slider with multiple images and center mode -->
            <div class="block block-rounded">
                <!-- <div class="block-header block-header-default">
                    <h3 class="block-title"><i class="fa fa-play fa-fw text-primary"></i> Multiple Images &amp; Center Mode</h3>
                </div> -->
                    <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-arrows="true"  data-autoplay="true" data-autoplay-speed="3000">
                        <div class="bg-image bg-image-bottom" style="background-image: url('{{asset('/media/photos/photo34@2x.jpg')}}');">
                            <div class="bg-primary-dark-op">
                                <div class="content content-top text-center overflow-hidden">
                                    <div class="pt-50 pb-20">
                                        <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Teknik Elektro</h1>
                                        <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Selamat Datang di Portal Elektro!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-image bg-image-bottom" style="background-image: url('{{asset('/media/photos/photo27@2x.jpg')}}');">
                            <div class="bg-primary-dark-op">
                                <div class="content content-top text-center overflow-hidden">
                                    <div class="pt-50 pb-20">
                                        <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Teknik Elektro</h1>
                                        <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Selamat Datang di Portal Elektro!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div>
                            <img class="img-fluid" src="{{asset('/media/photos/photo27.jpg')}}" alt="">
                        </div>
                        <div>
                            <img class="img-fluid" src="{{asset('/media/photos/photo28.jpg')}}" alt="">
                        </div>
                        <div>
                            <img class="img-fluid" src="{{asset('/media/photos/photo29.jpg')}}" alt="">
                        </div>
                        <div>
                            <img class="img-fluid" src="{{asset('/media/photos/photo25.jpg')}}" alt="">
                        </div>
                        <div>
                            <img class="img-fluid" src="{{asset('/media/photos/photo26.jpg')}}" alt="">
                        </div> -->
                    </div>
            </div>
            <!-- END Slider with multiple images and center mode -->
        </div>
    </div>
    <div class="row invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-transparent text-right bg-gd-dusk" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-bar-chart fa-3x text-elegance-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="8900">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Pengunjung</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-transparent text-right bg-gd-sea" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-trophy fa-3x text-primary-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{$jumhs}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Total Mahasiswa</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-transparent text-right bg-gd-lake" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-envelope-letter fa-3x text-corporate-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{$mhsaktif}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Mahasiswa Aktif</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-transparent text-right bg-gd-emerald" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-fire fa-3x text-earth-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{$mhslulus}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Alumni</div>
                </div>
            </a>
        </div>
        <!-- END Row #1 -->
    </div>
    <div class="block block-rounded bg-primary-dark-op">
        <div class="content content-bottom text-center " style="height: 80px;">
            <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Kerja Praktek</h1>
        </div>
    </div>
    <!-- Open Kerja Praktek -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-rounded">
                <div class="block-header bg-gd-primary">
                    <h3 class="block-title text-white">Kerja Praktek</h3>
                    <div class="block-options">
                        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                        <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                     <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                     <table class="table table-borderless table-striped table-vcenter js-dataTable-full" style="width: 100%;" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none d-sm-table-cell text-center" style="width: 5%;">No</th>
                                <th class="text-center" style="width: 15%;">Nim</th>
                                <th class="text-center" style="width: 25%;">Nama</th>
                                <th class="text-center" style="width: 20%;">Perusahaan</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 25%;">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($listkp as $row)                              
                            <tr>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$no++}}</td>
                                <td class="text-center font-size-sm">{{$row->nim}}</td>
                                <td class="font-w600 font-size-sm text-center">
                                    <a href="#">{{$row->nama_mhs}}</a>
                                </td>
                                <td class="font-size-sm text-center">
                                    {{$row->perusahaan_nama}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{$row->perusahaan_almt}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Kerja Praktek -->
    <!-- Open Seminar KP -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-rounded block-mode-hidden">
                <div class="block-header bg-gd-corporate" >
                    <h3 class="block-title text-white">Seminar Kerja Praktek</h3>
                    <div class="block-options">
                        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                        <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Nim</th>
                                <th class="text-center" style="width: 20%;">Nama</th>
                                <th class="text-center" style="width: 20%;">Judul Seminar</th>
                                <th class="text-center" style="width: 22%;">Tanggal Seminar</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Ruang</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($listseminarkp as $row)                              
                            <tr>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$no++}}</td>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$row->nim}}</td>
                                <td class="font-w600 font-size-sm text-center">
                                    <a href="#">{{$row->nama_mhs}}</a>
                                </td>
                                <td class="font-size-sm text-center">
                                    {{$row->judul_seminar}}
                                </td>
                                <td class="font-size-sm text-center">
                                    {{date("d-m-Y",strtotime($row->tanggal_seminar))}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{$row->nama_ruang}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{date("H:i",strtotime($row->jam_mulai))}} <br>-<br> {{date("H:i",strtotime($row->jam_selesai))}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Seminar KP -->
    <div class="block block-rounded bg-primary-dark-op">
        <div class="content content-bottom text-center " style="height: 80px;">
            <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Tugas Akhir</h1>
        </div>
    </div>
    <!-- Open Tawaran TA -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-rounded block-mode-hidden">
                <div class="block-header bg-gd-cherry">
                    <h3 class="block-title text-white">Tawaran Topik TA</h3>
                    <div class="block-options">
                        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                        <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                                <th class="text-center" style="width: 12%;">Pemberi Topik</th>
                                <th class="text-center" style="width: 12%;">Jenis Topik</th>
                                <th class="text-center" style="width: 12%;">Nama Proyek</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 12%;">Judul Topik</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 12%;">Penjelasan</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 12%;">Hardware</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 12%;">software</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td class="d-none d-sm-table-cell">1</td>
                                <td>Agus Ramelan</td>
                                <td>Topik Tugas Akhir</td>
                                <td>IoT untuk Smart Buildings</td>
                                <td class="d-none d-sm-table-cell">Buildings Energy Management System based on LoRa Modulation</td>
                                <td class="d-none d-sm-table-cell">LoRa merupakan modulasi IoT dengan kehandalan sinyal lebih stabil di daerah-daerah tertutup, 
                                    berbasis frekuensi, low power dan handal. LoRa dapat dijadikan alternatif komunikasi IoT 
                                    dalam manajemen energi di gedung, studi kasus Fakultas Teknik. 
                                    Monotiring energi dapa bermanfaat untuk efesiensi energi.</td>
                                <td class="d-none d-sm-table-cell">Arduino/Raspi, Sensor Arus, Sensor Tegangan, LoRa, Lora Gateway</td>
                                <td class="d-none d-sm-table-cell">Arduino IDE, Python, PowerBi Dashboard, database, web programming</td>
                            </tr> -->
                            <?php $no=1; ?>
                            @foreach ($tawaran as $row)                              
                            <tr>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$no++}}</td>
                                <td class="font-w600 font-size-sm text-justify">
                                    <a href="#">{{$row->nama_dosen}}</a>
                                </td>
                                <td class="font-size-sm text-justify">
                                    {{$row->jenis_topik}}
                                </td>
                                <td class="font-size-sm text-justify">
                                    {{$row->nama_proyek}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-justify">
                                    {{$row->judul_topik}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-justify">
                                    {{$row->penjelasan}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-justify">
                                    {{$row->hardware}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-justify">
                                    {{$row->software}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
    <!-- Close Tawaran TA -->
    <!-- Open Tugas Akhir -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-rounded block-mode-hidden">
                <div class="block-header bg-gd-dusk">
                    <h3 class="block-title text-white">Tugas Akhir</h3>
                    <div class="block-options">
                        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                        <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 7%;">Nim</th>
                                <th class="text-center" style="width: 20%;">Nama</th>
                                <th class="text-center" style="width: 20%;">Judul</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 20%;">KBK TA</th>
                                <th class="text-center" style="width: 20%;">Lama Bimbingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($listta as $row)                              
                            <tr>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$no++}}</td>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$row->nim}}</td>
                                <td class="font-w600 font-size-sm text-center">
                                    <a href="#">{{$row->nama_mhs}}</a>
                                </td>
                                <td class="font-size-sm text-center">
                                    {{$row->judul}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{$row->nama_peminatan}}
                                </td>
                                <td class="font-size-sm text-center font-w700 text-pulse">
                                    {{$diff = Carbon\Carbon::parse($row['tgl_setuju'])->diffInDays($row['tgl_selesai']) ?? $diff = Carbon\Carbon::parse($row->tgl_setuju)->diffInDays() }} Hari
                                    <!-- {{ $diff = Carbon\Carbon::parse($row['tgl_setuju'])->diffInDays(Carbon\Carbon::now()) }} -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Tugas Akhir -->
    <!-- Open Bimbingan Dosen -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-rounded block-mode-hidden">
                <div class="block-header bg-gd-aqua">
                    <h3 class="block-title text-white">Bimbingan Dosen</h3>
                    <div class="block-options">
                        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                        <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">NIP</th>
                                <th class="text-center" style="width: 25%;">Nama</th>
                                <th class="text-center" style="width: 20%;">Total Bimbingan</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Pembimbing 1</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Pembimbing 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($jumlahbimbingan as $row)                              
                            <tr>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$no++}}</td>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$row->nip}}</td>
                                <td class="font-w600 font-size-sm text-center">
                                    <a href="#">{{$row->nama_dosen}}</a>
                                </td>
                                <td class="font-size-sm text-center">
                                    {{$row->total}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{$row->pembimbing1($row->id)}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{$row->pembimbing2($row->id)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Bimbingan Dosen -->
    <!-- Open Log Book TA -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-rounded block-mode-hidden">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title text-white">Log Book Tugas Akhir</h3>
                    <div class="block-options">
                        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                        <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- Block Tabs Animated Slide Up -->
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-block bg-gray-light" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#btabs-animated-slideup-home">Log Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-animated-slideup-profile">Logbook Count</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <div class="tab-pane fade fade-up show active" id="btabs-animated-slideup-home" role="tabpanel">
                                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="example">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                                            <th class="text-center" style="width: 15%;">Nama</th>
                                            <th class="text-center" style="width: 30%;">Kegiatan</th>
                                            <th class="d-none d-sm-table-cell text-center" style="width: 17%;">Hubungan Bab</th>
                                            <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Kendala</th>
                                            <th class="text-center" style="width: 20%;">Rencana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($logbook as $row)                              
                                        <tr>
                                            <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $no++}}</td>
                                            <td class="font-size-sm text-center">
                                                <a href="#">{{ $row->nama_mhs}}</a>
                                            </td>
                                            <td class="text-justify font-size-sm">
                                                {{$row->kegiatan}}
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center">
                                                @if($row->bab == 1)
                                                    BAB 1 PENDAHULUAN
                                                @elseif($row->bab == 2)
                                                    BAB 2 TINJAUAN PUSTAKA
                                                @elseif($row->bab == 3)
                                                    BAB 3 METODOLOGI (JALANNYA PENELITIAN)
                                                @elseif($row->bab == 4)
                                                    BAB 4 HASIL DAN PEMBAHASAN
                                                @elseif($row->bab == 5)
                                                    BAB 5 KESIMPULAN
                                                @endif
                                            </td>
                                            <td class="d-none d-sm-table-cell text-justify">
                                                {{$row->kendala}}
                                            </td>
                                            <td class="text-justify">
                                                {{$row->rencana}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade fade-up" id="btabs-animated-slideup-profile" role="tabpanel">
                                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="example">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                                            <th class="text-center" style="width: 30%;">NIM</th>
                                            <th class="text-center" style="width: 15%;">Nama</th>
                                            <th class="d-none d-sm-table-cell text-center" style="width: 17%;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($jumlogbook as $row)                              
                                        <tr>
                                            <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $no++}}</td>
                                            <td class="text-justify font-size-sm">
                                                {{$row->nim}}
                                            </td>
                                            <td class="font-size-sm text-center">
                                                <a href="#">{{ $row->nama_mhs}}</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-justify">
                                                {{$row->total}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Block Tabs Animated Slide Up -->
                </div>
            </div>
        </div>
    </div>
    <!-- Close Log Book TA -->
</div>
<!-- END Page Content -->
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers('slick'); });</script>
@endsection