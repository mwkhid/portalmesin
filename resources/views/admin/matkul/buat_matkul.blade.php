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
                        <form action="{{ route('admin.matkul.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="kode dosen">Kode Mata Kuliah <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="kode" placeholder="Kode Mata Kuliah">
                                <div class="text-danger">{{ $errors->first('kode')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Nama Mata Kuliah <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="nama" placeholder="Nama Mata Kuliah">
                                <div class="text-danger">{{ $errors->first('nama')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">SKS Mata Kuliah <span class="text-danger">*</span></label>
                                <input required type="number" step="1" min="0" max="5" class="form-control" name="sks" placeholder="SKS Mata Kuliah">
                                <div class="text-danger">{{ $errors->first('sks')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Status Mata Kuliah <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" name="status" id="status" data-live-search="true">
                                    <option value="">Pilih Status Mata Kuliah</option>
                                    <option name="status" value="10">AKTIF</option>
                                    <option name="status" value="11">TIDAK AKTIF</option>
                                </select>
                                <div class="text-danger">{{ $errors->first('status')}}</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.matkul.index')}}" class="btn btn-secondary">Kembali</a>
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
