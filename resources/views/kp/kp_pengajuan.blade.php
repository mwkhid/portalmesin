@extends('layouts.backend')

@section('title','Pengajuan KP')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pendaftaran Kerja Praktek</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Form Pendaftaran KP</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('kp.pendaftaran.store') }}" method="post">
                            @csrf
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="Nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="status_kp" value="PENDING">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="mahasiswa_id" value="{{$data->id}}">
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                                <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="number" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" placeholder="Total SKS yang dicapai" readonly>
                                    <div class="text-danger">{{ $errors->first('sks')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" placeholder="Masukkan IPK Anda.." readonly>
                                    
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Perusahaan</h2>
                                <div class="form-group">
                                    <label for="nama perusahaan">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_nama" value="{{old('perusahaan_nama')}}" placeholder="Masukkan Nama Perusahaan..">
                                    @if($errors->has('perusahaan_nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamat perusahaan">Alamat Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_almt" value="{{old('perusahaan_almt')}}" placeholder="Masukkan Alamat Perusahaan..">
                                    @if($errors->has('perusahaan_almt'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_almt')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_jenis" value="{{old('perusahaan_jenis')}}" placeholder="Masukkan Jenis Usaha Perusahaan..">
                                    @if($errors->has('perusahaan_jenis'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_jenis')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="PIC">PIC</label>
                                    <input type="text" class="form-control" name="pic" value="{{old('pic')}}" placeholder="PIC bukan nama orang, Contoh : HRD, HCM, dll">
                                    @if($errors->has('pic'))
                                        <div class="text-danger">
                                            {{ $errors->first('pic')}}
                                        </div>
                                    @endif
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Tanggal Pelaksanaan</h2>
                                <div class="form-group">
                                    <label for="Tanggal Mulai">Tanggal Mulai KP</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="rencana_mulai_kp" value="{{old('rencana_mulai_kp')}}" name="rencana_mulai_kp" placeholder="Y-m-d">
                                    <div class="text-danger">{{ $errors->first('rencana_mulai_kp')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Selesai">Tanggal Selesai KP</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="rencana_selesai_kp" value="{{old('rencana_selesai_kp')}}" name="rencana_selesai_kp" placeholder="Y-m-d">
                                    <div class="text-danger">{{ $errors->first('rencana_selesai_kp')}}</div>
                                </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Daftar Kerja Praktek</button>
                                </div>
                            </div>
                        </form>
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