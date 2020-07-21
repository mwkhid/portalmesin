@extends('layouts.backend')

@section('title','Pengajuan KP')

@section('content')
<div class="content">

    <!-- Default Elements -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title" style="text-align: center; color: red;">Mohon Update Data Pendaftaran KP!</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <form action="{{ route('kp.pendaftaran.update', $edit->id) }}" method="post">
                            @method('PATCH') 
                            @csrf
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$edit->nama_mhs}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="Nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{$edit->nim}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="status_kp" value="PENDING">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="kp_id" value="{{$edit->id}}">
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="number" class="form-control" name="sks" value="{{$edit->sks}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="double" class="form-control" name="ipk" value="{{$edit->ipk}}" readonly>
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Perusahaan</h2>
                                <div class="form-group">
                                    <label for="nama perusahaan">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_nama" value="{{$edit->perusahaan_nama}}" placeholder="Masukkan Nama Perusahaan..">
                                    @if($errors->has('perusahaan_nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamat perusahaan">Alamat Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_almt" value="{{$edit->perusahaan_almt}}" placeholder="Masukkan Alamat Perusahaan..">
                                    @if($errors->has('perusahaan_almt'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_almt')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_jenis" value="{{$edit->perusahaan_jenis}}" placeholder="Masukkan Jenis Usaha Perusahaan..">
                                    @if($errors->has('perusahaan_jenis'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_jenis')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="PIC">PIC</label>
                                    <input type="text" class="form-control" name="pic" value="{{$edit->pic}}" placeholder="PIC bukan nama orang, Contoh : HRD, HCM, dll">
                                    @if($errors->has('pic'))
                                        <div class="text-danger">
                                            {{ $errors->first('pic')}}
                                        </div>
                                    @endif
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Tanggal Pelaksanaan</h2>
                                <div class="form-group">
                                    <label for="Tanggal Mulai">Tanggal Mulai KP</label>
                                    <input type="text" class="form-control bg-white js-flatpickr" name="rencana_mulai_kp" value="{{$edit->rencana_mulai_kp}}" placeholder="Y-m-d">
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Selesai">Tanggal Selesai KP</label>
                                    <input type="text" class="form-control bg-white js-flatpickr" name="rencana_selesai_kp" value="{{$edit->rencana_selesai_kp}}" placeholder="Y-m-d">
                                </div>
                            <div class="form-group row">
                                <div class="col-12">
                                @if(($accTempatkp->tempat_kp ?? '') != null)
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                @else
                                    <span class="badge badge-danger" data-wizard="finish">Tempat Kp Belum Disetujui Pembimbing KP</span>
                                @endif
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Default Elements -->
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
@endsection