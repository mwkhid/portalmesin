@extends('layouts.backend')

@section('title','Pembatalan Tugas Akhir')

@section('content')
<div class="content">
    <form action="{{route('admin.pembatalanta.update', $data->id)}}" method="post">
    @method('PATCH')
    @csrf
    <h2 class="content-heading">Pembatalan Tugas Akhir</h2>
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
                    <input type="text" class="form-control" id="ta_id" name="ta_id" value="{{$data->ta_id }}" hidden>                                
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
                        <label class="col-12" for="judul">Judul TA</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{$data->judul}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="pembatalan_alasan">Alasan Pembatalan TA</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="pembatalan_alasan" name="pembatalan_alasan" rows="4" readonly>{{$data->pembatalan_alasan}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                        @foreach($pembimbing as $key=>$pembimbings)
                            <div class="form-group">
                                <input type="text" class="form-control" name="idpem{{$key+1}}" value="{{$pembimbings->id}}" hidden>
                                <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control "  name="pembimbing{{$key+1}}" Value="{{$pembimbings->nama_dosen}}" readonly>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="float-left mr-auto">
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mb-5 mr-5">Setujui</button>
                                <button type="submit" name="action" value="tolak" class="btn btn-danger mb-5 mr-5">Tolak</button>
                                <a href="{{route('admin.pembatalanta.index')}}" class="btn btn-secondary mb-5 mr-5">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
