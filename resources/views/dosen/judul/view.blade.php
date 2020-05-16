@extends('layouts.backend')

@section('title','Perubahan Judul Tugas Akhir')

@section('content')
<div class="content">
    <h2 class="content-heading">Perubahan Judul Tugas Akhir</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dosen Pembimbing</h3>
            </div>
            <form action="{{route('dosen.judulta.update', $data->id )}}" method="post">
            @method('PATCH')
            @csrf
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
                                    <button type="submit" name="action" value="setuju" class="btn btn-primary mb-5" {{($pembimbings->id != $data->id ) ? 'disabled' : ''}}>SETUJU</button>
                                    <button type="submit" name="action" value="tolak" class="btn btn-danger mb-5" {{($pembimbings->id != $data->id) ? 'disabled' : ''}}>TOLAK</button>
                                </div>
                            @endforeach
                                <input type="text" class="form-control" value="{{$data->pembimbing}}" name="id_pembimbing" hidden>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="float-right">
                                        <a href="{{route('dosen.judulta.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                        <label class="col-12" for="nim">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="nim" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="nama">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="sks">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="sks" name="sks" value="{{$data->sks }}" placeholder="Total SKS yang dicapai" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{$data->ipk }}" placeholder="IPK terakhir" readonly>
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
                    <h3 class="block-title">Tugas Akhir</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="judul">Judul Lama</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{$data->judul_lama}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="abstrak">Judul baru</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="abstrak" name="abstrak" rows="4" readonly>{{$data->judul_baru}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="tgl_pengajuan">Alasan Perubahan Judul</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="abstrak" name="abstrak" rows="4" readonly>{{$data->judul_alasan}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
