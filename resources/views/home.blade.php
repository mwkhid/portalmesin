@extends('layouts.backend')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('{{asset('media/photos/photo13@2x.jpg')}}');">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('media/avatars/avatar9.jpg')}}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->
                @can('mahasiswa')
                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{$mhs->nama_mhs}}</h1>
                <h2 class="h3 text-white font-w700 mb-10">{{$mhs->nim}}</h2>
                <h2 class="h5 text-white-op">
                    Angkatan <a class="text-primary-light" href="javascript:void(0)">{{$mhs->angkatan}}</a>
                </h2>
                @endcan
                @if(Auth::user()->can('manage-users') || Auth::user()->can('koordinatorta')
                || Auth::user()->can('koordinatorkp') || Auth::user()->can('dosen'))
                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{ $dosen->nama_dosen ?? '' }}</h1>
                <span class="text-primary font-w700 mb-10">{{implode(", \n" ,$user->roles()->get()->pluck('name')->toArray())}}</span>
                <h2 class="h3 text-white font-w700 mb-10">{{ Auth::user()->email }}</h2>
                @endif
            </div>
        </div>
    </div>
    <!-- END User Info -->
    <!-- Open Mahasiswa -->
    @can('mahasiswa')
    <!-- Data Diri -->
    <!-- <h2 class="content-heading">
        <button type="button" class="btn btn-sm btn-rounded btn-alt-secondary float-right">View More..</button>
        <i class="si si-user mr-5"></i> Data Diri
    </h2> -->
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-6">
            <a class="block" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <i class="si si-notebook fa-2x text-body-bg-dark"></i>
                    <div class="row pt-10 pb-30 text-center h-50">
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
            </a>
        </div>
        <div class="col-md-6">
            <a class="block" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="text-right">
                        <i class="si si-book-open fa-2x text-body-bg-dark"></i>
                    </div>
                    <div class="row pt-10 pb-30 text-center h-50">
                        <div class="col-6 border-r">
                            <div class="font-size-sm font-w600 text-elegance">{{$mhs->nama_dosen}}</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Pembimbing Akademik</div>
                        </div>
                        <div class="col-6">
                            <div class="font-size-h3 font-w600 text-pulse">{{$mhs->status_mhs}}</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Status Mahasiswa</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Data Diri -->
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-envelope-square fa-4x text-primary"></i>
                        </div>
                        <div class="font-size-h4 font-w600">
                            @if($kp != null)
                                @if($kp->status_kp == 'PENDING')
                                    <span class="text-warning">Menunggu Persetujuan Koordinator KP</span>
                                @elseif($kp->status_kp == 'WAITING')
                                    <span class="text-info">Menunggu Berkas dan Balasan</span>
                                @elseif($kp->status_kp == 'SETUJU')
                                    <span class="text-success">DISETUJUI</span>
                                @elseif($kp->status_kp == 'TOLAK')
                                    <span class="text-danger">DITOLAK</span>
                                @endif
                            @else
                                Belum Daftar
                            @endif
                        </div>
                        <!-- <div class="text-muted">Kerja Praktek</div> -->
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-primary" href="{{route('kp.pendaftaran.index')}}">
                                Kerja Praktek
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-tasks fa-4x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600">
                            @if($semkp != null)
                                @if($semkp->status_seminarkp == 'PENDING')
                                    <span class="text-warning">MENUNGGU</span>
                                @elseif($semkp->status_seminarkp == 'SETUJU')
                                    <span class="text-success">DISETUJUI</span>
                                @elseif($semkp->status_seminarkp == 'TOLAK')
                                    <span class="text-danger">DITOLAK</span>
                                @endif
                            @else
                                Belum Daftar
                            @endif
                        </div>
                        <!-- <div class="text-muted">Seminar Kerja Praktek</div> -->
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-info" href="{{route('kp.seminar.index')}}">
                                Seminar Kerja Praktek
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-key fa-4x text-success"></i>
                        </div>
                        <div class="font-size-h4 font-w600">
                            @if($ta != null)
                                @if($ta->status_ta == 'PENDING')
                                    <span class="text-warning">MENUNGGU</span>
                                @elseif($ta->status_ta == 'SETUJU')
                                    <span class="text-success">DISETUJUI</span>
                                @elseif($ta->status_ta == 'TOLAK')
                                    <span class="text-danger">DITOLAK</span>
                                @endif
                            @else
                                Belum Daftar
                            @endif
                        </div>
                        <!-- <div class="text-muted">Tugas Akhir</div> -->
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-success" href="{{route('ta.pendaftaran.index')}}">
                                Tugas Akhir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-6">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-magic fa-4x text-warning"></i>
                        </div>
                        <div class="font-size-h4 font-w600">
                            @if($semhas != null)
                                @if($semhas->status_seminar == 'PENDING')
                                    <span class="text-warning">MENUNGGU</span>
                                @elseif($semhas->status_seminar == 'SETUJU')
                                    <span class="text-success">DISETUJUI</span>
                                @elseif($semhas->status_seminar == 'TOLAK')
                                    <span class="text-danger">DITOLAK</span>
                                @endif
                            @else
                                Belum Daftar
                            @endif
                        </div>
                        <!-- <div class="text-muted">Seminar Hasil Tugas Akhir</div> -->
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-warning" href="{{route('ta.semhas.index')}}">
                                Seminar Hasil Tugas Akhir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-mortar-board fa-4x text-danger"></i>
                        </div>
                        <div class="font-size-h4 font-w600">
                            @if($pendadaran != null)
                                @if($pendadaran->status_pendadaran == 'PENDING')
                                    <span class="text-warning">MENUNGGU</span>
                                @elseif($pendadaran->status_pendadaran == 'SETUJU')
                                    <span class="text-success">DISETUJUI</span>
                                @elseif($pendadaran->status_pendadaran == 'TOLAK')
                                    <span class="text-danger">DITOLAK</span>
                                @endif
                            @else
                                Belum Daftar
                            @endif
                        </div>
                        <!-- <div class="text-muted">Pendadaran Tugas Akhir</div> -->
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-danger" href="{{route('ta.pendadaran.index')}}">
                                Pendadaran Tugas Akhir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <!-- Close Mahasiswa  -->
    <!-- Open Dosen  -->
    @can('dosen')
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-book fa-4x text-primary"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$bimbinganta}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Konfirmasi Dosen</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-primary" href="{{route('dosen.ta.index')}}">
                                Bimbingan TA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-comments fa-4x text-warning"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$bimbingansemhas}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Konfirmasi Dosen</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-warning" href="{{route('dosen.semhas.index')}}">
                                Penguji Semhas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-suitcase fa-4x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$bimbinganpendadaran}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Konfirmasi Dosen</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-info" href="{{route('dosen.pendadaran.index')}}">
                                Penguji Pendadaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <!-- Close Dosen -->
    <!-- Open Koordinator Kp  -->
    @can('koordinatorkp')
    <!-- <div class="alert alert-primary alert-dismissable py-20 mt-20" role="alert">
        <strong>Kerja Praktek</strong> Ada Mahasiswa Mendaftar Kerja Praktek
    </div> -->
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-6">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-envelope-square fa-4x text-primary"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$kp ?? ''}} Mahasiswa Mendaftar Kerja Praktek</div>
                        <div class="text-muted">Mohon segera berikan tanggapan.</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-primary" href="{{route('admin.pengajuan.index')}}">
                                Kerja Praktek
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-tasks fa-4x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$semkp ?? ''}} Mahasiswa Mendaftar Seminar KP</div>
                        <div class="text-muted">Mohon segera berikan tanggapan.</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-info" href="{{route('admin.seminarkp.index')}}">
                                Seminar Kerja Praktek
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <!-- Close Koordinator Kp  -->
    <!-- Open Koordinator Ta -->
    @can('koordinatorta')
    <br>
    <div class="row invisible" data-toggle="appear">
        @if($tapending ?? '' != 0)
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-key fa-4x text-success"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$tapending ?? '' }} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Konfirmasi Koordinator TA</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-success" href="{{route('admin.pendaftaran.index')}}">
                                Tugas Akhir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($semhaspending ?? '' != 0)
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-magic fa-4x text-warning"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$semhaspending ?? ''}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Konfirmasi Koordinator TA</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-warning" href="{{route('admin.semhas.index')}}">
                                Seminar Hasil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($pendadaranpending ?? '' != 0)
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-mortar-board fa-4x text-danger"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$pendadaranpending ?? ''}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Konfirmasi Koordinator TA</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-danger" href="{{route('admin.pendadaran.index')}}">
                                Pendadaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endcan
    <!-- Close Koordinator Ta  -->
    <!-- Open Operator Ta -->
    @can('operatorta')
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-key fa-4x text-success"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$ta}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Surat Tugas TA</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-success" href="{{route('opta.ta.index')}}">
                                Tugas Akhir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-magic fa-4x text-warning"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$semhas}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Berkas Seminar Hasil TA</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-warning" href="{{route('opta.semhas.index')}}">
                                Seminar Hasil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-mortar-board fa-4x text-danger"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$pendadaran}} Mahasiswa</div>
                        <div class="text-muted">Membutuhkan Berkas Pendadaran TA</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-danger" href="{{route('opta.pendadaran.index')}}">
                                Pendadaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <!-- Close Operator Ta -->
    <!-- Open Koorditanor KBK -->
    @can('koordinatorsel')
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-12">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-envelope-square fa-4x text-primary"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$sel}} Mahasiswa</div>
                        <div class="text-muted">Mohon segera berikan tanggapan.</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-primary" href="{{route('admin.sel.index')}}">
                                Koordinator SEL
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('koordinatorsm')
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-12">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-envelope-square fa-4x text-primary"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$meka}} Mahasiswa</div>
                        <div class="text-muted">Mohon segera berikan tanggapan.</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-primary" href="{{route('admin.meka.index')}}">
                                Koordinator MEKA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('koordinatorict')
    <br>
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-12">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="text-center">
                        <div class="mb-20">
                            <i class="fa fa-envelope-square fa-4x text-primary"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{$ict}} Mahasiswa</div>
                        <div class="text-muted">Mohon segera berikan tanggapan.</div>
                        <div class="pt-20">
                            <a class="btn btn-rounded btn-alt-primary" href="{{route('admin.ict.index')}}">
                                Koordinator ICT
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <!-- Close Koorditanor KBK -->
</div>
<!-- END Page Content -->
@endsection
