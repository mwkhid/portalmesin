@extends('layouts.backend')

@section('title','Pendadaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Pendadaran</h2>
    <form action="{{route('opta.pendadaran.update', $data->id)}}" method="post">
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
                                <input type="text" class="form-control" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">IPK</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="ipk" value="{{$data->ipk }}" readonly>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">SKS</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sks" value="{{$data->sks }}" readonly>
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
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Judul</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="judul" rows="4" readonly>{{ $data->judul}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Abstrak</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="abstrak" rows="4" readonly>{{ $data->abstrak}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <label for="status">Status</label><br>
                                    @if($pembimbings->status_pendadaranpem == 'PENDING')
                                        <button type="submit" name="action" value="setuju" class="btn btn-warning mb-5" {{($pembimbings->id != $data->id ) ? 'disabled' : ''}}>BELUM DISETUJUI</button>
                                    @elseif($pembimbings->status_pendadaranpem == 'SETUJU')   
                                        <button type="submit" name="action" value="tolak" class="btn btn-success mb-5" {{($pembimbings->id != $data->id) ? 'disabled' : ''}}>DISETUJUI</button>
                                    @elseif($pembimbings->status_pendadaranpem == 'TOLAK')   
                                        <button type="submit" name="action" value="setuju" class="btn btn-danger mb-5" {{($pembimbings->id != $data->id ) ? 'disabled' : ''}}>DITOLAK</button>
                                    @endif
                                </div>
                            @endforeach
                                <input type="text" class="form-control" value="{{$data->pembimbing}}" name="id_pembimbing" hidden>    
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
                                <input type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" value="{{$data->tanggal}}">
                                <div class="text-danger">{{ $errors->first('tanggal')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jam mulai">Jam Mulai Pendadaran</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{$data->jam_mulai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                            <div class="text-danger">{{ $errors->first('jam_mulai')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="jam selesai">Jam Selesai Pendadaran</label>
                            <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{$data->jam_selesai}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                            <div class="text-danger">{{ $errors->first('jam_selesai')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="acceptor">Ruang:</label>
                            <select class="form-control js-select2" name="tempat" id="">
                                <option></option>
                                @foreach ($ruang as $ruangs)
                                    <option name="ruang_id" value="{{$ruangs->id }}" {{$data->tempat == $ruangs->id  ? 'selected' : ''}}>{{$ruangs->nama_ruang}}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">{{ $errors->first('tempat')}}</div>
                        </div>
                    </div>
                </div>

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
                        @foreach ($penguji as $key=>$pengujis)
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="sks">Penguji {{$key+1}} Pendadaran</label>
                            </div>
                            <!-- <div class="col-4">
                                <label for="nilai">Nilai {{$key+1}} </label>
                            </div> -->
                            <div class="col-md-12">
                                <select class="form-control js-select2" name="penguji{{$key+1}}" id="penguji{{$key+1}}">
                                    <option></option>
                                    @foreach ($dosen as $dosens)
                                        <option name="dosen" value="{{ $dosens->id }}" {{$pengujis->penguji_pendadaran == $dosens->id  ? 'selected' : ''}}>{{ $dosens->nama_dosen}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('penguji'.($key+1)))
                                    <div class="text-danger">
                                        {{ $errors->first('penguji'.($key+1))}}
                                    </div>
                                @endif
                            </div>
                            <!-- <div class="col-4">
                                <input type="float" class="form-control" name="nilai{{$key+1}}" placeholder="Masukkan nilai Pendadaran">
                            </div> -->
                            <input type="text" class="form-control" name="idpenguji{{$key+1}}" value="{{$pengujis->id}}" hidden>
                        </div>
                        @endforeach
                        <div class="form-group row">
                            <div class="col-lg-12 ml-auto">
                                <button type="submit" class="btn btn-alt-primary mb-5">Update</button>
                                <a href="{{route('opta.pendadaran.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
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