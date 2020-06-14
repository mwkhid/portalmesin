@extends('layouts.backend')

@section('title','Pendadaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Pendadaran</h2>
    <form action="{{route('dosen.pendadaran.update', $data->id)}}" method="post">
    @method('PATCH')
    @csrf
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
                                    <label for="status">Status</label><br>
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
                                        <!-- <button type="submit" class="btn btn-alt-primary mb-5">Setujui</button> -->
                                        <!-- <button type="submit" class="btn btn-alt-primary mb-5">Ditolak</button> -->
                                        <a href="{{route('dosen.pendadaran.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div><br>
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
                                <input type="text" class="form-control" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">IPK</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="ipk" value="{{$data->ipk }}" placeholder="masukkan nama" readonly>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">SKS</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sks" value="{{$data->sks }}" placeholder="masukkan nama" readonly>
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
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Judul</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="judul" rows="4" readonly>{{ $data->judul}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Abstrak</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="abstrak" rows="4" readonly>{{ $data->abstrak}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="draftpendadaran">Link Draf Tugas Akhir</label>
                            <div>
                                <a href="{{$data->draft_pendadaran}}" target="_blank" readonly>{{$data->draft_pendadaran}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection