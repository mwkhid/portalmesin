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
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.dosen.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="kode dosen">Kode Dosen <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="kode_dosen">
                                <div class="text-danger">{{ $errors->first('kode_dosen')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Nip">NIP <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="nip" >
                                <div class="text-danger">{{ $errors->first('nip')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Nama Dosen <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="nama_dosen" >
                                <div class="text-danger">{{ $errors->first('nama_dosen')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Status Dosen <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" name="status_dosen" id="status_dosen" data-live-search="true">
                                    <option value="">Status Dosen</option>
                                    <option name="status_dosen" value="AKTIF">AKTIF</option>
                                    <option name="status_dosen" value="INAKTIF">TIDAK AKTIF</option>
                                </select>
                                <div class="text-danger">{{ $errors->first('status_dosen')}}</div>
                                <!-- <input type="text" class="form-control" name="status_dosen" > -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.dosen.index')}}" class="btn btn-warning">Back</a>
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
