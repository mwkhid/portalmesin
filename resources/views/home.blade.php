@extends('layouts.backend')

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-sm-4">
            <!-- User Info -->
            <div class="row">
                <div class="col-md-12">
                    @can('mahasiswa')
                    <div class="block block-rounded text-center bg-primary-dark">
                        <div class="block-content block-content-full">
                            <img class="img-avatar img-avatar-thumb" src="{{asset('/media/avatars/avatar8.jpg')}}" alt="">
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-black-op">
                            <div class="font-w600 text-white mb-5">{{$mhs->nama_mhs}}</div>
                            <div class="font-size-sm text-white-op">{{$mhs->nim}}</div>
                            <div class="font-size-sm text-white-op">Angkatan {{$mhs->angkatan}}</div>
                        </div>
                    </div>
                    @endcan
                    @if(Auth::user()->can('manage-users') || Auth::user()->can('koordinatorta')
                    || Auth::user()->can('koordinatorkp') || Auth::user()->can('dosen'))
                    <div class="block block-rounded text-center">
                        <div class="block-content block-content-full bg-primary-dark block-sticky-option pt-30">
                            <img class="img-avatar img-avatar-thumb" src="{{asset('/media/avatars/avatar8.jpg')}}" alt="">
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <div class="font-w600 mb-5">{{ $dosen->nama_dosen ?? '' }}</div>
                            <div class="font-size-sm text-muted">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-md-12">
                                    <div class="font-size-h5 text-black"><strong>Jabatan : </strong></div>
                                    <div class="font-size-sm text-black">{{implode(", \n" ,$user->roles()->get()->pluck('name')->toArray())}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>               
                @can('mahasiswa')
                <!-- Data Diri -->
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="row pt-10 pb-10 text-center h-50">
                                <div class="col-6 border-r">
                                    <div class="font-size-h3 font-w600 text-primary">{{$mhs->sks}}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">SKS</div>
                                </div>
                                <div class="col-6">
                                    <div class="font-size-h3 font-w600 text-earth">{{$mhs->ipk}}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">IPK</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-content block-content-full">
                            <div class="row pt-10 pb-10 text-center h-50">
                                <div class="col-12 border-b">
                                    <div class="font-size-sm font-w600 text-elegance">{{$mhs->nama_dosen}}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pembimbing Akademik</div>
                                </div>
                                <div class="col-12">
                                    <div class="font-size-h5 font-w600 text-pulse">{{$mhs->status_mhs}}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Status Mahasiswa</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Data Diri -->
                @endcan
            </div>
            <!-- END User Info -->
        </div>
        <div class="col-sm-8 clearfix">
            <!-- Open Mahasiswa -->
            @can('mahasiswa')
            <!-- Data Diri -->
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-4">
                    <a class="block block-rounded block-transparent text-center bg-corporate" href="{{route('kp.pendaftaran.index')}}">
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white-op">
                                <i class="fa fa-envelope-square mr-5"></i> KERJA PRAKTEK
                            </p>
                        </div>
                        <div class="block-content">
                            <p class="font-size-h4 font-w600 text-white">
                                <strong>
                                    @if($kp != null)
                                        @if($kp->status_kp == 'PENDING')
                                            PENDING
                                        @elseif($kp->status_kp == 'EDIT')
                                            BELUM SETUJU
                                        @elseif($kp->status_kp == 'WAITING')
                                            WAITING
                                        @elseif($kp->status_kp == 'SETUJU')
                                            DISETUJUI
                                        @elseif($kp->status_kp == 'TOLAK')
                                            DITOLAK
                                        @endif
                                    @else
                                        BELUM DAFTAR
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="block block-rounded block-transparent text-center bg-gd-lake" href="{{route('kp.seminar.index')}}">
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white-op">
                                <i class="fa fa-tasks mr-5"></i> SEMINAR KP
                            </p>
                        </div>
                        <div class="block-content">
                            <p class="font-size-h4 font-w600 text-white">
                                <strong>
                                    @if($semkp != null)
                                        @if($semkp->status_seminarkp == 'PENDING')
                                            MENUNGGU
                                        @elseif($semkp->status_seminarkp == 'SETUJU')
                                            DISETUJUI
                                        @elseif($semkp->status_seminarkp == 'TOLAK')
                                            DITOLAK
                                        @endif
                                    @else
                                        BELUM DAFTAR
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="block block-rounded block-transparent text-center bg-flat" href="{{route('ta.pendaftaran.index')}}">
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white-op">
                                <i class="fa fa-key mr-5"></i> TUGAS AKHIR
                            </p>
                        </div>
                        <div class="block-content">
                            <p class="font-size-h4 font-w600 text-white">
                                <strong>
                                    @if($ta != null)
                                        @if($ta->status_ta == 'PENDING')
                                            MENUNGGU
                                        @elseif($ta->status_ta == 'SETUJU')
                                            DISETUJUI
                                        @elseif($ta->status_ta == 'TOLAK')
                                            DITOLAK
                                        @endif
                                    @else
                                        BELUM DAFTAR
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-6">
                    <a class="block block-rounded block-transparent text-center bg-gd-sun" href="{{route('ta.semhas.index')}}">
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white-op">
                                <i class="fa fa-magic mr-5"></i> SEMINAR HASIL TUGAS AKHIR
                            </p>
                        </div>
                        <div class="block-content">
                            <p class="font-size-h4 font-w600 text-white">
                                <strong>
                                    @if($semhas != null)
                                        @if($semhas->status_seminar == 'PENDING')
                                            MENUNGGU
                                        @elseif($semhas->status_seminar == 'SETUJU')
                                            DISETUJUI
                                        @elseif($semhas->status_seminar == 'TOLAK')
                                            DITOLAK
                                        @endif
                                    @else
                                        BELUM DAFTAR
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded block-transparent text-center bg-pulse" href="{{route('ta.pendadaran.index')}}">
                        <div class="block-content bg-black-op-5">
                            <p class="font-w600 text-white-op">
                                <i class="fa fa-mortar-board mr-5"></i> PENDADARAN TUGAS AKHIR
                            </p>
                        </div>
                        <div class="block-content">
                            <p class="font-size-h4 font-w600 text-white">
                                <strong>
                                    @if($pendadaran != null)
                                        @if($pendadaran->status_pendadaran == 'PENDING')
                                            MENUNGGU
                                        @elseif($pendadaran->status_pendadaran == 'SETUJU')
                                            DISETUJUI
                                        @elseif($pendadaran->status_pendadaran == 'TOLAK')
                                            DITOLAK
                                        @endif
                                    @else
                                        BELUM DAFTAR
                                    @endif
                                </strong>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            <!-- Close Mahasiswa  -->
            <!-- Open Dosen  -->
            @can('dosen')
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('dosen.ta.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-primary">
                            <div class="ribbon-box">
                                {{$bimbinganta}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-book fa-3x text-primary mb-15 float-left"></i>
                                <h5 class="mb-0">Bimbingan TA</h5>
                                <div class="text-muted">Membutuhkan Konfirmasi Dosen</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('dosen.semhas.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-warning">
                            <div class="ribbon-box">
                                {{$bimbingansemhas}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-comments fa-3x text-warning mb-15 float-left"></i>
                                <h5 class="mb-0">Penguji Semhas</h5>
                                <div class="text-muted">Membutuhkan Konfirmasi Dosen</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row invisible"  data-toggle="appear">
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('dosen.pendadaran.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-info">
                            <div class="ribbon-box">
                                {{$bimbinganpendadaran}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-suitcase fa-3x text-info mb-15 float-left"></i>
                                <h5 class="mb-0">Penguji Pendadaran</h5>
                                <div class="text-muted">Membutuhkan Konfirmasi Dosen</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('dosen.logbookta.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-danger">
                            <div class="ribbon-box">
                                {{$logbookta}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-bell fa-3x text-danger mb-15 float-left"></i>
                                <h5 class="mb-0">Logbook TA Mahasiswa</h5>
                                <div class="text-muted">Membutuhkan Review Dosen</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            <!-- Close Dosen -->
            <!-- Open Koordinator Kp  -->
            @can('koordinatorkp')
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('admin.pengajuan.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-primary">
                            <div class="ribbon-box">
                                {{$kp ?? ''}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-envelope-square fa-3x text-primary mb-15 float-left"></i>
                                <h5 class="mb-0">Mahasiswa Mendaftar Kerja Praktek</h5>
                                <div class="text-muted">Mohon segera berikan tanggapan</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('admin.seminarkp.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-info">
                            <div class="ribbon-box">
                                {{$semkp ?? ''}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-tasks fa-3x text-info mb-15 float-left"></i>
                                <h5 class="mb-0">Mahasiswa Mendaftar Seminar KP</h5>
                                <div class="text-muted">Mohon segera berikan tanggapan</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            <!-- Close Koordinator Kp  -->
            <!-- Open Koordinator Ta -->
            @can('koordinatorta')
            <div class="row invisible" data-toggle="appear">
                @if($tapending ?? '' != 0)
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('admin.pendaftaran.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-success">
                            <div class="ribbon-box">
                                {{$tapending ?? '' }}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-key fa-3x text-success mb-15 float-left"></i>
                                <h5 class="mb-0">Tugas Akhir</h5>
                                <div class="text-muted">Membutuhkan Konfirmasi Koordinator TA</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @if($semhaspending ?? '' != 0)
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('admin.semhas.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-warning">
                            <div class="ribbon-box">
                                {{$semhaspending ?? ''}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-magic fa-3x text-warning mb-15 float-left"></i>
                                <h5 class="mb-0">Seminar Hasil</h5>
                                <div class="text-muted">Membutuhkan Konfirmasi Koordinator TA</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @if($pendadaranpending ?? '' != 0)
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('admin.pendadaran.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-danger">
                            <div class="ribbon-box">
                                {{$pendadaranpending ?? ''}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-mortar-board fa-3x text-danger mb-15 float-left"></i>
                                <h5 class="mb-0">Pendadaran TA</h5>
                                <div class="text-muted">Membutuhkan Konfirmasi Koordinator TA</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
            @endcan
            <!-- Close Koordinator Ta  -->
            <!-- Open Operator Ta -->
            @can('operatorta')
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('opta.ta.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-success">
                            <div class="ribbon-box">
                                {{$ta}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-key fa-3x text-success mb-15 float-left"></i>
                                <h5 class="mb-0">Tugas Akhir</h5>
                                <div class="text-muted">Membutuhkan Surat Tugas TA</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('opta.semhas.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-warning">
                            <div class="ribbon-box">
                                {{$semhas}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-magic fa-3x text-warning mb-15 float-left"></i>
                                <h5 class="mb-0">Seminar Hasil</h5>
                                <div class="text-muted">Membutuhkan Berkas Semhas TA</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded" href="{{route('opta.pendadaran.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-danger">
                            <div class="ribbon-box">
                                {{$pendadaran}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-mortar-board fa-3x text-danger mb-15 float-left"></i>
                                <h5 class="mb-0">Pendadaran TA</h5>
                                <div class="text-muted">Membutuhkan Berkas Pendadaran TA</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            <!-- Close Operator Ta -->
            <!-- Open Koorditanor KBK -->
            @can('koordinatorsel')
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <a class="block block-rounded" href="{{route('admin.sel.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-primary">
                            <div class="ribbon-box">
                                {{$sel}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-envelope-square fa-3x text-primary mb-15 float-left"></i>
                                <h5 class="mb-0">Koordinator SEL</h5>
                                <div class="text-muted">Mohon segera berikan tanggapan</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            @can('koordinatorsm')
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <a class="block block-rounded" href="{{route('admin.meka.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-primary">
                            <div class="ribbon-box">
                                {{$meka}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-envelope-square fa-3x text-primary mb-15 float-left"></i>
                                <h5 class="mb-0">Koordinator MEKA</h5>
                                <div class="text-muted">Mohon segera berikan tanggapan</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            @can('koordinatorict')
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <a class="block block-rounded" href="{{route('admin.ict.index')}}">
                        <div class="block-content block-content-full ribbon ribbon-modern ribbon-primary">
                            <div class="ribbon-box">
                                {{$ict}}
                            </div>
                            <div class="text-center py-30">
                                <i class="fa fa-envelope-square fa-3x text-primary mb-15 float-left"></i>
                                <h5 class="mb-0">Koordinator ICT</h5>
                                <div class="text-muted">Mohon segera berikan tanggapan</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endcan
            <!-- Close Koorditanor KBK -->
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection
