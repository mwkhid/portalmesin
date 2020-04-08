@extends('layouts.backend')

@section('title','Pengajuan Pendadaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Pendadaran Tugas Akhir</h2>
    <form action="{{route('ta.pendadaran.update', $tolak->id)}}" method="post">
    @method('PATCH')
    @csrf
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
                                    <input type="text" class="form-control" name="nim" value="{{$tolak->nim }}" placeholder="masukkan nim" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama" value="{{$tolak->nama_mhs }}" placeholder="masukkan nama" readonly>
                                </div>
                            </div>
                            <input type="text" class="form-control" value="PENDING" name="status_pendadaran" hidden>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Total SKS</label>
                                <div class="col-md-12">
                                    <input type="number" step="1" min="0" class="form-control" name="sks" value="{{$tolak->sks }}" placeholder="Total SKS yang dicapai" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                                <div class="col-md-12">
                                    <input type="number" step="0.01" min="0" max="4" class="form-control" value="{{$tolak->ipk }}" name="ipk" placeholder="IPK terakhir" readonly>
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
                        <input type="text" class="form-control" value="{{$tolak->id_ta}}" name="id_ta" hidden>
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pendadaran</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content block-content-full">
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Tanggal Pendadaran</label>
                            <div class="col-md-12"> 
                                <input type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" value="{{$tolak->tanggal}}">
                                <div class="text-danger">{{ $errors->first('tanggal')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jam mulai">Jam Mulai Pendadaran</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{$tolak->jam_mulai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                            <div class="text-danger">{{ $errors->first('jam_mulai')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="jam selesai">Jam Selesai Pendadaran</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{$tolak->jam_selesai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                            <div class="text-danger">{{ $errors->first('jam_selesai')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="acceptor">Ruang:</label>
                            <select class="form-control js-select2" name="tempat" id="">
                                <option value="{{$tolak->tempat}}">{{$tolak->nama_ruang}}</option>
                                @foreach ($ruang as $ruangs)
                                    <option name="ruang_id" value="{{$ruangs->id }}">{{$ruangs->nama_ruang}}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('tempat')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Dosen Penguji</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <div class="row">
                            @foreach ($penguji as $key=>$pengujis)
                                <div class="col-5">
                                    <label for="sks">Penguji {{$key+1}} Pendadaran</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control js-select2" name="penguji{{$key+1}}" id="penguji{{$key+1}}">
                                        <option value="{{$pengujis->penguji}}">{{$pengujis->nama_dosen}}</option>
                                        @foreach ($dosen as $dosens)
                                            <option name="dosen" value="{{ $dosens->id }}">{{ $dosens->nama_dosen}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('penguji'.($key+1)))
                                        <div class="text-danger">
                                            {{ $errors->first('penguji'.($key+1))}}
                                        </div>
                                    @endif
                                    <br>
                                </div>
                                <div class="col-4">
                                    <input type="float" class="form-control" name="nilai{{$key+1}}" value="{{$pengujis->nilai}}"><br>
                                </div>
                                <input type="float" class="form-control" name="idpenguji{{$key+1}}" value="{{$pengujis->id}}" hidden>
                            @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 ml-auto">
                                <button type="submit" class="btn btn-alt-primary mb-5">Update Pengajuan</button>
                                <a href="{{route('ta.pendadaran.index')}}" class="btn btn-alt-warning mb-5">Back</a>
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