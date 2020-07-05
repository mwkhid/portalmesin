@extends('layouts.backend')

@section('title','Pendaftaran KP')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title text-center text-info">Edit Permohonan Kerja Praktek!</h3>
        </div>
        <div class="block-content">
        <!-- <h2 class="content-heading">Pendaftaran Kerja Praktek</h2> -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Default Elements -->
                            <form action="{{ route('kp.pendaftaran.update', $tolak->id) }}" method="post">
                                @method('PATCH') 
                                @csrf
                                <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                                    <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{$tolak->nama_mhs}}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="Nim">NIM</label>
                                        <input type="text" class="form-control" name="nim" value="{{$tolak->nim}}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="status_kp" value="PENDING">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="kp_id" value="{{$tolak->id}}">
                                    </div>
                                <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                                    <div class="form-group">
                                        <label for="sks">Jumlah SKS Lulus</label>
                                        <input type="number" class="form-control" name="sks" value="{{$tolak->sks}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="IPK">IPK</label>
                                        <input type="double" class="form-control" name="ipk" value="{{$tolak->ipk}}" readonly>
                                    </div>
                                <h2 class="content-heading border-bottom mb-4 pb-2">Data Perusahaan</h2>
                                    <div class="form-group">
                                        <label for="nama perusahaan">Nama Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="perusahaan_nama" value="{{$tolak->perusahaan_nama}}">
                                        @if($errors->has('perusahaan_nama'))
                                            <div class="text-danger">
                                                {{ $errors->first('perusahaan_nama')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat perusahaan">Alamat Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="perusahaan_almt" value="{{$tolak->perusahaan_almt}}">
                                        @if($errors->has('perusahaan_almt'))
                                            <div class="text-danger">
                                                {{ $errors->first('perusahaan_almt')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="perusahaan_jenis" value="{{$tolak->perusahaan_jenis}}">
                                        @if($errors->has('perusahaan_jenis'))
                                            <div class="text-danger">
                                                {{ $errors->first('perusahaan_jenis')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="PIC">PIC <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pic" value="{{$tolak->pic}}">
                                        @if($errors->has('pic'))
                                            <div class="text-danger">
                                                {{ $errors->first('pic')}}
                                            </div>
                                        @endif
                                    </div>
                                <h2 class="content-heading border-bottom mb-4 pb-2">Tanggal Pelaksanaan</h2>
                                    <div class="form-group">
                                        <label for="Tanggal Mulai">Tanggal Mulai KP <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control bg-white js-flatpickr" name="rencana_mulai_kp" value="{{$tolak->rencana_mulai_kp}}">
                                        <div class="text-danger">{{ $errors->first('rencana_mulai_kp')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tanggal Selesai">Tanggal Selesai KP <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control bg-white js-flatpickr" name="rencana_selesai_kp" value="{{$tolak->rencana_selesai_kp}}">
                                        <div class="text-danger">{{ $errors->first('rencana_selesai_kp')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mr-5 mb-5">Simpan</button>
                                        <a class="btn btn-secondary mr-5 mb-5" href="{{route('kp.pendaftaran.index')}}">Kembali</a>
                                    </div>
                            </form>
                    <!-- END Default Elements -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
@endsection