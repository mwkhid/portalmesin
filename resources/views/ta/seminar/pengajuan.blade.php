@extends('layouts.backend')

@section('title','Seminar Hasil TA')

@section('content')
<div class="content">
<form action="{{ route('ta.semhas.store')}}" method="post">
    @csrf
    <h2 class="content-heading">Pengajuan Seminar Hasil Tugas Akhir</h2>
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
                                <input type="text" class="form-control" name="nim" value="{{ $data->nim }}" placeholder="masukkan nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs }}" placeholder="masukkan nama" readonly>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="PENDING" name="status_seminar">
                        <input type="hidden" class="form-control" value="0" name="cetak_semhas">
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Total SKS</label>
                            <div class="col-md-12">
                                <input type="text" step="1" min="0" class="form-control" name="sks" value="{{ $data->sks }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                            <div class="col-md-12">
                                <input type="text" step="0.01" min="0" max="4" class="form-control" value="{{ $data->ipk }}" name="ipk" readonly>
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
                    <input type="text" class="form-control" value="{{$data->id}}" name="ta_id" hidden>
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
                            <input type="hidden" name="idpem{{$key+1}}" value="{{$pembimbings->id}}">
                            <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                            <input type="text" class="form-control" name="pembimbing{{$key+1}}" Value="{{$pembimbings->nama_dosen}}" readonly>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="drafsemhas">Link Draft TA <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" name="draft_semhas" placeholder="Masukkan link google drive dari draft tugas akhir anda">
                        <h6 class="text-danger mt-5">*) Mohon masukkan link google drive dari draft tugas akhir yang telah diupload melalui email mahasiswa (@student.uns.ac.id), dan pastikan bahwa link yang telah di masukkan dapat dilihat oleh semua orang (tanpa request access).</h6>
                        <span class="text-danger">{{ $errors->first('draft_semhas') }}</span>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-primary">Daftar Seminar Hasil</button>
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