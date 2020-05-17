@extends('layouts.backend')

@section('title','Pendaftaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Tugas Akhir</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h1 class="block-title text-center text-danger" >Pendaftaran Tugas Akhir Anda <b>DITOLAK<b></h1>
        </div>
    </div>
    <form action="{{ route('ta.pendaftaran.update', $tolak->id) }}" method="post">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nim" value="{{ $tolak->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{ $tolak->nama_mhs }}" placeholder="masukkan nama" disabled="">
                        </div>
                    </div>
                    <input type="text" class="form-control" value="PENDING" name="status_ta" hidden>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Total SKS</label>
                        <div class="col-md-12">
                            <input type="number" step="1" min="0" class="form-control" name="sks" value="{{$tolak->sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$tolak->ipk}}" readonly>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="mahasiswa_id" value="{{$tolak->id}}" hidden>
                    @if($errors->has('mahasiswa_id'))
                        <div class="text-danger">
                            {{ $errors->first('mahasiswa_id')}}
                        </div>
                    @endif                           
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tugas Akhir</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                        <div class="form-group">
                            <label for="sks">Peminatan</label>
                            <select class="form-control js-select2" name="peminatan_id" id="peminatan_id" data-live-search="true">
                            <option value=""></option>
                                @foreach ($peminatan as $peminatans)
                                    <option name="peminatan" value="{{ $peminatans->id }}" {{$tolak->peminatan_id == $peminatans->id ? 'selected' : ''}}>{{ $peminatans->nama_peminatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Judul</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="judul" name="judul" rows="4">{{$tolak->judul}}</textarea>
                                @if($errors->has('judul'))
                                    <span class="text-danger">
                                        {{ $errors->first('judul')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Abstrak</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="abstrak" name="abstrak" rows="6">{{$tolak->abstrak}}</textarea>
                                <span class="text-danger">{{ $errors->first('abstrak') }}</span>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-12" for="example-text-input">Tanggal Pengajuan</label>
                            <div class="col-md-12"> 
                                <input type="text" class="form-control bg-white" id="flatpickr" name="tgl_pengajuan" placeholder="Y-m-d">
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md 12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mata Kuliah Pilihan Pendukung</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="form-group">
                        <div class="row">
                            <!-- <div class="col-md-3">
                                Kode MK
                            </div> -->
                            <div class="col-md-6">
                                Nama MK
                            </div>
                            <div class="col-md-3">
                                Nilai
                            </div>
                            <div class="col-md-3">
                                Huruf
                            </div>

                            @foreach ($matkul as $key=>$matkuls)
                            <!-- <div class="col-md-3">
                                <input type="text" class="form-control" name="kode_mk{{$key+1}}" id="kode_mk{{$key+1}}" value="{{$matkuls->kode_matkul}}"><br>
                            </div> -->
                            <div class="col-md-6">
                                <select class="form-control js-select2" name="mk{{$key+1}}" id="mk{{$key+1}}" >
                                    <option value=""></option>
                                    @foreach ($matakuliah as $mks)
                                        <option name="mata_kuliah" value="{{ $mks->nama }}" {{$matkuls->nama_matkul == $mks->nama ? 'selected' : ''}}>{{ $mks->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mk'.($key+1)))
                                    <div class="text-danger">
                                        {{ $errors->first('mk'.($key+1))}}
                                    </div>
                                @endif
                                <br>
                            </div>
                            <div class="col-md-3">
                                <input type="float" class="form-control" name="nilai_mk{{$key+1}}" value="{{$matkuls->ip}}"><br>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="huruf_mk{{$key+1}}" value="{{$matkuls->huruf}}"><br>
                            </div>
                            <input type="text" class="form-control" name="idta{{$key+1}}" value="{{$matkuls->id}}" hidden><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Dosen Pembimbing</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    @foreach ($pembimbing as $key=>$pembimbings)
                    <div class="form-group">
                        <label for="pembimbing">Pembimbing {{$key+1}} Tugas Akhir</label>
                        <select class="form-control js-select2" name="pembimbing{{$key+1}}" id="pembimbing{{$key+1}}">
                            <option value=""></option>
                            @foreach ($dosen as $dosens)
                                <option name="dosen" value="{{ $dosens->id }}" {{$pembimbings->pembimbing == $dosens->id ? 'selected' : ''}}>{{ $dosens->nama_dosen}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pembimbing'.($key+1)))
                            <div class="text-danger">
                                {{ $errors->first('pembimbing'.($key+1))}}
                            </div>
                        @endif
                    </div>
                    <input type="text" class="form-control" name="idpem{{$key+1}}" value="{{$pembimbings->id}}" hidden>
                    @endforeach
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary mb-5">Ajukan Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection