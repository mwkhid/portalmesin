@extends('layouts.backend')

@section('title','Seminar Hasil Tugas Akhir')

@section('content')
<div class="content">
    <h2 class="content-heading">Seminar Hasil Tugas Akhir</h2>
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
                                @if($pembimbings->status_semhas == 'PENDING')
                                    <button type="submit" name="action" value="setuju" class="btn btn-warning mb-5" disabled>BELUM DISETUJUI</button>
                                @elseif($pembimbings->status_semhas == 'SETUJU')   
                                    <button type="submit" name="action" value="tolak" class="btn btn-success mb-5" disabled>DISETUJUI</button>
                                @elseif($pembimbings->status_semhas == 'TOLAK')   
                                    <button type="submit" name="action" value="setuju" class="btn btn-danger mb-5" disabled>DITOLAK</button>
                                @endif
                            </div>
                        @endforeach
                            <input type="text" class="form-control" value="{{$data->pembimbing}}" name="id_pembimbing" hidden>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="float-right">
                                    <!-- <button type="submit" class="btn btn-alt-primary mb-5">Setujui</button> -->
                                    <!-- <button type="submit" class="btn btn-alt-primary mb-5">Ditolak</button> -->
                                    <a href="{{route('dosen.semhas.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Penguji Seminar Hasil</h3>
                </div>
                <div class="block-content">
                    @foreach($penguji as $key=>$pengujis)
                        <div class="form-group">
                            <input type="text" class="form-control" name="idpenguji{{$key+1}}" value="{{$pengujis->id}}" hidden>
                            <label for="sks">Penguji {{$key+1}} Seminar Hasil</label>
                            <input type="text" class="form-control "  name="penguji{{$key+1}}" Value="{{$pengujis->nama_dosen}}" readonly>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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
                </div>
                <div class="block-content">
                    <div class="form-group">
                        <label for="sks">Peminatan</label>
                        <input type="text" class="form-control"  name="peminatan" Value="{{$data->nama_peminatan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Judul</label>
                        <textarea type="text" class="form-control" id="example-text-input" name="judul" rows="4" readonly>{{$data->judul}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Abstrak</label>
                        <textarea type="text" class="form-control" id="example-text-input" name="abstrak" rows="4" readonly>{{$data->abstrak}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nim">Link Draf Tugas Akhir</label>
                        <div>
                            <a href="{{$data->draft_semhas}}" target="_blank" readonly>{{$data->draft_semhas}}</a>
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
</div>
@endsection
