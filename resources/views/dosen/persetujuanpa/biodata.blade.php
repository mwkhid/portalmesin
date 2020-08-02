@extends('layouts.backend')

@section('title','Biodata Alumni')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Biodata Alumni</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-3">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama" value="{{$bio->nama}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">NIM <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nim" value="{{$bio->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Tempat/Tgl. Lahir <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="tempat_lahir" value="{{$bio->tempat_lahir}}" readonly>
                        </div>
                        <div class="col-md-1">/</div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="{{$bio->tgl_lahir}}" name="tgl_lahir" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Agama <span class="text-danger">*</span></label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="agama" value="{{$bio->agama}}" readonly>
                        </div>
                        <label class="col-2">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="jenis_kelamin" value="{{$bio->jenis_kelamin == 1 ? 'Laki-Laki' : 'Perempuan'}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Tanggal Masuk <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$bio->tgl_masuk}}" name="tgl_masuk" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Tanggal Lulus <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$bio->tgl_lulus}}" name="tgl_lulus" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Alamat Rumah <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="alamat" class="form-control" rows="2" readonly>{{$bio->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Email <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" value="{{$bio->email}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">No Telephon (rumah)<span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="no_rumah" value="{{$bio->no_rumah}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">No Telephon (Hp)<span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="no_hp" value="{{$bio->no_hp}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Nilai Tugas Akhir <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nilai_ta" value="{{$bio->nilai_ta}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">IPK Terakhir <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" step="0.01" min="0" max="100" class="form-control" name="ipk_terakhir" value="{{$bio->ipk_terakhir}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Capaian SKS <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" step="1" min="0" class="form-control" name="capaian_sks" value="{{$bio->capaian_sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Lama Masa Studi <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="masa_studi" value="{{$bio->masa_studi}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Bidang Ilmu <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="bidang_ilmu" value="{{$bio->bidang_ilmu}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Judul Tugas Akhir (B. Indonesia) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="judul_ind" class="form-control" rows="4" readonly>{{$bio->judul_ind}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Judul Tugas Akhir (B. Inggris) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="judul_eng" class="form-control" rows="4" readonly>{{$bio->judul_eng}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{url()->previous()}}" class="btn btn-secondary ml-5">Kembali</a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection