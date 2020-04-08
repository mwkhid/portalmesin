@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Seminar Kerja Praktek</h2>
        <!-- <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div> -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Form Seminar KP</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{url('/kp/seminar')}}" method="post">
                            {{ csrf_field() }}
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
                                    <input type="hidden" class="form-control" name="kp_id" value="{{$data->id}}">
                                    <input type="hidden" class="form-control" name="tgl_selesai_kp" value="{{$data->tgl_selesai_kp}}">
                                    @if($errors->has('kp_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('kp_id')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="status_seminarkp" value="PENDING">
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                                <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="number" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                                    <div class="text-danger">{{ $errors->first('sks')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Laporan Kerja Praktek</h2>
                                <div class="form-group">
                                    <label for="judul seminar">Judul Laporan KP</label>
                                    <input type="text" class="form-control" name="judul_seminar" value="{{old('judul_seminar')}}" placeholder="Masukkan Laporan KP">
                                    @if($errors->has('judul_seminar'))
                                        <div class="text-danger">
                                            {{ $errors->first('judul_seminar')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tanggal seminar">Tanggal Seminar KP</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="tanggal_seminar" value="{{old('tanggal_seminar')}}" name="tanggal_seminar" placeholder="Y-m-d">
                                    @if($errors->has('tanggal_seminar'))
                                        <div class="text-danger">
                                            {{ $errors->first('tanggal_seminar')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jam mulai">Jam Mulai Seminar</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{old('jam_mulai')}}" placeholder="Masukkan Jam Seminar Dimulai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                    @if($errors->has('jam_mulai'))
                                        <div class="text-danger">
                                            {{ $errors->first('jam_mulai')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jam selesai">Jam Selesai Seminar</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{old('jam_selesai')}}" placeholder="Masukkan Jam Seminar Selesai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                    @if($errors->has('jam_selesai'))
                                        <div class="text-danger">
                                            {{ $errors->first('jam_selesai')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="acceptor">Ruang:</label>
                                    <select class="form-control js-select2" name="ruang_id" id="ruang_id">
                                    <option value="">Pilih Ruang</option>
                                    @foreach($ruang as $ruangs)
                                        <option name="ruang_id" value="{{ $ruangs->id }}">{{$ruangs->nama_ruang}}</option>
                                    @endforeach
                                    </select>
                                    @if($errors->has('ruang_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('ruang_id')}}
                                        </div>
                                    @endif
                                </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection