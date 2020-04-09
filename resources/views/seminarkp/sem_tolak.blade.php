@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Seminar Kerja Praktek</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h1 class="block-title" style="text-align: center; color: red;">Ditolak! Update Data Seminar Kerja Praktek!</h1>
                    </div>
                    <div class="block-content">
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
                                    <input type="hidden" class="form-control" name="status_seminarkp" value="PENDING">
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                                <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="number" class="form-control" name="sks" value="{{$tolak->sks}}">
                                    <div class="text-danger">{{ $errors->first('sks')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="text" class="form-control" name="ipk" value="{{$tolak->ipk}}">
                                    @if($errors->has('ipk'))
                                        <div class="text-danger">
                                            {{ $errors->first('ipk')}}
                                        </div>
                                    @endif
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
                                    <input type="text" class="form-control js-flatpickr bg-white" name="tanggal_seminar" id="flatpickr2" value="{{$tolak->tanggal_seminar}}">
                                    @if($errors->has('tanggal'))
                                        <div class="text-danger">
                                            {{ $errors->first('tanggal')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jam mulai">Jam Mulai Seminar</label>
                                    <input type="text" class="form-control js-flatpickr bg-white" name="jam_mulai" id="flatpickr" value="{{$tolak->jam_mulai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                    @if($errors->has('jam_mulai'))
                                        <div class="text-danger">
                                            {{ $errors->first('jam_mulai')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jam selesai">Jam Selesai Seminar</label>
                                    <input type="text" class="form-control js-flatpickr bg-white" name="jam_selesai" id="flatpickr" value="{{$tolak->jam_selesai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                    @if($errors->has('jam_selesai'))
                                        <div class="text-danger">
                                            {{ $errors->first('jam_selesai')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="acceptor">Ruang:</label>
                                    <select class="form-control js-select2" name="ruang_id" id="ruang_id">
                                    <option value=""></option>
                                    @foreach($ruang as $ruangs)
                                        <option name="ruang_id" value="{{ $ruangs->id }}" {{$tolak->ruang_id == $ruangs->id ? 'selected' : ''}}>{{$ruangs->nama_ruang}}</option>
                                    @endforeach
                                    </select>
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