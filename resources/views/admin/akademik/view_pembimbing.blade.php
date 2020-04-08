@extends('layouts.backend')

@section('title','Admin Pembimbing Akademik')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pembimbing Akademik</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <div class="block-content block-content-full">
                    <h2 class="content-heading border-bottom mb-4 pb-2">Pembimbing Akademik</h2>
                        <div class="form-group">
                            <label for="Nama">Pembimbing Akademik</label>
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama_dosen}}" readonly="readonly">
                        </div>
                    <h2 class="content-heading border-bottom mb-4 pb-2">Data Mahasiswa</h2>
                        <div class="form-group">
                            <label for="Nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="Nim">NIM</label>
                            <input type="text" class="form-control" name="nim" value="{{ $data->nim}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="Nim">Angkatan</label>
                            <input type="text" class="form-control" name="nim" value="{{ $data->angkatan}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS</label>
                            <input type="text" class="form-control" name="sks" value="{{ $data->sks}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK</label>
                            <input type="text" class="form-control" name="ipk" value="{{ $data->ipk}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="status mhs">Status Mahasiswa</label>
                            <input type="text" class="form-control" name="status_mhs" value="{{ $data->status_mhs}}" readonly="readonly">
                        </div>
                        <a href="{{route('admin.akademik.index')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection