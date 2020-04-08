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
                        <form action="{{ route('admin.mahasiswa.update', $data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                            <div class="form-group">
                                <label for="kode dosen">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$data->nim}}">
                                <div class="text-danger">{{ $errors->first('nim')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_mhs" value="{{$data->nama_mhs}}">
                                <div class="text-danger">{{ $errors->first('nama_mhs')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Angkatan</label>
                                <input type="text" class="form-control" name="angkatan" value="{{$data->angkatan}}">
                                <div class="text-danger">{{ $errors->first('angkatan')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Sks</label>
                                <input type="number" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}">
                                <div class="text-danger">{{ $errors->first('sks')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">IPK</label>
                                <input type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}">
                                <div class="text-danger">{{ $errors->first('ipk')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Pembimbing Akademik</label>
                                <select class="form-control js-select2" name="pem_akademik" id="pem_akademik" data-live-search="true">
                                    <option value="{{$data->pem_akademik}}">{{$data->nama_dosen}}</option>
                                    @foreach($pembimbing as $pembimbings)
                                    <option name="status_mhs" value="{{$pembimbings->id}}">{{$pembimbings->nama_dosen}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">{{ $errors->first('pem_akademik')}}</div>
                                <!-- <input type="text" class="form-control" name="pem_akademik"> -->
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Status Mahasiswa</label>
                                <select class="form-control js-select2" name="status_mhs" id="status_mhs" data-live-search="true">
                                    <option name="status_mhs" value="AKTIF" {{($data->status_mhs == 'AKTIF') ? 'selected' : ''}}>AKTIF</option>
                                    <option name="status_mhs" value="DO" {{($data->status_mhs == 'DO') ? 'selected' : ''}}>DO</option>
                                    <option name="status_mhs" value="HILANG" {{($data->status_mhs == 'HILANG') ? 'selected' : ''}}>HILANG</option>
                                    <option name="status_mhs" value="LULUS" {{($data->status_mhs == 'LULUS') ? 'selected' : ''}}>LULUS</option>
                                    <option name="status_mhs" value="MENINGGAL DUNIA" {{($data->status_mhs == 'MENINGGAL DUNIA') ? 'selected' : ''}}>MENINGGAL DUNIA</option>
                                    <option name="status_mhs" value="PINDAH" {{($data->status_mhs == 'PINDAH') ? 'selected' : ''}}>PINDAH</option>
                                    <option name="status_mhs" value="UNDUR DIRI" {{($data->status_mhs == 'UNDUR DIRI') ? 'selected' : ''}}>UNDUR DIRI</option>
                                </select>
                                <div class="text-danger">{{ $errors->first('status_mhs')}}</div>
                                <!-- <input type="text" class="form-control" name="status_dosen" > -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.mahasiswa.index')}}" class="btn btn-secondary">Kembali</a>
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
