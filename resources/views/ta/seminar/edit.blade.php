@extends('layouts.backend')

@section('title','Seminar TA')

@section('content')
<div class="content">
<form action="{{ route('ta.semhas.update', $tolak->id)}}" method="post">
    @method('PATCH')
    @csrf
    <h2 class="content-heading">Pengajuan Seminar Tugas Akhir</h2>
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
                                <input type="text" class="form-control" name="nim" value="{{ $tolak->nim }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama" value="{{ $tolak->nama_mhs }}" readonly>
                            </div>
                        </div>
                        <input type="text" class="form-control" value="PENDING" name="status_seminar" hidden>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Total SKS</label>
                            <div class="col-md-12">
                                <input type="number" step="1" min="0" class="form-control" name="sks" value="{{ $tolak->sks }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                            <div class="col-md-12">
                                <input type="number" step="0.01" min="0" max="4" class="form-control" value="{{ $tolak->ipk }}" name="ipk" readonly>
                            </div>
                        </div>                                  
                </div>
            </div>
            <!-- <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Seminar Hasil</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>

                <div class="block-content block-content-full">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Tanggal Seminar</label>
                        <div class="col-md-12">
                            <input type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" value="{{$tolak->tanggal}}">
                            @if($errors->has('tanggal'))
                                <div class="text-danger">
                                    {{ $errors->first('tanggal')}}
                                </div>
                            @endif
                        </div>
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
                        <select class="form-control js-select2" name="tempat" id="tempat">
                            <option value="{{$tolak->tempat}}">{{$tolak->nama_ruang}}</option>
                            @foreach ($ruang as $ruangs)
                                <option name="ruang" value="{{$ruangs->id}}">{{$ruangs->nama_ruang}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('tempat'))
                            <div class="text-danger">
                                {{ $errors->first('tempat')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div> -->
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
                        <input type="text" class="form-control" value="{{$tolak->id}}" name="id_seminar" hidden>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Judul</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="judul" rows="4" readonly>{{ $tolak->judul}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Abstrak</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="abstrak" rows="4" readonly>{{ $tolak->abstrak}}</textarea>
                            </div>
                        </div>
                </div>
            </div>

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
                            <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                            <input type="text" class="form-control" name="pembimbing" Value="{{$pembimbings->nama_dosen}}" readonly>
                        </div>
                    @endforeach
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary mb-5">Pengajuan Ulang</button>
                            <a href="{{route('ta.semhas.index')}}" class="btn btn-alt-warning mb-5">Back</a>
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