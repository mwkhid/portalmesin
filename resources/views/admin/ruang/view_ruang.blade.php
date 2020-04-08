@extends('layouts.backend')

@section('title','Admin User')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Mahasiswa</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama ruang">Nama Ruang</label>
                                        <input type="text" class="form-control" id="nama_ruang" value="{{$data->nama_ruang}}" name="nama_ruang" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin.ruang.index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
