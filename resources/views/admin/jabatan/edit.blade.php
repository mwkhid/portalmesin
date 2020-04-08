@extends('layouts.backend')

@section('title','Admin Jabatan')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Jabatan</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.jabatan.update',$data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="nama ruang">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan" value="{{$data->nama_jabatan}}" name="nama_jabatan">
                                    <span class="text-danger">{{ $errors->first('nama_jabatan') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="nama dosen">Nama Dosen</label>
                                    <select class="form-control js-select2" name="dosen_id" id="dosen_id" data-live-search="true">
                                        <option></option>
                                        @foreach($dosen as $dosens)
                                        <option name="dosen" value="{{$dosens->id}}" {{($data->dosen_id == $dosens->id) ? 'selected' : ''}}>{{$dosens->nama_dosen}}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('dosen_id')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.jabatan.index')}}" class="btn btn-secondary">Kembali</a>
                                </div>
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
