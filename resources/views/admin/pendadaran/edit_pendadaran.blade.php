@extends('layouts.backend')

@section('title','Pendadaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Pendadaran</h2>
    <form action="{{route('admin.pendadaran.update', $data->id)}}" method="post">
    @method('PATCH')
    @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Mahasiswa</h3>
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
                        <input type="hidden" class="form-control" name="tanggal_semhas" value="{{$data->tanggal }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Tugas Akhir</h3>
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
                                    <input type="text" class="form-control "  name="pembimbing{{$key+1}}" value="{{$pembimbings->nama_dosen}}" readonly>
                                </div>
                                    <input type="text" class="form-control" name="pem_id{{$key+1}}" value="{{$pembimbings->pembimbing}}" hidden>
                            @endforeach
                            </div>
                            <div class="col-md-6">
                            @foreach($pembimbing as $pembimbings)
                                <div class="form-group">
                                    <label for="status">Status</label><br>
                                    @if($pembimbings->status_pendadaranpem == 'PENDING')
                                        <button class="btn btn-warning mb-5" disabled>BELUM DISETUJUI</button>
                                    @elseif($pembimbings->status_pendadaranpem == 'SETUJU')   
                                        <button class="btn btn-success mb-5" disabled>DISETUJUI</button>
                                    @elseif($pembimbings->status_pendadaranpem == 'TOLAK')   
                                        <button class="btn btn-danger mb-5" disabled>DITOLAK</button>
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
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pendadaran</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <input type="hidden" class="form-control" name="nama" value="{{$data->nama_mhs }}" readonly>
                        <div class="form-group">
                            <label for="draftpendadaran">Link Draf Tugas Akhir</label>
                            <a href="{{$data->draft_pendadaran}}" class="form-control" target="_blank" readonly>{{$data->draft_pendadaran}}</a>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Tanggal Pendadaran <span class="text-danger">*</span></label> 
                            <input required type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pendadaran" value="{{old('tanggal')}}">
                            <div class="text-danger">{{ $errors->first('tanggal')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="jam mulai">Jam Mulai Pendadaran <span class="text-danger">*</span></label>
                            <input required type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" placeholder="Masukkan jam mulai pendadaran" value="{{old('jam_mulai')}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                            <div class="text-danger">{{ $errors->first('jam_mulai')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="jam selesai">Jam Selesai Pendadaran <span class="text-danger">*</span></label>
                            <input required type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" placeholder="Masukkan jam selesai pendadaran" value="{{old('jam_selesai')}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                            <div class="text-danger">{{ $errors->first('jam_selesai')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="acceptor">Ruang <span class="text-danger">*</span></label>
                            <select required class="form-control js-select2" name="tempat" id="">
                                <option value="">Pilih Ruang</option>
                                @foreach ($ruang as $ruangs)
                                    <option name="ruang_id" value="{{$ruangs->id }}" {{old('tempat') == $ruangs->id ? 'selected' : ''}}>{{$ruangs->nama_ruang}}</option>
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
                            @foreach($penguji as $key=>$pengujis)
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="sks">Penguji {{$key+1}} Pendadaran</label>
                                </div>
                                <div class="col-md-12">
                                    <select required class="js-select2 form-control" name="penguji{{$key+1}}" id="penguji{{$key+1}}">
                                        <option value="">Pilih Penguji</option>
                                        @foreach ($dosen as $dosens)
                                            <option name="dosen" value="{{ $dosens->id }}" {{$pengujis->penguji_semhas == $dosens->id ? 'selected' : ''}}>{{ $dosens->nama_dosen}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control" name="penguji_id{{$key+1}}" value="{{$pengujis->id}}" hidden>
                                    @if($errors->has('penguji'.($key+1)))
                                        <div class="text-danger">
                                            {{ $errors->first('penguji'.($key+1))}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        <div class="form-group row">
                            <div class="col-lg-12 ml-auto">
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mb-5">Submit</button>
                                <button type="submit" name="action" value="tolak" class="btn btn-danger mb-5">Tolak</button>
                                <a href="{{route('admin.pendadaran.index')}}" class="btn btn-secondary mb-5">Kembali</a>
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