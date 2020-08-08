@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<div class="content">
    <!-- Default Elements -->
    <div class="block">
        <div class="block-header block-header-default">
            <h1 class="block-title" style="text-align: center; color: blue;">Update Data Seminar Kerja Praktek!</h1>
        </div>
        <div class="block-content">
            <h2 class="content-heading">Seminar Kerja Praktek</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{route('kp.seminar.update', $tolak->id)}}" method="post">
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
                                <input type="hidden" class="form-control" name="id" value="{{$tolak->id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="kp_id" value="{{$tolak->kp_id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="tgl_selesai_kp" value="{{$tolak->tgl_selesai_kp}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_seminarkp" value="PENDING">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="number" class="form-control" name="sks" value="{{$tolak->sks}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" class="form-control" name="ipk" value="{{$tolak->ipk}}" readonly>
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Laporan Kerja Praktek</h2>
                            <div class="form-group">
                                <label for="judul seminar">Judul Laporan KP</label>
                                <input type="text" class="form-control" name="judul_seminar" value="{{$tolak->judul_seminar}}">
                                @if($errors->has('judul_seminar'))
                                    <div class="text-danger">
                                        {{ $errors->first('judul_seminar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tanggal seminar">Tanggal Seminar KP</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tanggal_seminar" value="{{$tolak->tanggal_seminar}}" name="tanggal_seminar">
                                @if($errors->has('tanggal_seminar'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal_seminar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam mulai">Jam Mulai Seminar</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{$tolak->jam_mulai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_mulai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_mulai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam selesai">Jam Selesai Seminar</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{$tolak->jam_selesai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_selesai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_selesai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="acceptor">Ruang:</label>
                                <select class="form-control js-select2" name="ruang_id" id="ruang_id" >
                                <option value=""></option>
                                @foreach($ruang as $ruangs)
                                    <option name="ruang_id" value="{{ $ruangs->id }}" {{$tolak->ruang_id == $ruangs->id ? 'selected' : ''}}>{{$ruangs->nama_ruang}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keikutsertaan">Keikutsertaan Seminar KP:</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        Nama
                                    </div>
                                    <div class="col-md-4">
                                        NIM
                                    </div>
                                    @foreach($klaim as $key=>$row)
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="klaim_nama{{$key}}" value="{{$row->klaim_nama}}">
                                        <div class="text-danger">{{ $errors->first('klaim_nama'.($key))}}</div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="klaim_nim{{$key}}" value="{{$row->klaim_nim}}">
                                        <div class="text-danger">{{ $errors->first('klaim_nim'.($key))}}</div><br>
                                    </div>
                                        <input type="hidden" class="form-control" name="idklaim{{$key}}" value="{{$row->id}}"><br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-5 mr-5">Update</button>
                                <a type="button" class="btn btn-secondary mb-5 mr-5" href="{{url('kp/seminar')}}">Kembali</a>
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
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection