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
                                <label for="kode dosen">Name</label>
                                <input type="text" class="form-control" name="username" value="{{$data->name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Nip">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$data->email}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Akses</label>
                                <input type="text" class="form-control" name="level" value="{{implode(', ',$data->roles()->get()->pluck('name')->toArray())}}" readonly>
                            </div>
                            <div class="form-group">
                                <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
