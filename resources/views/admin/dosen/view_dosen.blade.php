@extends('layouts.backend')

@section('title','Admin Dosen')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Dosen</h2>
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
                    <div class="block-content block-content-full">
                        <div class="form-group">
                            <label for="Nama">Kode Dosen</label>
                            <input type="text" class="form-control" name="nama" value="{{ $data->kode_dosen}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="Nim">NIP</label>
                            <input type="text" class="form-control" name="nim" value="{{ $data->nip}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="Nim">Nama Dosen</label>
                            <input type="text" class="form-control" name="nim" value="{{ $data->nama_dosen}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="Nim">Status Dosen</label>
                            <input type="text" class="form-control" name="nim" value="{{ $data->status_dosen}}" readonly="readonly">
                        </div>
                        <a href="{{route('admin.dosen.index')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
