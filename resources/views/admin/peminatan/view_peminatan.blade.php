@extends('layouts.backend')

@section('title','Admin Mata Kuliah')

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
                                <label for="kode dosen">Tahun Peminatan</label>
                                <input type="text" class="form-control" name="tahun" value="{{$data->tahun}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Kode Peminatan</label>
                                <input type="text" class="form-control" name="kode" value="{{$data->kode}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Nama Peminatan</label>
                                <input type="text" class="form-control" name="nama_peminatan" value="{{$data->nama_peminatan}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin.peminatan.index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
