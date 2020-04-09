@extends('layouts.backend')

@section('title','Pendaftaran TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Tugas Akhir</h2>
    <form action="{{ route('ta.pendaftaran.store') }}" method="post">
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
                            <input type="text" class="form-control" name="nim" value="{{ $data->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs }}" placeholder="masukkan nama" disabled="">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" value="PENDING" name="status_ta">
                    <input type="hidden" class="form-control" value="0" name="cetak_ta">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Total SKS</label>
                        <div class="col-md-12">
                            <input type="number" step="1" min="0" class="form-control" name="sks" value="{{ $data->sks }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{ $data->ipk }}" readonly>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="mahasiswa_id" value="{{$data->id}}" hidden>
                    @if($errors->has('mahasiswa_id'))
                        <div class="text-danger">
                            {{ $errors->first('mahasiswa_id')}}
                        </div>
                    @endif                           
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
                    <div class="form-group">
                        <label for="sks">Peminatan</label>
                        <select class="form-control js-select2" name="peminatan_id" id="peminatan_id" data-live-search="true">
                            <option value="">Pilih Peminatan</option>
                            @foreach ($peminatan as $peminatans)
                                <option name="peminatan" value="{{ $peminatans->id }}">{{ $peminatans->nama_peminatan}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('peminatan_id') }}</span>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Judul</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="judul" name="judul" rows="4" placeholder="Masukkan judul">{{old('judul')}}</textarea>
                            @if($errors->has('judul'))
                                <span class="text-danger">
                                    {{ $errors->first('judul')}}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Abstrak</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="abstrak" name="abstrak" rows="6" placeholder="Deskripsi singkat">{{old('abstrak')}}</textarea>
                            <span class="text-danger">{{ $errors->first('abstrak') }}</span>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-12" for="example-text-input">Tanggal Pengajuan</label>
                        <div class="col-md-12"> 
                            <input type="text" class="form-control bg-white" id="flatpickr" name="tgl_pengajuan" placeholder="Y-m-d">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mata Kuliah Pilihan Pendukung</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                Kode MK
                            </div>
                            <div class="col-md-5">
                                Nama MK
                            </div>
                            <div class="col-md-2">
                                Nilai
                            </div>
                            <div class="col-md-2">
                                Huruf
                            </div>

                            <?php for ($i = 1; $i <= 3; $i++){ ?>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="kode_mk{{$i}}" id="kode_mk{{$i}}" placeholder="Kode Mata Kuliah {{$i}}"><br>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control js-select2" name="mk{{$i}}" id="mk{{$i}}" >
                                    <option value="">Pilih Mata Kuliah</option>
                                    @foreach ($matakuliah as $mks)
                                        <option name="mata_kuliah" value="{{ $mks->nama }}">{{ $mks->nama}}</option>
                                    @endforeach
                                </select><br>
                                @if($errors->has('mk'.$i))
                                    <div class="text-danger">
                                        {{ $errors->first('mk'.$i)}}
                                    </div>
                                @endif
                                <br>
                            </div>
                            <div class="col-md-2">
                                <input type="float" class="form-control" name="nilai_mk{{$i}}" placeholder="Nilai (0-4)"><br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="huruf_mk{{$i}}" placeholder="Huruf (E-A)"><br>
                            </div>
                            <?php } ?>
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
                    <h3 class="block-title">Dosen Pembimbing</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content col-md-6">
                    <?php for ($i = 1; $i <= 2; $i++) { ?>
                    <div class="form-group">
                        <label for="sks">Pembimbing {{$i}} Tugas Akhir</label>
                        <select class="form-control js-select2" name="pembimbing{{$i}}" id="pembimbing{{$i}}">
                            <option value="">Pilih Pembimbing</option>
                            @foreach ($dosen as $dosens)
                                <option name="dosen" value="{{ $dosens->id }}">{{ $dosens->nama_dosen}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pembimbing'.$i))
                            <div class="text-danger">
                                {{ $errors->first('pembimbing'.$i)}}
                            </div>
                        @endif
                    </div>
                    <?php } ?>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary">Daftar</button>
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