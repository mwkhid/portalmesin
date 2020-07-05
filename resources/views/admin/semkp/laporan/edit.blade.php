@extends('layouts.backend')

@section('title','Nilai Kerja Praktek')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Nilai Kerja Praktek</h2>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.laporan.update', $data->kp_id) }}" method="post">
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
                        <h2 class="content-heading border-bottom mb-4 pb-2">Seminar Kerja Praktek</h2>
                            <div class="form-group">
                                <label for="nama perusahaan">Tempat Kerja Praktek</label>
                                <input type="text" class="form-control" name="perusahaan_nama" value="{{ $data->perusahaan_nama}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Judul Laporan Kerja Praktek</label>
                                <input type="text" class="form-control" name="judul_seminar" value="{{ $data->judul_seminar}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Tanggal Kerja Praktek</label>
                                <input type="text" class="form-control" name="tanggal_kp" value="{{ date('d-m-Y',strtotime($data->tgl_mulai_kp)) }} s/d {{ date('d-m-Y', strtotime($data->tgl_selesai_kp))}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Nilai Seminar Kerja Praktek</h2>
                            <!-- <div class="form-group">
                                <label for="nama perusahaan">Nilai Huruf</label>
                                <input type="text" class="form-control" name="huruf" value="{{ old('huruf') }}" placeholder="Nilai Huruf (E-A)">
                            </div> -->
                            <div class="form-group">
                                <label for="nama perusahaan">Nilai Perusahaan <span class="text-danger">*</span></label>
                                <input required type="number" step="0.01" min="0" max="100" class="form-control" name="nilai_perusahaan" value="{{ old('nilai_perusahaan') }}" placeholder="Nilai Angka (0-100)">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Nilai Pembimbing <span class="text-danger">*</span></label>
                                <input required type="number" step="0.01" min="0" max="100" class="form-control" name="nilai_pembimbing" value="{{ old('nilai_pembimbing') }}" placeholder="Nilai Angka (0-100)">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mb-5">Submit</button>
                                <a href="{{route('admin.laporan.index')}}" class="btn btn-secondary mb-5">Kembali</a>
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

