@extends('layouts.backend')

@section('title','Pendaftaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pendaftaran Tugas Akhir</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong>Success</strong> {{ session()->get('message') }}  
        </div>
    @endif
    <div>
        <a href="{{ route('ta.cetak_pendaftaran')}}" class="btn btn-primary" target="_blank">Form Pendaftaran TA</a>
    </div>
    <br>
    <div class="block">
        <div class="block-header block-header-default">
            <h1 class="block-title" style="text-align: center; color:orange;">
            Pengajuan Berhasil Disimpan<br>
            <b>Menunggu Persetujuan Koordinator Tugas Akhir<b></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dosen Pembimbing</h3>
            </div>
            <div class="block">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-6">
                        @foreach($pembimbing as $key=>$pembimbings)
                            <div class="form-group">
                                <input type="text" class="form-control" name="idpem{{$key+1}}" value="{{$pembimbings->id}}" hidden>
                                <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control "  name="pembimbing{{$key+1}}" Value="{{$pembimbings->nama_dosen}}" readonly>
                            </div>
                        @endforeach
                        </div>
                        <div class="col-md-6">
                        @foreach($pembimbing as $pembimbings)
                            <div class="form-group">
                                <label for="sks">Status</label><br>
                                @if($pembimbings->status_pem == 'PENDING')
                                    <span class="btn btn-danger">BELUM DISETUJUI</span>
                                @elseif($pembimbings->status_pem == 'SETUJU')
                                    <span class="btn btn-success">DISETUJUI</span>
                                @endif
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <input type="text" class="form-control" name="nim" value="{{ $pending->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{ $pending->nama_mhs }}" placeholder="masukkan nama" disabled="">
                        </div>
                    </div>
                    <input type="text" class="form-control" value="PENDING" name="status_ta" hidden>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="sks" value="{{$pending->sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="ipk" value="{{$pending->ipk}}" readonly>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="mahasiswa_id" value="{{$pending->id}}" hidden>                           
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
                        <input type="text" class="form-control" name="peminatan" Value="{{$pending->nama_peminatan}}" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Judul</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{$pending->judul}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Abstrak</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="abstrak" name="abstrak" rows="6" readonly>{{$pending->abstrak}}</textarea>
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
        <div class="col-md-12">
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
                            <div class="col-md-3">
                                Kode MK
                            </div>
                            <div class="col-md-5">
                                Nama MK
                            </div>
                            <div class="col-md-2">
                                Nilai
                            </div>
                            <div class="col-md-2">
                                Huruf
                            </div>

                            @foreach ($matkul as $matkul)
                            <div class="col-md-3">
                                <input type="text" class="form-control"  value="{{$matkul->kode_matkul}}"  readonly><br>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control"  value="{{$matkul->nama_matkul}}" readonly><br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control"  value="{{$matkul->ip}}" readonly><br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" " value="{{$matkul->huruf}}" readonly><br>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <a href="{{route('ta.pendaftaran.edit', $pending->id)}}" class="btn btn-alt-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection