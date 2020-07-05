@extends('layouts.backend')

@section('title','Pengajuan Pendadaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Pendadaran Tugas Akhir</h2>
    <form action="{{route('ta.pendadaran.store')}}" method="post">
    @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Mahasiswa</h3>
                    </div>
                    <div class="block-content">
                            <input type="text" class="form-control" value="{{$data->ta_id}}" name="ta_id" hidden>
                            <input type="text" class="form-control" value="PENDING" name="status_pendadaran" hidden>
                            <input type="hidden" class="form-control" value="0" name="cetak_pendadaran">
                            <div class="form-group row">
                                <label class="col-12" for="nim">NIM</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="nama">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="sks">Total SKS</label>
                                <div class="col-md-12">
                                    <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks }}" placeholder="Total SKS yang dicapai" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="ipk">Indeks Prestasi Kumulatif</label>
                                <div class="col-md-12">
                                    <input type="text" step="0.01" min="0" max="4" class="form-control" value="{{$data->ipk }}" name="ipk" placeholder="IPK terakhir" readonly>
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
                        <div class="form-group row">
                            <label class="col-12" for="judul">Judul</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{ $data->judul}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="judul">Abstrak</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="judul" name="abstrak" rows="4" readonly>{{ $data->abstrak}}</textarea>
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
                    </div>
                    <div class="block-content">
                        @foreach ($pembimbing as $key=>$pembimbings)
                            <div class="form-group">
                                <input type="hidden" name="idpem{{$key+1}}" value="{{$pembimbings->id}}">
                                <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control" name="pembimbing" Value="{{$pembimbings->nama_dosen}}" readonly>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="drafpendadaran">Link Draft TA <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" name="draft_pendadaran" placeholder="Masukkan link google drive dari draft tugas akhir anda">
                            <h6 class="text-danger mt-5">*) Mohon masukkan link google drive dari draft tugas akhir yang telah diupload melalui email mahasiswa (@student.uns.ac.id), dan pastikan bahwa link yang telah di masukkan dapat dilihat oleh semua orang (tanpa request access).</h6>
                            <span class="text-danger">{{ $errors->first('draft_pendadaran') }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">Daftar Pendadaran</button>
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