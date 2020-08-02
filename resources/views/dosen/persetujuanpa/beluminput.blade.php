@extends('layouts.backend')

@section('title','Biodata Mahasiswa')

@section('content')
<!-- Page Content -->
<div class="hero" style="height: 100%">
    <div class="hero-inner">
        <div class="content content-full">
            <div class="py-30 text-center">
                <div class="display-3 text-corporate">
                    <i class="fa fa-lock"></i> 401
                </div>
                <h1 class="h2 font-w700 mt-30 mb-10">Oops.. Mahasiswa Belum Input..</h1>
                <a class="btn btn-hero btn-noborder btn-rounded btn-outline-info" href="{{url()->previous()}}">
                    <i class="fa fa-arrow-left mr-10"></i> Go Back to Persetujuan PA
                </a>
                <!-- <h2 class="h3 font-w400 text-muted mb-50">Mohon upload surat balasan kerja praktek dan temui koordinator kerja praktek..</h2> -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection
