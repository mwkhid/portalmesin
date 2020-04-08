@extends('layouts.backend')

@section('title','Seminar Hasil Mahasiswa')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Seminar Hasil</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dosen Pembimbing</h3>
            </div>
            <div class="block">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-6">
                        @foreach($pembimbing as $key=>$pembimbings)
                            <div class="form-group">
                                <input type="text" class="form-control" name="idpem{{$key+1}}" value="{{$pembimbings->id}}" hidden>
                                <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control "  name="pembimbing{{$key+1}}" Value="{{$pembimbings->nama_dosen}}" readonly>
                            </div>
                        @endforeach
                        </div>
                        <div class="col-md-6">
                        @foreach($pembimbing as $pembimbings)
                            <div class="form-group">
                                <label for="sks">Status</label><br>
                                @if($pembimbings->status_semhas == 'PENDING')
                                    <button class="btn btn-warning" disabled>BELUM DISETUJUI</button>
                                @elseif($pembimbings->status_semhas == 'SETUJU')
                                    <button class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($pembimbings->status_semhas == 'TOLAK')
                                    <button class="btn btn-danger" disabled>DITOLAK</button>
                                @endif
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">Mahasiswa</h3>
            </div>
            <div class="block">
                <div class="block-content">
                    <form action="{{route('opta.semhas.update',$data->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                        <!-- Form Labels on top - Default Style -->
                            <div class="form-group">
                                <label for="nama mhs">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_mhs" value="{{$data->nama_mhs}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Tugas Akhir</label>
                                <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{$data->judul}}</textarea>
                                <!-- <text type="text" class="form-control" name="judul" value="{{$data->judul}}" readonly> -->
                            </div>
                            @foreach($pembimbing as $key=>$pembimbings)
                                <input type="hidden" class="form-control" name="idpem{{$key+1}}" value="{{$pembimbings->pembimbing}}" hidden>
                            @endforeach
                            @foreach($penguji as $key=>$pengujis)
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="sks">Penguji {{$key+1}} Seminar Hasil</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="js-select2 form-control" name="penguji{{$key+1}}" id="penguji{{$key+1}}">
                                        <option value="">Pilih Penguji</option>
                                        @foreach ($dosen as $dosens)
                                            <option name="dosen" value="{{ $dosens->id }}" {{$pengujis->penguji_semhas == $dosens->id ? 'selected' : ''}}>{{ $dosens->nama_dosen}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="form-control" name="penguji_id{{$key+1}}" value="{{$pengujis->id}}" hidden>
                                    @if($errors->has('penguji'.($key+1)))
                                        <div class="text-danger">
                                            {{ $errors->first('penguji'.($key+1))}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <label for="example-text-input">Tanggal Seminar Hasil</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" value="{{$data->tanggal}}">
                                @if($errors->has('tanggal'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam mulai">Jam Mulai Seminar Hasil</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{$data->jam_mulai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_mulai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_mulai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam selesai">Jam Selesai Seminar Hasil</label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{$data->jam_selesai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_selesai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_selesai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ruang">Ruang Seminar Hasil</label>
                                <select class="form-control js-select2" name="tempat" id="tempat">
                                    <option value="">Pilih Ruang Seminar Hasil</option>
                                    @foreach ($ruang as $ruangs)
                                        <option name="ruang" value="{{$ruangs->id}}" {{$data->tempat == $ruangs->id ? 'selected' : ''}}>{{$ruangs->nama_ruang}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('tempat'))
                                    <div class="text-danger">
                                        {{ $errors->first('tempat')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mb-5">Submit</button>
                                <a href="{{route('opta.semhas.index')}}" class="btn btn-secondary mb-5">Kembali</a>
                            </div>
                        <!-- END Form Labels on top - Default Style -->
                    </form>
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr','select2']); });</script>
@endsection
