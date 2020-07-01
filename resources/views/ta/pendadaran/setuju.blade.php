@extends('layouts.backend')

@section('title','Pengajuan Pendadaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Pendadaran Tugas Akhir</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h1 class="block-title" style="text-align: center; color:green;">
            Pengajuan Pendadaran Tugas Akhir Telah <b>DISETUJUI<b></h1>
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
                                <label for="sks">Status Pendadaran</label><br>
                                @if($pembimbings->status_pendadaranpem == 'PENDING')
                                    <button class="btn btn-warning" disabled>BELUM DISETUJUI</button>
                                @elseif($pembimbings->status_pendadaranpem == 'SETUJU')
                                    <button class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($pembimbings->status_pendadaranpem == 'TOLAK')
                                    <button class="btn btn-danger" disabled>DITOLAK</button>
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
        <div class="col-md-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dosen Penguji</h3>
            </div>
            <div class="block">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-12">
                        @foreach($penguji as $key=>$pengujis)
                            <div class="form-group">
                                <input type="text" class="form-control" name="idpenguji{{$key+1}}" value="{{$pengujis->id}}" hidden>
                                <label for="sks">Penguji {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control "  name="penguji{{$key+1}}" value="{{$pengujis->nama_dosen}}" readonly>
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
                </div>
                <div class="block-content">
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">NIM</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nim" value="{{$setuju->nim }}" placeholder="masukkan nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama" value="{{$setuju->nama_mhs }}" placeholder="masukkan nama" readonly>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="PENDING" name="status_pendadaran" hidden>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Total SKS</label>
                            <div class="col-md-12">
                                <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$setuju->sks }}" placeholder="Total SKS yang dicapai" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                            <div class="col-md-12">
                                <input type="text" step="0.01" min="0" max="4" class="form-control" value="{{$setuju->ipk }}" name="ipk" placeholder="IPK terakhir" readonly>
                            </div>
                        </div>                                  
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tugas Akhir</h3>
                </div>
                <div class="block-content">
                    <input type="text" class="form-control" value="{{$setuju->id_ta}}" name="id_ta" hidden>
                    <div class="form-group">
                        <label for="sks">Peminatan</label>
                        <input type="text" class="form-control" name="peminatan" Value="{{$setuju->nama_peminatan}}" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="judul">Judul</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" name="judul" rows="4" readonly>{{ $setuju->judul}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="abstrak">Abstrak</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" name="abstrak" rows="4" readonly>{{ $setuju->abstrak}}</textarea>
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
                    <h3 class="block-title">Pendadaran</h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="form-group row">
                        <label class="col-12" for="drafpendadaran">Link Draft Tugas Akhir</label>
                        <div class="col-md-12">
                            <a href="{{ $setuju->draft_pendadaran}}" class="form-control" target="_blank" readonly>{{ $setuju->draft_pendadaran}}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Tanggal Pendadaran</label>
                        <div class="col-md-12"> 
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{date('d-m-Y', strtotime($setuju->tanggal))}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jam mulai">Jam Mulai Pendadaran</label>
                        <input type="text" class="form-control" id="jam_mulai" name="jam_mulai" value="{{$setuju->jam_mulai}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jam selesai">Jam Selesai Pendadaran</label>
                        <input type="text" class="form-control" id="jam_selesai" name="jam_selesai" value="{{$setuju->jam_selesai}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="acceptor">Ruang:</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" value="{{$setuju->nama_ruang}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(($pembimbing1 != null) || ($pembimbing2 != null) || ($penguji1 != null) || ($penguji2 != null))
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Revisi</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="form-group row">
                        <label class="col-md-4" for="revisi">Revisi Pembimbing 1</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$pembimbing1->revisi ?? 'Belum Input Revisi'}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="revisi">Revisi Pembimbing 2</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$pembimbing2->revisi ?? 'Belum Input Revisi'}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="revisi">Revisi Penguji 1</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$penguji1->revisi ?? 'Belum Input Revisi'}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="revisi">Revisi Penguji 2</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$penguji2->revisi ?? 'Belum Input Revisi'}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection