@extends('layouts.backend')

@section('title','Tugas Akhir Mahasiswa')

@section('content')
<div class="content">
<form action="{{route('admin.surattugas.update', $data->id)}}" method="post">
@method('PATCH')
@csrf
    <h2 class="content-heading">Tugas Akhir</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">Dosen Pembimbing</h3>
            </div>
            <div class="block">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-6">
                        @foreach ($pembimbing as $key=>$pembimbings)
                        <div class="form-group">
                            <label for="pembimbing">Pembimbing {{$key+1}} Tugas Akhir</label>
                            <select class="form-control js-select2" name="pembimbing{{$key+1}}" id="pembimbing{{$key+1}}">
                                <option value=""></option>
                                @foreach ($dosen as $dosens)
                                    <option name="dosen" value="{{ $dosens->id }}" {{($pembimbings->pembimbing == $dosens->id) ? 'selected' : ''}}>{{ $dosens->nama_dosen}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pembimbing'.($key+1)))
                                <div class="text-danger">
                                    {{ $errors->first('pembimbing'.($key+1))}}
                                </div>
                            @endif
                        </div>
                        <input type="text" class="form-control" name="idpem{{$key+1}}" value="{{$pembimbings->id}}" hidden>
                        @endforeach
                            <div class="form-group">
                                <label for="">{{$data->nama_peminatan}}</label>
                                <input type="text" class="form-control" name="koordinator" value="{{$kbk->nama_dosen}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                        @foreach($pembimbing as $pembimbings)
                            <div class="form-group">
                                <label for="sks">Status</label><br>
                                @if($pembimbings->status_pem == 'PENDING')
                                    <button class="btn btn-warning" disabled>BELUM DISETUJUI</button>
                                @elseif($pembimbings->status_pem == 'SETUJU')
                                    <button class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($pembimbings->status_pem == 'TOLAK')
                                    <button class="btn btn-danger" disabled>DITOLAK</button>
                                @endif
                            </div>
                        @endforeach
                            <div class="form-group">
                                <label for="">Status</label><br>
                                @if($data->status_kbk == 'PENDING')
                                    <button type="submit" name="action" value="setuju" class="btn btn-warning" disabled>BELUM DISETUJUI</button>
                                @elseif($data->status_kbk == 'SETUJU')
                                    <button type="submit" name="action" value="tolak" class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($data->status_kbk == 'TOLAK')
                                    <button type="submit" name="action" value="setuju" class="btn btn-danger" disabled>DITOLAK</button>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="float-right ml-auto">
                                    @if($data->status_kbk == 'SETUJU')
                                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                                    @endif
                                    <a href="{{route('admin.surattugas.index')}}" class="btn btn-secondary mb-5">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
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
                            <input type="text" class="form-control" id="example-text-input" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="sks" value="{{$data->sks }}" placeholder="Total SKS yang dicapai" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="ipk" value="{{$data->ipk }}" placeholder="IPK terakhir" readonly>
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
                        <div class="form-group">
                            <label for="sks">Peminatan</label>
                            <input type="text" class="form-control "  name="peminatan" Value="{{$data->nama_peminatan}}" readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Judul</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="judul" rows="4" readonly>{{$data->judul}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Abstrak</label>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" id="example-text-input" name="abstrak" rows="4" readonly>{{$data->abstrak}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Tanggal Pengajuan</label>
                            <div class="col-md-12"> 
                                <input type="text" class="form-control"  name="tgl_pengajuan" value="{{date("d-m-Y", strtotime($data->tgl_pengajuan))}}" readonly>
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

                            @foreach($matkul as $matkul)
                            <div class="col-md-3">
                                <input type="text" class="form-control"  value="{{$matkul->kode_matkul}}"  readonly><br>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control"  value="{{$matkul->nama_matkul}}" readonly><br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control"  value="{{$matkul->ip}}" readonly><br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" " value="{{$matkul->huruf}}" readonly><br>
                            </div>
                            @endforeach
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
