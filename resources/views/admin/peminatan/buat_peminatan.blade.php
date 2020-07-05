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
                        <form action="{{ route('admin.peminatan.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="kode dosen">Tahun Peminatan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="tahun" value="{{old('tahun')}}" placeholder="Masukkan Tahun Peminatan">
                                <span class="text-danger">{{ $errors->first('tahun') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Kode Peminatan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="kode" value="{{old('kode')}}" placeholder="Masukkan Kode Peminatan">
                                <span class="text-danger">{{ $errors->first('kode') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Nama Peminatan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="nama_peminatan" value="{{old('nama_peminatan')}}" placeholder="Masukkan Nama Peminatan">
                                <span class="text-danger">{{ $errors->first('nama_peminatan') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.peminatan.index')}}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr','select2']); });</script>
@endsection
