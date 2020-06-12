@extends('layouts.backend')

@section('title','Seminar Hasil TA')

@section('content')
<div class="content">
    <h2 class="content-heading">Pengajuan Seminar Tugas Akhir</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong>Success</strong> {{ session()->get('message') }}  
        </div>
    @endif
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
                                <label for="sks">Status Seminar Hasil</label><br>
                                @if($pembimbings->status_semhas == 'PENDING')
                                    <button class="btn btn-warning" disabled>BELUM DISETUJUI</button>
                                @elseif($pembimbings->status_semhas == 'SETUJU')
                                    <button class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($pembimbings->status_semhas == 'TOLAK')
                                    <button class="btn btn-danger" disabled>DITOLAK</button>
                                @endif
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="float-right ml-auto">
                                    <a href="{{route('ta.semhas.edit',$pending->id)}}" class="btn btn-warning mb-5">Edit</a>
                                </div>
                            </div>
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
                                <input type="text" class="form-control" name="nim" value="{{ $pending->nim }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama" value="{{ $pending->nama_mhs }}" readonly>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="PENDING" name="status_seminar" hidden>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Total SKS</label>
                            <div class="col-md-12">
                                <input type="text" step="1" min="0" class="form-control" name="sks" value="{{ $pending->sks }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                            <div class="col-md-12">
                                <input type="text" step="0.01" min="0" max="4" class="form-control" value="{{ $pending->ipk }}" name="ipk" readonly>
                            </div>
                        </div>                                  
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
                    <input type="text" class="form-control" value="{{$pending->id}}" name="id_ta" hidden>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Judul</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="example-text-input" name="judul" rows="4" readonly>{{ $pending->judul}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Abstrak</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="example-text-input" name="abstrak" rows="4" readonly>{{ $pending->abstrak}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Link Draft Tugas Akhir</label>
                        <div class="col-md-12">
                            <a href="{{ $pending->draft_semhas}}" target="_blank" readonly>{{ $pending->draft_semhas}}</a>
                            <!-- <textarea type="text" class="form-control" id="example-text-input" name="draft_semhas" rows="2" readonly>{{ $pending->draft_semhas}}</textarea> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection