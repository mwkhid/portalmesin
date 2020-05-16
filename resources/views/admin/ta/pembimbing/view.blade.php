@extends('layouts.backend')

@section('title','Perubahan Pembimbing TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Perubahan Pembimbing Tugas Akhir</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong>Success</strong> {{ session()->get('message') }}  
        </div>
    @endif
    <form action="{{route('admin.pembimbingta.update', $data->id)}}" method="post">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="nim">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="nama">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="sks">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
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
                    <h3 class="block-title">Tugas Akhir</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="judullama">Judul Lama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="judul_lama" value="{{$data->judul}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            @foreach($pembimbinglama as $key=>$pembimbinglamas)
                            <div class="form-group">
                                <input type="text" class="form-control" name="idpem_lama{{$key+1}}" value="{{$pembimbinglamas->id}}" hidden>
                                <label for="sks">Pembimbing Lama {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control "  name="pembimbing_lama{{$key+1}}" Value="{{$pembimbinglamas->nama_dosen}}" readonly>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-2">
                            @foreach($statuslama as $key=>$pembimbinglamas)
                            <div class="form-group">
                                <label for="">Status</label><br>
                                @if($pembimbinglamas->status_pembimbing_lama == 1)
                                    <button type="submit" name="action" class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($pembimbinglamas->status_pembimbing_lama == 0)
                                    <button type="submit" name="action" class="btn btn-danger" disabled>DITOLAK</button>
                                @else
                                    <button type="submit" name="action" class="btn btn-warning" disabled>BELUM DISETUJUI</button>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            @foreach($pembimbingbaru as $key=>$pembimbingbarus)
                            <div class="form-group">
                                <input type="text" class="form-control" name="idpem_baru{{$key+1}}" value="{{$pembimbingbarus->pembimbing_baru}}" hidden>
                                <label for="sks">Pembimbing Baru {{$key+1}} Tugas Akhir</label>
                                <input type="text" class="form-control "  name="pembimbing_baru{{$key+1}}" Value="{{$pembimbingbarus->nama_dosen}}" readonly>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-2">
                            @foreach($pembimbingbaru as $key=>$pembimbingbarus)
                            <div class="form-group">
                                <label for="">Status</label><br>
                                @if($pembimbingbarus->status_pembimbing_baru == 1)
                                    <button type="submit" name="action" class="btn btn-success" disabled>DISETUJUI</button>
                                @elseif($pembimbingbarus->status_pembimbing_baru == 0)
                                    <button type="submit" name="action" class="btn btn-danger" disabled>DITOLAK</button>
                                @else
                                    <button type="submit" name="action" class="btn btn-sm btn-warning" disabled>BELUM DISETUJUI</button>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="alasan">Alasan</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="alasan" name="pembimbing_alasan" rows="6" readonly>{{$data->pembimbing_alasan}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" name="action" value="setuju" class="btn btn-primary mb-5">Setuju</button>
                            <button type="submit" name="action" value="tolak" class="btn btn-danger mb-5">Tolak</button>
                            <a href="{{route('admin.pembimbingta.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection