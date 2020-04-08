@extends('layouts.backend')

@section('title','Admin Mahasiswa')

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
                            <div class="form-group">
                                <label for="kode dosen">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_mhs" value="{{$data->nama_mhs}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Angkatan</label>
                                <input type="text" class="form-control" name="angkatan" value="{{$data->angkatan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Sks</label>
                                <input type="number" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">IPK</label>
                                <input type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Pembimbing Akademik</label>
                                <input type="text" class="form-control" name="pem_akademik" value="{{$data->nama_dosen}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Status Mahasiswa</label>
                                <input type="text" class="form-control" name="status_mhs" value="{{$data->status_mhs}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin.mahasiswa.index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
