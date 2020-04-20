@extends('layouts.backend')

@section('title','Pendaftaran Seminar KP')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pendaftaran Seminar Kerja Praktek</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.seminarkp.update', $data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="Nim">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $data->nim}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" class="form-control" name="sks" value="{{ $data->sks}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" class="form-control" name="ipk" value="{{ $data->ipk}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Seminar Kerja Praktek</h2>
                            <div class="form-group">
                                <label for="nama perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_nama" value="{{ $data->perusahaan_nama}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Judul Seminar Kerja Praktek</label>
                                <input type="text" class="form-control" name="judul_seminar" value="{{ $data->judul_seminar}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Seminar KP</label>
                                <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="tanggal_seminar" value="{{date("d-m-Y",strtotime($data->tanggal_seminar)) }}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Jam Mulai Seminar KP</label>
                                <input type="text" class="form-control" name="jam_mulai" value="{{ $data->jam_mulai}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Jam Selesai Seminar KP</label>
                                <input type="text" class="form-control" name="jam_selesai" value="{{ $data->jam_selesai}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Tempat Seminar KP</label>
                                <input type="text" class="form-control" name="ruang" value="{{ $data->nama_ruang}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mr-5 mb-5">Setuju</button>
                                <button type="submit" name="action" value="tolak" class="btn btn-danger mr-5 mb-5">Tolak</button>
                                <a href="{{route('admin.seminarkp.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                            </div>
                        </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection

