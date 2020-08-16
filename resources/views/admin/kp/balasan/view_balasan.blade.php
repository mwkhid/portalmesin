@extends('layouts.backend')

@section('title','Balasan Kerja Praktek')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Balasan Kerja Praktek</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.balasan.update', $data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                            <input type="hidden" class="form-control" name="mhs_id" value="{{ $data->mahasiswa_id}}" readonly="readonly">
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="Nim">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $data->nim}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" class="form-control" name="sks" value="{{ $data->sks}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" class="form-control" name="ipk" value="{{ $data->ipk}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Perusahaan</h2>
                            <div class="form-group">
                                <label for="nama perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_nama" value="{{ $data->perusahaan_nama}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="alamat perusahaan">Alamat Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_almt" value="{{ $data->perusahaan_almt}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_jenis" value="{{ $data->perusahaan_jenis}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="PIC">PIC</label>
                                <input type="text" class="form-control" name="pic" value="{{ $data->pic}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Tanggal Pelaksanaan</h2>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Dimulai KP</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tgl_mulai_kp" name="tgl_mulai_kp" value="{{ $data->tgl_mulai_kp}}">
                            </div>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Selesai KP</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tgl_selesai_kp" name="tgl_selesai_kp" value="{{ $data->tgl_selesai_kp}}">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Penugasan KP</h2>
                            <div class="form-group">
                                <label for="Penugasan">Penugasan KP</label>
                                <textarea type="text" class="form-control" name="penugasan_kp" rows="2" readonly>{{ $data->penugasan_kp}}</textarea>
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Surat Balasan Perusahaan</h2>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Surat Balasan <span class="text-danger">*</span></label>
                                <input required type="text" class="js-flatpickr form-control bg-white" id="tanggal_surat" name="tanggal_surat" placeholder="Y-m-d">
                                @if($errors->has('tanggal_surat'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal_surat')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Nomor Balasan">Nomor Surat Balasan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="no_surat" placeholder="Masukkan Nomor Surat Balasan KP">
                                @if($errors->has('no_surat'))
                                    <div class="text-danger">
                                        {{ $errors->first('no_surat')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                @if($data->penugasan_kp)
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mr-5 mb-5">Setuju</button>
                                @endif
                                <button type="submit" name="action" value="tolak" class="btn btn-danger mr-5 mb-5">Tolak</button>
                                <a href="{{route('admin.permohonan.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                            </div>
                        </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
@endsection
