@extends('layouts.backend')

@section('title','Admin Mahasiswa')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Mahasiswa</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.mahasiswa.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="kode dosen">NIM <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="nim" placeholder="NIM Mahasiswa">
                                <div class="text-danger">{{ $errors->first('nim')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Nip">Nama Mahasiswa <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="nama_mhs" placeholder="Nama Mahasiswa">
                                <div class="text-danger">{{ $errors->first('nama_mhs')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Angkatan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="angkatan" placeholder="Tahun Angkatan">
                                <div class="text-danger">{{ $errors->first('angkatan')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Sks <span class="text-danger">*</span></label>
                                <input required type="number" step="1" min="0" class="form-control" name="sks" placeholder="Total SKS yang dicapai">
                                <div class="text-danger">{{ $errors->first('sks')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">IPK <span class="text-danger">*</span></label>
                                <input required type="number" step="0.01" min="0" max="4" class="form-control" name="ipk" placeholder="IPK terakhir">
                                <div class="text-danger">{{ $errors->first('ipk')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="nama dosen">Pembimbing Akademik <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" name="pem_akademik" id="pem_akademik" data-live-search="true">
                                    <option value="">Pilih Pembimbing</option>
                                    @foreach($pembimbing as $pembimbings)
                                    <option name="status_mhs" value="{{$pembimbings->id}}">{{$pembimbings->nama_dosen}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">{{ $errors->first('pem_akademik')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="status dosen">Status Mahasiswa <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" name="status_mhs" id="status_mhs" data-live-search="true">
                                    <option value="">Pilih Status Mahasiswa</option>
                                    <option name="status_mhs" value="AKTIF">AKTIF</option>
                                    <option name="status_mhs" value="INAKTIF">TIDAK AKTIF</option>
                                    <option name="status_mhs" value="HILANG">HILANG</option>
                                    <option name="status_mhs" value="UNDUR DIRI">UNDUR DIRI</option>
                                </select>
                                <div class="text-danger">{{ $errors->first('status_mhs')}}</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.mahasiswa.index')}}" class="btn btn-warning">Back</a>
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
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr','select2']); });</script>
@endsection
