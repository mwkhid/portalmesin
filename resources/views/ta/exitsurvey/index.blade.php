@extends('layouts.backend')

@section('title','Exit Survey Mahasiswa')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Exit Survey Mahasiswa</h2>
    <form action="{{route('ta.exitsurvey.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <input type="hidden" class="form-control" name="mahasiswa_id" value="{{$data->mahasiswa_id}}">
                    <div class="form-group row">
                        <label class="col-3">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly>
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
                            <input required type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Masukkan Email">
                            <div class="text-danger">{{ $errors->first('email')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Link Sosial Media</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="sosmed" value="{{old('sosmed')}}" placeholder="Masukkan Link Sosial Media">
                            <div class="text-danger">{{ $errors->first('sosmed')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Link Linkedin</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="linkedin" value="{{old('linkedin')}}" placeholder="Masukkan Link Linkedin">
                            <div class="text-danger">{{ $errors->first('linkedin')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Alamat Rumah <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan Alamat Rumah">{{old('alamat')}}</textarea>
                            <div class="text-danger">{{ $errors->first('alamat')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">No Telephon (Hp) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="no_hp" value="{{old('no_hp')}}" placeholder="Masukkan No Telp Hp">
                            <div class="text-danger">{{ $errors->first('no_hp')}}</div>
                        </div>
                    </div>
                    <h5>Pengalaman Belajar</h5>
                    <div class="form-group row">
                        <label class="col-5">Orientasi/Adaptasi Perkuliahan</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB1" id="PB1R1" value="1">
                                <label class="custom-control-label" for="PB1R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB1" id="PB1R2" value="2">
                                <label class="custom-control-label" for="PB1R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB1" id="PB1R3" value="3">
                                <label class="custom-control-label" for="PB1R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB1" id="PB1R4" value="4">
                                <label class="custom-control-label" for="PB1R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB1" id="PB1R5" value="5">
                                <label class="custom-control-label" for="PB1R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB1')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Susunan Kurikulum</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB2" id="PB2R1" value="1">
                                <label class="custom-control-label" for="PB2R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB2" id="PB2R2" value="2">
                                <label class="custom-control-label" for="PB2R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB2" id="PB2R3" value="3">
                                <label class="custom-control-label" for="PB2R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB2" id="PB2R4" value="4">
                                <label class="custom-control-label" for="PB2R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB2" id="PB2R5" value="5">
                                <label class="custom-control-label" for="PB2R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB2')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kelengkapan dan Availabilitas Mata Kuliah</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB3" id="PB3R1" value="1">
                                <label class="custom-control-label" for="PB3R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB3" id="PB3R2" value="2">
                                <label class="custom-control-label" for="PB3R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB3" id="PB3R3" value="3">
                                <label class="custom-control-label" for="PB3R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB3" id="PB3R4" value="4">
                                <label class="custom-control-label" for="PB3R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB3" id="PB3R5" value="5">
                                <label class="custom-control-label" for="PB3R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB3')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kebebasan/Fleksibilitas dalam mengambil Mata Kuliah</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB4" id="PB4R1" value="1">
                                <label class="custom-control-label" for="PB4R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB4" id="PB4R2" value="2">
                                <label class="custom-control-label" for="PB4R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB4" id="PB4R3" value="3">
                                <label class="custom-control-label" for="PB4R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB4" id="PB4R4" value="4">
                                <label class="custom-control-label" for="PB4R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB4" id="PB4R5" value="5">
                                <label class="custom-control-label" for="PB4R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB4')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kelengkapan Prasarana Kuliah</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB5" id="PB5R1" value="1">
                                <label class="custom-control-label" for="PB5R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB5" id="PB5R2" value="2">
                                <label class="custom-control-label" for="PB5R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB5" id="PB5R3" value="3">
                                <label class="custom-control-label" for="PB5R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB5" id="PB5R4" value="4">
                                <label class="custom-control-label" for="PB5R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB5" id="PB5R5" value="5">
                                <label class="custom-control-label" for="PB5R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB5')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Pengajaran Dosen di Kelas</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB6" id="PB6R1" value="1">
                                <label class="custom-control-label" for="PB6R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB6" id="PB6R2" value="2">
                                <label class="custom-control-label" for="PB6R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB6" id="PB6R3" value="3">
                                <label class="custom-control-label" for="PB6R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB6" id="PB6R4" value="4">
                                <label class="custom-control-label" for="PB6R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB6" id="PB6R5" value="5">
                                <label class="custom-control-label" for="PB6R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB6')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Konsultasi Pengajaran Dosen di Luar Kelas</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB7" id="PB7R1" value="1">
                                <label class="custom-control-label" for="PB7R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB7" id="PB7R2" value="2">
                                <label class="custom-control-label" for="PB7R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB7" id="PB7R3" value="3">
                                <label class="custom-control-label" for="PB7R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB7" id="PB7R4" value="4">
                                <label class="custom-control-label" for="PB7R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB7" id="PB7R5" value="5">
                                <label class="custom-control-label" for="PB7R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB7')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Soal UTS/UAS di perkuliahan</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB8" id="PB8R1" value="1">
                                <label class="custom-control-label" for="PB8R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB8" id="PB8R2" value="2">
                                <label class="custom-control-label" for="PB8R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB8" id="PB8R3" value="3">
                                <label class="custom-control-label" for="PB8R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB8" id="PB8R4" value="4">
                                <label class="custom-control-label" for="PB8R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB8" id="PB8R5" value="5">
                                <label class="custom-control-label" for="PB8R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB8')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Tugas/Proyek di perkuliahan</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB9" id="PB9R1" value="1">
                                <label class="custom-control-label" for="PB9R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB9" id="PB9R2" value="2">
                                <label class="custom-control-label" for="PB9R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB9" id="PB9R3" value="3">
                                <label class="custom-control-label" for="PB9R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB9" id="PB9R4" value="4">
                                <label class="custom-control-label" for="PB9R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB9" id="PB9R5" value="5">
                                <label class="custom-control-label" for="PB9R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB9')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Laboratorium</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB10" id="PB10R1" value="1">
                                <label class="custom-control-label" for="PB10R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB10" id="PB10R2" value="2">
                                <label class="custom-control-label" for="PB10R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB10" id="PB10R3" value="3">
                                <label class="custom-control-label" for="PB10R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB10" id="PB10R4" value="4">
                                <label class="custom-control-label" for="PB10R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB10" id="PB10R5" value="5">
                                <label class="custom-control-label" for="PB10R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB10')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Praktikum</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB11" id="PB11R1" value="1">
                                <label class="custom-control-label" for="PB11R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB11" id="PB11R2" value="2">
                                <label class="custom-control-label" for="PB11R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB11" id="PB11R3" value="3">
                                <label class="custom-control-label" for="PB11R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB11" id="PB11R4" value="4">
                                <label class="custom-control-label" for="PB11R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB11" id="PB11R5" value="5">
                                <label class="custom-control-label" for="PB11R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB11')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kelengkapan Peralatan Laboratorium</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB12" id="PB12R1" value="1">
                                <label class="custom-control-label" for="PB12R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB12" id="PB12R2" value="2">
                                <label class="custom-control-label" for="PB12R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB12" id="PB12R3" value="3">
                                <label class="custom-control-label" for="PB12R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB12" id="PB12R4" value="4">
                                <label class="custom-control-label" for="PB12R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB12" id="PB12R5" value="5">
                                <label class="custom-control-label" for="PB12R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB12')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Kualitas Asisten Praktikum/Laboratorium</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB13" id="PB13R1" value="1">
                                <label class="custom-control-label" for="PB13R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB13" id="PB13R2" value="2">
                                <label class="custom-control-label" for="PB13R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB13" id="PB13R3" value="3">
                                <label class="custom-control-label" for="PB13R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB13" id="PB13R4" value="4">
                                <label class="custom-control-label" for="PB13R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB13" id="PB13R5" value="5">
                                <label class="custom-control-label" for="PB13R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB13')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Bimbingan Akademik (PA)</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB14" id="PB14R1" value="1">
                                <label class="custom-control-label" for="PB14R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB14" id="PB14R2" value="2">
                                <label class="custom-control-label" for="PB14R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB14" id="PB14R3" value="3">
                                <label class="custom-control-label" for="PB14R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB14" id="PB14R4" value="4">
                                <label class="custom-control-label" for="PB14R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB14" id="PB14R5" value="5">
                                <label class="custom-control-label" for="PB14R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB14')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Administrasi Prodi</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB15" id="PB15R1" value="1">
                                <label class="custom-control-label" for="PB15R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB15" id="PB15R2" value="2">
                                <label class="custom-control-label" for="PB15R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB15" id="PB15R3" value="3">
                                <label class="custom-control-label" for="PB15R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB15" id="PB15R4" value="4">
                                <label class="custom-control-label" for="PB15R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB15" id="PB15R5" value="5">
                                <label class="custom-control-label" for="PB15R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB15')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Administrasi Kerja Praktek/Internship</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB16" id="PB16R1" value="1">
                                <label class="custom-control-label" for="PB16R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB16" id="PB16R2" value="2">
                                <label class="custom-control-label" for="PB16R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB16" id="PB16R3" value="3">
                                <label class="custom-control-label" for="PB16R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB16" id="PB16R4" value="4">
                                <label class="custom-control-label" for="PB16R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB16" id="PB16R5" value="5">
                                <label class="custom-control-label" for="PB16R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB16')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Bimbingan Kerja Praktek/Internship</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB17" id="PB17R1" value="1">
                                <label class="custom-control-label" for="PB17R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB17" id="PB17R2" value="2">
                                <label class="custom-control-label" for="PB17R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB17" id="PB17R3" value="3">
                                <label class="custom-control-label" for="PB17R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB17" id="PB17R4" value="4">
                                <label class="custom-control-label" for="PB17R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB17" id="PB17R5" value="5">
                                <label class="custom-control-label" for="PB17R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB17')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Administrasi Tugas Akhir </label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB18" id="PB18R1" value="1">
                                <label class="custom-control-label" for="PB18R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB18" id="PB18R2" value="2">
                                <label class="custom-control-label" for="PB18R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB18" id="PB18R3" value="3">
                                <label class="custom-control-label" for="PB18R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB18" id="PB18R4" value="4">
                                <label class="custom-control-label" for="PB18R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB18" id="PB18R5" value="5">
                                <label class="custom-control-label" for="PB18R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB18')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Layanan Bimbingan Tugas Akhir</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB19" id="PB19R1" value="1">
                                <label class="custom-control-label" for="PB19R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB19" id="PB19R2" value="2">
                                <label class="custom-control-label" for="PB19R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB19" id="PB19R3" value="3">
                                <label class="custom-control-label" for="PB19R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB19" id="PB19R4" value="4">
                                <label class="custom-control-label" for="PB19R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB19" id="PB19R5" value="5">
                                <label class="custom-control-label" for="PB19R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB19')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Keterlibatan Mahasiswa dalam Penelitian</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB20" id="PB20R1" value="1">
                                <label class="custom-control-label" for="PB20R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB20" id="PB20R2" value="2">
                                <label class="custom-control-label" for="PB20R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB20" id="PB20R3" value="3">
                                <label class="custom-control-label" for="PB20R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB20" id="PB20R4" value="4">
                                <label class="custom-control-label" for="PB20R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB20" id="PB20R5" value="5">
                                <label class="custom-control-label" for="PB20R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB20')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Keterlibatan Mahasiswa dalam Pengabdian Masyarakat</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB21" id="PB21R1" value="1">
                                <label class="custom-control-label" for="PB21R1">Sangat Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB21" id="PB21R2" value="2">
                                <label class="custom-control-label" for="PB21R2">Kurang</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB21" id="PB21R3" value="3">
                                <label class="custom-control-label" for="PB21R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB21" id="PB21R4" value="4">
                                <label class="custom-control-label" for="PB21R4">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PB21" id="PB21R5" value="5">
                                <label class="custom-control-label" for="PB21R5">Sangat Baik</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PB21')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saran untuk Prodi terkait pengalaman belajar/kurikulum:</label>
                        <div class="col-7">
                            <textarea required name="PB22" class="form-control" rows="2">{{old('PB22')}}</textarea>
                        </div>
                    </div>
                    <h5>Engineering outcome/Luaran Pembelajaran</h5>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu menerapkan pengetahuan matematika, ilmu pengetahuan alam dan/atau material, teknologi informasi dan keteknikan untuk mendapatkan pemahaman menyeluruh tentang prinsip-prinsip teknik elektro.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP1" id="LP1R1" value="1">
                                <label class="custom-control-label" for="LP1R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP1" id="LP1R2" value="2">
                                <label class="custom-control-label" for="LP1R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP1" id="LP1R3" value="3">
                                <label class="custom-control-label" for="LP1R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP1" id="LP1R4" value="4">
                                <label class="custom-control-label" for="LP1R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP1" id="LP1R5" value="5">
                                <label class="custom-control-label" for="LP1R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP1')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu mendesain komponen, system dan/atau proses untuk memenuhi kebutuhan yang diharapkan didalam batasan-batasan realistis dalam bidang teknik Elektro.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP2" id="LP2R1" value="1">
                                <label class="custom-control-label" for="LP2R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP2" id="LP2R2" value="2">
                                <label class="custom-control-label" for="LP2R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP2" id="LP2R3" value="3">
                                <label class="custom-control-label" for="LP2R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP2" id="LP2R4" value="4">
                                <label class="custom-control-label" for="LP2R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP2" id="LP2R5" value="5">
                                <label class="custom-control-label" for="LP2R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP2')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu mendesain dan melaksanakan eksperimen laboratorium dan/atau lapangan serta menganalisis dan mengartikan data untuk memperkuat penilaian teknik.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP3" id="LP3R1" value="1">
                                <label class="custom-control-label" for="LP3R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP3" id="LP3R2" value="2">
                                <label class="custom-control-label" for="LP3R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP3" id="LP3R3" value="3">
                                <label class="custom-control-label" for="LP3R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP3" id="LP3R4" value="4">
                                <label class="custom-control-label" for="LP3R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP3" id="LP3R5" value="5">
                                <label class="custom-control-label" for="LP3R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP3')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu mengidentifikasi, merumuskan, menganalisis dan menyelesaikan permasalahan Teknik elektro.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP4" id="LP4R1" value="1">
                                <label class="custom-control-label" for="LP4R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP4" id="LP4R2" value="2">
                                <label class="custom-control-label" for="LP4R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP4" id="LP4R3" value="3">
                                <label class="custom-control-label" for="LP4R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP4" id="LP4R4" value="4">
                                <label class="custom-control-label" for="LP4R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP4" id="LP4R5" value="5">
                                <label class="custom-control-label" for="LP4R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP4')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu menerapkan metode, keterampilan dan piranti teknik elektro yang modern yang diperlukan untuk praktek keteknikan.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP5" id="LP5R1" value="1">
                                <label class="custom-control-label" for="LP5R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP5" id="LP5R2" value="2">
                                <label class="custom-control-label" for="LP5R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP5" id="LP5R3" value="3">
                                <label class="custom-control-label" for="LP5R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP5" id="LP5R4" value="4">
                                <label class="custom-control-label" for="LP5R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP5" id="LP5R5" value="5">
                                <label class="custom-control-label" for="LP5R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP5')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu berkomunikasi secara efektif baik lisan maupun tulisan.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP6" id="LP6R1" value="1">
                                <label class="custom-control-label" for="LP6R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP6" id="LP6R2" value="2">
                                <label class="custom-control-label" for="LP6R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP6" id="LP6R3" value="3">
                                <label class="custom-control-label" for="LP6R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP6" id="LP6R4" value="4">
                                <label class="custom-control-label" for="LP6R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP6" id="LP6R5" value="5">
                                <label class="custom-control-label" for="LP6R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP6')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu merencanakan, menyelesaikan dan mengevaluasi tugas didalam batasan-batasan yang ada.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP7" id="LP7R1" value="1">
                                <label class="custom-control-label" for="LP7R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP7" id="LP7R2" value="2">
                                <label class="custom-control-label" for="LP7R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP7" id="LP7R3" value="3">
                                <label class="custom-control-label" for="LP7R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP7" id="LP7R4" value="4">
                                <label class="custom-control-label" for="LP7R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP7" id="LP7R5" value="5">
                                <label class="custom-control-label" for="LP7R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP7')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu bekerja dalam tim lintas disiplin dan lintas budaya.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP8" id="LP8R1" value="1">
                                <label class="custom-control-label" for="LP8R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP8" id="LP8R2" value="2">
                                <label class="custom-control-label" for="LP8R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP8" id="LP8R3" value="3">
                                <label class="custom-control-label" for="LP8R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP8" id="LP8R4" value="4">
                                <label class="custom-control-label" for="LP8R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP8" id="LP8R5" value="5">
                                <label class="custom-control-label" for="LP8R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP8')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu bertanggung jawab kepada masyarakat dan mematuhi etika profesi dalam menyelesaikan permasalahan Teknik elektro.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP9" id="LP9R1" value="1">
                                <label class="custom-control-label" for="LP9R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP9" id="LP9R2" value="2">
                                <label class="custom-control-label" for="LP9R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP9" id="LP9R3" value="3">
                                <label class="custom-control-label" for="LP9R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP9" id="LP9R4" value="4">
                                <label class="custom-control-label" for="LP9R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP9" id="LP9R5" value="5">
                                <label class="custom-control-label" for="LP9R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP9')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mampu memahami kebutuhan akan pembelajaran sepanjang hayat, termasuk akses terhadap pengetahuan terkait isu-isuke kinian yang relevan.</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP10" id="LP10R1" value="1">
                                <label class="custom-control-label" for="LP10R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP10" id="LP10R2" value="2">
                                <label class="custom-control-label" for="LP10R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP10" id="LP10R3" value="3">
                                <label class="custom-control-label" for="LP10R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP10" id="LP10R4" value="4">
                                <label class="custom-control-label" for="LP10R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="LP10" id="LP10R5" value="5">
                                <label class="custom-control-label" for="LP10R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('LP10')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saran untuk Prodi terkait outcome/luaran pembelajaran:</label>
                        <div class="col-7">
                            <textarea required name="LP11" class="form-control" rows="2">{{old('LP11')}}</textarea>
                        </div>
                    </div>
                    <h5>Post Graduate Plan</h5>
                    <div class="form-group row">
                        <label class="col-5">Rancana bidang pekerjaan setelah lulus S1</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PGP1" id="PGP1R1" value="1">
                                <label class="custom-control-label" for="PGP1R1">Bidang Electrical Engineering</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PGP1" id="PGP1R2" value="2">
                                <label class="custom-control-label" for="PGP1R2">Manajemen Perusahaan</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PGP1" id="PGP1R3" value="3">
                                <label class="custom-control-label" for="PGP1R3">Peneliti (R&D)</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PGP1" id="PGP1R4" value="4">
                                <label class="custom-control-label" for="PGP1R4">Akademisi/Melanjutkan jenjang S2</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PGP1" id="PGP1R5" value="5">
                                <label class="custom-control-label" for="PGP1R5">Entrepreneur/Wiraurasaha</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PGP1" id="PGP1R6" value="">
                                <label class="custom-control-label" for="PGP1R6">Lainnya</label>
                                <input type="text" class="form-control" style="margin-left:10px;" id="other_PGP1" value="" onchange="changeradioother(this)" />
                            </div>
                            <div class="text-danger">{{ $errors->first('PGP1')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Apakah anda sudah mendaftar pekerjaan/S2 sebelum lulus?</label>
                        <div class="col-md-7">
                            <select required name="PGP2" class="js-select2 form-control">
                                <option value=""></option>
                                <option value="1" {{old('PGP2') == 1 ? 'selected' : ''}}>Ya</option>
                                <option value="2" {{old('PGP2') == 2 ? 'selected' : ''}}>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Jika ya perusahaan/sekolah apa saja tempat anda mendaftar</label>
                        <div class="col-md-7">
                            <textarea required name="PGP3" class="form-control" rows="2">{{old('PGP3')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Apakah anda sudah ditawari pekerjaan/S2 sebelum lulus?</label>
                        <div class="col-md-7">
                            <select required name="PGP4" class="js-select2 form-control">
                                <option value=""></option>
                                <option value="1" {{old('PGP4') == 1 ? 'selected' : ''}}>Ya</option>
                                <option value="2" {{old('PGP4') == 2 ? 'selected' : ''}}>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Jika ya perusahaan/sekolah apa saja yang menawari anda</label>
                        <div class="col-md-7">
                            <textarea required name="PGP5" class="form-control" rows="2">{{old('PGP5')}}</textarea>
                        </div>
                    </div>
                    <h5>Pengalaman Tugas Akhir</h5>
                    <div class="form-group row">
                        <label class="col-5">Topik tugas akhir cocok dengan preferensi saya</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA1" id="PTA1R1" value="1">
                                <label class="custom-control-label" for="PTA1R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA1" id="PTA1R2" value="2">
                                <label class="custom-control-label" for="PTA1R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA1" id="PTA1R3" value="3">
                                <label class="custom-control-label" for="PTA1R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA1" id="PTA1R4" value="4">
                                <label class="custom-control-label" for="PTA1R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA1" id="PTA1R5" value="5">
                                <label class="custom-control-label" for="PTA1R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA1')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mengerjakan Tugas Akhir tepat waktu</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA2" id="PTA2R1" value="1">
                                <label class="custom-control-label" for="PTA2R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA2" id="PTA2R2" value="2">
                                <label class="custom-control-label" for="PTA2R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA2" id="PTA2R3" value="3">
                                <label class="custom-control-label" for="PTA2R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA2" id="PTA2R4" value="4">
                                <label class="custom-control-label" for="PTA2R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA2" id="PTA2R5" value="5">
                                <label class="custom-control-label" for="PTA2R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA2')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya berkomunikasi dengan pembimbing secara lancar</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA3" id="PTA3R1" value="1">
                                <label class="custom-control-label" for="PTA3R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA3" id="PTA3R2" value="2">
                                <label class="custom-control-label" for="PTA3R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA3" id="PTA3R3" value="3">
                                <label class="custom-control-label" for="PTA3R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA3" id="PTA3R4" value="4">
                                <label class="custom-control-label" for="PTA3R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA3" id="PTA3R5" value="5">
                                <label class="custom-control-label" for="PTA3R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA3')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Bimbingan yang diberikan berkualitas</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA4" id="PTA4R1" value="1">
                                <label class="custom-control-label" for="PTA4R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA4" id="PTA4R2" value="2">
                                <label class="custom-control-label" for="PTA4R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA4" id="PTA4R3" value="3">
                                <label class="custom-control-label" for="PTA4R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA4" id="PTA4R4" value="4">
                                <label class="custom-control-label" for="PTA4R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA4" id="PTA4R5" value="5">
                                <label class="custom-control-label" for="PTA4R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA4')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya mengerjakan Tugas Akhir tepat waktu</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA5" id="PTA5R1" value="1">
                                <label class="custom-control-label" for="PTA5R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA5" id="PTA5R2" value="2">
                                <label class="custom-control-label" for="PTA5R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA5" id="PTA5R3" value="3">
                                <label class="custom-control-label" for="PTA5R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA5" id="PTA5R4" value="4">
                                <label class="custom-control-label" for="PTA5R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA5" id="PTA5R5" value="5">
                                <label class="custom-control-label" for="PTA5R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA5')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya tidak merasa kesulitan dalam Seminar Hasil</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA6" id="PTA6R1" value="1">
                                <label class="custom-control-label" for="PTA6R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA6" id="PTA6R2" value="2">
                                <label class="custom-control-label" for="PTA6R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA6" id="PTA6R3" value="3">
                                <label class="custom-control-label" for="PTA6R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA6" id="PTA6R4" value="4">
                                <label class="custom-control-label" for="PTA6R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA6" id="PTA6R5" value="5">
                                <label class="custom-control-label" for="PTA6R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA6')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya tidak merasa kesulitan dalam Ujian Sidang Pendadaran</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA7" id="PTA7R1" value="1">
                                <label class="custom-control-label" for="PTA7R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA7" id="PTA7R2" value="2">
                                <label class="custom-control-label" for="PTA7R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA7" id="PTA7R3" value="3">
                                <label class="custom-control-label" for="PTA7R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA7" id="PTA7R4" value="4">
                                <label class="custom-control-label" for="PTA7R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA7" id="PTA7R5" value="5">
                                <label class="custom-control-label" for="PTA7R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA7')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya puas dengan hasil Tugas Akhir saya</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA8" id="PTA8R1" value="1">
                                <label class="custom-control-label" for="PTA8R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA8" id="PTA8R2" value="2">
                                <label class="custom-control-label" for="PTA8R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA8" id="PTA8R3" value="3">
                                <label class="custom-control-label" for="PTA8R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA8" id="PTA8R4" value="4">
                                <label class="custom-control-label" for="PTA8R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA8" id="PTA8R5" value="5">
                                <label class="custom-control-label" for="PTA8R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA8')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saya tidak merasa kesulitan dalam mengerjakan Tugas Akhir</label>
                        <div class="col-7">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA9" id="PTA9R1" value="1">
                                <label class="custom-control-label" for="PTA9R1">Sangat Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA9" id="PTA9R2" value="2">
                                <label class="custom-control-label" for="PTA9R2">Tidak Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA9" id="PTA9R3" value="3">
                                <label class="custom-control-label" for="PTA9R3">Netral</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA9" id="PTA9R4" value="4">
                                <label class="custom-control-label" for="PTA9R4">Setuju</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="PTA9" id="PTA9R5" value="5">
                                <label class="custom-control-label" for="PTA9R5">Sangat Setuju</label>
                            </div>
                            <div class="text-danger">{{ $errors->first('PTA9')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-5">Saran untuk Prodi terkait pengalaman Tugas Akhir:</label>
                        <div class="col-md-7">
                            <textarea required name="PTA10" class="form-control" rows="2">{{old('PTA10')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="Submit">Submit</button>
                            <a href="{{route('ta.wisuda.index')}}" class="btn btn-secondary ml-5">Kembali</a>
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
<script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
<script>
function changeradioother(other) {
    document.getElementById("PGP1R6").value = other.value;
//   var other = document.getElementById("PGP1R6");
//   other.value = document.getElementById("other_PGP1").value;
}
</script>
@endsection