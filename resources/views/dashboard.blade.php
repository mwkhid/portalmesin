@extends('layouts.frontend')

@section('content')
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('{{asset('/media/photos/photo34@2x.jpg')}}');">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Dashboard</h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Welcome to Portal Elektro!</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <div class="row invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-12 col-md-6">
            <a class="block block-link-pop text-right bg-primary" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-bar-chart fa-3x text-primary-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="8900">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Pengunjung</div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a class="block block-link-pop text-right bg-earth" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-trophy fa-3x text-earth-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{$jumhs}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Total Mahasiswa</div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a class="block block-link-pop text-right bg-elegance" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-envelope-letter fa-3x text-elegance-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{$mhsaktif}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Mahasiswa Aktif</div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a class="block block-link-pop text-right bg-corporate" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-fire fa-3x text-corporate-light"></i>
                    </div>
                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{$mhslulus}}">0</div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Alumni</div>
                </div>
            </a>
        </div>
        <!-- END Row #1 -->
    </div>
    <div class="bg-primary-dark-op">
        <div class="content content-bottom text-center " style="height: 80px;">
            <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Kerja Praktek</h1>
        </div>
    </div>
    <!-- Open Kerja Praktek -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-mode-hidden">
                <div class="block-header" style="background-color: #30acb2;">
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
            <div class="block block-mode-hidden">
                <div class="block-header" style="background-color: #30acb2;">
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
    <div class="bg-primary-dark-op">
        <div class="content content-bottom text-center " style="height: 80px;">
            <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Tugas Akhir</h1>
        </div>
    </div>
    <!-- Open Tawaran TA -->
    <div class="row invisilbe" data-toogle="appear">
        <div class="col-md-12">
            <div class="block block-mode-hidden">
                <div class="block-header" style="background-color: #e8405f;">
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
            <div class="block block-mode-hidden">
                <div class="block-header" style="background-color: #e87640;">
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
                                <th class="text-center" style="width: 15%;">Nim</th>
                                <th class="text-center" style="width: 25%;">Nama</th>
                                <th class="text-center" style="width: 20%;">Judul</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 27%;">KBK TA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($listta as $row)                              
                            <tr>
                                <td class="d-none d-sm-table-cell text-center font-size-sm">{{$no++}}</td>
                                <td class="text-center font-size-sm">{{$row->nim}}</td>
                                <td class="font-w600 font-size-sm text-center">
                                    <a href="#">{{$row->nama_mhs}}</a>
                                </td>
                                <td class="font-size-sm text-center">
                                    {{$row->judul}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm text-center">
                                    {{$row->nama_peminatan}}
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
            <div class="block block-mode-hidden">
                <div class="block-header" style="background-color: #30b27c;">
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
            <div class="block block-mode-hidden">
                <div class="block-header" style="background-color: #e8405f;">
                    <h3 class="block-title text-white">Log Book Tugas Akhir</h3>
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
            </div>
        </div>
    </div>
    <!-- Close Log Book TA -->
    
</div>
<!-- END Page Content -->
@endsection