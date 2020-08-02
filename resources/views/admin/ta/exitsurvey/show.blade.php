@extends('layouts.backend')

@section('title','Exit Survey Mahasiswa')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <h2 class="content-heading">Exit Survey Mahasiswa</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-3">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="nama" value="{{$data->nama}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">NIM <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Email diluar UNS <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="email" class="form-control" name="email" value="{{$data->email}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Link Sosial Media</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="sosmed" value="{{$data->sosmed}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Link Linkedin</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Alamat Rumah <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="alamat" class="form-control" rows="2" readonly>{{$data->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">No Telephon (Hp) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="no_hp" value="{{$data->no_hp}}" readonly>
                        </div>
                    </div>
                    <h5>Pengalaman Belajar</h5>
                    <div class="form-group row">
                        <label class="col-5">Orientasi/Adaptasi Perkuliahan</label>
                        <div class="col-7">
                            @if($data->PB1 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB1 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB1 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB1 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB1 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Susunan Kurikulum</label>
                        <div class="col-7">
                            @if($data->PB2 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB2 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB2 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB2 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB2 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kelengkapan dan Availabilitas Mata Kuliah</label>
                        <div class="col-7">
                            @if($data->PB3 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB3 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB3 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB3 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB3 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kebebasan/Fleksibilitas dalam mengambil Mata Kuliah</label>
                        <div class="col-7">
                            @if($data->PB4 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB4 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB4 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB4 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB4 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kelengkapan Prasarana Kuliah</label>
                        <div class="col-7">
                            @if($data->PB5 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB5 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB5 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB5 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB5 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Pengajaran Dosen di Kelas</label>
                        <div class="col-7">
                            @if($data->PB6 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB6 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB6 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB6 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB6 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Konsultasi Pengajaran Dosen di Luar Kelas</label>
                        <div class="col-7">
                            @if($data->PB7 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB7 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB7 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB7 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB7 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Soal UTS/UAS di perkuliahan</label>
                        <div class="col-7">
                            @if($data->PB8 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB8 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB8 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB8 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB8 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Tugas/Proyek di perkuliahan</label>
                        <div class="col-7">
                            @if($data->PB9 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB9 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB9 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB9 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB9 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Laboratorium</label>
                        <div class="col-7">
                            @if($data->PB10 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB10 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB10 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB10 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB10 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Praktikum</label>
                        <div class="col-7">
                            @if($data->PB11 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB11 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB11 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB11 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB11 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kelengkapan Peralatan Laboratorium</label>
                        <div class="col-7">
                            @if($data->PB12 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB12 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB12 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB12 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB12 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Asisten Praktikum/Laboratorium</label>
                        <div class="col-7">
                            @if($data->PB13 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB13 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB13 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB13 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB13 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Bimbingan Akademik (PA)</label>
                        <div class="col-7">
                            @if($data->PB14 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB14 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB14 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB14 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB14 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Administrasi Prodi</label>
                        <div class="col-7">
                            @if($data->PB15 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB15 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB15 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB15 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB15 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Administrasi Kerja Praktek/Internship</label>
                        <div class="col-7">
                            @if($data->PB16 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB16 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB16 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB16 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB16 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Bimbingan Kerja Praktek/Internship</label>
                        <div class="col-7">
                            @if($data->PB17 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB17 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB17 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB17 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB17 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Administrasi Tugas Akhir </label>
                        <div class="col-7">
                            @if($data->PB18 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB18 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB18 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB18 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB18 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Bimbingan Tugas Akhir</label>
                        <div class="col-7">
                            @if($data->PB19 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB19 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB19 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB19 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB19 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Keterlibatan Mahasiswa dalam Penelitian</label>
                        <div class="col-7">
                            @if($data->PB20 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB20 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB20 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB20 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB20 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Keterlibatan Mahasiswa dalam Pengabdian Masyarakat</label>
                        <div class="col-7">
                            @if($data->PB21 == 1)
                                <input type="text" class="form-control" value="Sangat Kurang" readonly>
                            @elseif($data->PB21 == 2)
                                <input type="text" class="form-control" value="Kurang" readonly>
                            @elseif($data->PB21 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PB21 == 4)
                                <input type="text" class="form-control" value="Baik" readonly>
                            @elseif($data->PB21 == 5)
                                <input type="text" class="form-control" value="Sangat Baik" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saran untuk Prodi terkait pengalaman belajar/kurikulum:</label>
                        <div class="col-7">
                            <textarea name="PB22" class="form-control" rows="2" readonly>{{$data->PB22}}</textarea>
                        </div>
                    </div>
                    <h5>Engineering outcome/Luaran Pembelajaran</h5>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu menerapkan pengetahuan matematika, ilmu pengetahuan alam dan/atau material, teknologi informasi dan keteknikan untuk mendapatkan pemahaman menyeluruh tentang prinsip-prinsip teknik elektro.</label>
                        <div class="col-7">
                            @if($data->LP1 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP1 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP1 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP1 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP1 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu mendesain komponen, system dan/atau proses untuk memenuhi kebutuhan yang diharapkan didalam batasan-batasan realistis dalam bidang teknik Elektro.</label>
                        <div class="col-7">
                            @if($data->LP2 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP2 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP2 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP2 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP2 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu mendesain dan melaksanakan eksperimen laboratorium dan/atau lapangan serta menganalisis dan mengartikan data untuk memperkuat penilaian teknik.</label>
                        <div class="col-7">
                            @if($data->LP3 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP3 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP3 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP3 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP3 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu mengidentifikasi, merumuskan, menganalisis dan menyelesaikan permasalahan Teknik elektro.</label>
                        <div class="col-7">
                            @if($data->LP4 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP4 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP4 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP4 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP4 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu menerapkan metode, keterampilan dan piranti teknik elektro yang modern yang diperlukan untuk praktek keteknikan.</label>
                        <div class="col-7">
                            @if($data->LP5 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP5 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP5 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP5 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP5 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu berkomunikasi secara efektif baik lisan maupun tulisan.</label>
                        <div class="col-7">
                            @if($data->LP6 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP6 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP6 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP6 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP6 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu merencanakan, menyelesaikan dan mengevaluasi tugas didalam batasan-batasan yang ada.</label>
                        <div class="col-7">
                            @if($data->LP7 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP7 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP7 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP7 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP7 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu bekerja dalam tim lintas disiplin dan lintas budaya.</label>
                        <div class="col-7">
                            @if($data->LP8 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP8 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP8 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP8 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP8 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu bertanggung jawab kepada masyarakat dan mematuhi etika profesi dalam menyelesaikan permasalahan Teknik elektro.</label>
                        <div class="col-7">
                            @if($data->LP9 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP9 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP9 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP9 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP9 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu memahami kebutuhan akan pembelajaran sepanjang hayat, termasuk akses terhadap pengetahuan terkait isu-isuke kinian yang relevan.</label>
                        <div class="col-7">
                            @if($data->LP10 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->LP10 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->LP10 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->LP10 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->LP10 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saran untuk Prodi terkait outcome/luaran pembelajaran:</label>
                        <div class="col-7">
                            <textarea name="LP11" class="form-control" rows="2" readonly>{{$data->LP11}}</textarea>
                        </div>
                    </div>
                    <h5>Post Graduate Plan</h5>
                    <div class="form-group row">
                        <label class="col-5">Rancana bidang pekerjaan setelah lulus S1</label>
                        <div class="col-7">
                            @if($data->PGP1 == 1)
                                <input type="text" class="form-control" value="Bidang Electrical Engineering" readonly>
                            @elseif($data->PGP1 == 2)
                                <input type="text" class="form-control" value="Manajemen Perusahaan" readonly>
                            @elseif($data->PGP1 == 3)
                                <input type="text" class="form-control" value="Peneliti (R&D)" readonly>
                            @elseif($data->PGP1 == 4)
                                <input type="text" class="form-control" value="Akademisi/Melanjutkan jenjang S2" readonly>
                            @elseif($data->PGP1 == 5)
                                <input type="text" class="form-control" value="Entrepreneur/Wirausaha" readonly>
                            @else
                                <input type="text" class="form-control" value="{{$data->PGP1}}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Apakah anda sudah mendaftar pekerjaan/S2 sebelum lulus?</label>
                        <div class="col-md-7">
                            @if($data->PGP2 == 1)
                                <input type="text" class="form-control" value="Ya" readonly>
                            @elseif($data->PGP2 == 2)
                                <input type="text" class="form-control" value="Tidak" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Jika ya perusahaan/sekolah apa saja tempat anda mendaftar</label>
                        <div class="col-md-7">
                            <textarea name="PGP3" class="form-control" rows="2" readonly>{{$data->PGP3}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Apakah anda sudah ditawari pekerjaan/S2 sebelum lulus?</label>
                        <div class="col-md-7">
                            @if($data->PGP4 == 1)
                                <input type="text" class="form-control" value="Ya" readonly>
                            @elseif($data->PGP4 == 2)
                                <input type="text" class="form-control" value="Tidak" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Jika ya perusahaan/sekolah apa saja yang menawari anda</label>
                        <div class="col-md-7">
                            <textarea name="PGP5" class="form-control" rows="2" readonly>{{$data->PGP5}}</textarea>
                        </div>
                    </div>
                    <h5>Pengalaman Tugas Akhir</h5>
                    <div class="form-group row">
                        <label class="col-5">Topik tugas akhir cocok dengan preferensi saya</label>
                        <div class="col-7">
                            @if($data->PTA1 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA1 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA1 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA1 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA1 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mengerjakan Tugas Akhir tepat waktu</label>
                        <div class="col-7">
                            @if($data->PTA2 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA2 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA2 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA2 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA2 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya berkomunikasi dengan pembimbing secara lancar</label>
                        <div class="col-7">
                            @if($data->PTA3 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA3 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA3 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA3 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA3 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Bimbingan yang diberikan berkualitas</label>
                        <div class="col-7">
                            @if($data->PTA4 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA4 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA4 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA4 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA4 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mengerjakan Tugas Akhir tepat waktu</label>
                        <div class="col-7">
                            @if($data->PTA5 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA5 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA5 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA5 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA5 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya tidak merasa kesulitan dalam Seminar Hasil</label>
                        <div class="col-7">
                            @if($data->PTA6 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA6 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA6 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA6 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA6 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya tidak merasa kesulitan dalam Ujian Sidang Pendadaran</label>
                        <div class="col-7">
                            @if($data->PTA7 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA7 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA7 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA7 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA7 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya puas dengan hasil Tugas Akhir saya</label>
                        <div class="col-7">
                            @if($data->PTA8 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA8 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA8 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA8 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA8 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya tidak merasa kesulitan dalam mengerjakan Tugas Akhir</label>
                        <div class="col-7">
                            @if($data->PTA9 == 1)
                                <input type="text" class="form-control" value="Sangat Tidak Setuju" readonly>
                            @elseif($data->PTA9 == 2)
                                <input type="text" class="form-control" value="Tidak Setuju" readonly>
                            @elseif($data->PTA9 == 3)
                                <input type="text" class="form-control" value="Netral" readonly>
                            @elseif($data->PTA9 == 4)
                                <input type="text" class="form-control" value="Setuju" readonly>
                            @elseif($data->PTA9 == 5)
                                <input type="text" class="form-control" value="Sangat Setuju" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saran untuk Prodi terkait pengalaman Tugas Akhir:</label>
                        <div class="col-md-7">
                            <textarea name="PTA10" class="form-control" rows="2" readonly>{{$data->PTA10}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{route('admin.exitsurvey.index')}}" class="btn btn-secondary btn-noborder btn-rounded ml-5">Kembali</a>
                            @if($data->acc_koorta == 0)
                            <form action="{{route('admin.exitsurvey.update', $data->mahasiswa_id)}}" method="POST" class="mb-5 float-left">
                            @method('PATCH')
                            @csrf
                                <button class="btn btn-success btn-noborder btn-rounded" type="Submit">Submit</button>
                            </form>
                            @endif
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
