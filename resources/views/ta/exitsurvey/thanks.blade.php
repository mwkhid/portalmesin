@extends('layouts.backend')

@section('title','Exit Survey Mahasiswa')

@section('content')
<div class="content">
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('{{asset('media/photos/photo12@2x.jpg')}}');">
        <div class="hero bg-black-op">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="row justify-content-center">
                        <div class="col-md-6 py-30 text-center">
                            <h1 class="display-4 font-w700 text-white mb-10">Thank You</h1>
                            <h2 class="h4 font-w400 text-white-op pb-30 mb-20 border-white-op-b">Anda telah mengisi exit survey Mahasiswa.. :)</h2>

                            <a class="btn btn-hero btn-noborder btn-rounded btn-outline-warning" href="{{route('ta.wisuda.index')}}">
                                <i class="fa fa-arrow-left mr-10"></i> Go Back to Kelengkapan Wisuda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</div>
@endsection