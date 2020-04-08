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
                        <form action="{{ route('admin.matkul.update', $data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                            <div class="form-group">
                                <label for="kode dosen">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" name="kode" value="{{$data->kode}}">
                                <div class="text-danger">{{ $errors->first('kode')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Nama Mata Kuliah</label>
                                <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                                <div class="text-danger">{{ $errors->first('nama')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">SKS Mata Kuliah</label>
                                <input type="number" step="1" min="0" max="5" class="form-control" name="sks" value="{{$data->sks}}">
                                <div class="text-danger">{{ $errors->first('sks')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Status Mata Kuliah</label>
                                <select class="form-control js-select2" name="status" id="status_mhs" data-live-search="true">
                                    <option name="status_mhs" value="10" {{($data->status == '10') ? 'selected' : ''}}>AKTIF</option>
                                    <option name="status_mhs" value="11" {{($data->status != '10') ? 'selected' : ''}}>TIDAK AKTIF</option>
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
