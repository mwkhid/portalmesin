@extends('layouts.backend')

@section('title','Admin Pembimbing Akademik')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pembimbing Akademik</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <div class="block-content block-content-full">
                    <form action="{{ route('admin.akademik.update', $data->id) }}" method="post">
                            @method('PATCH') 
                            @csrf
                            <h2 class="content-heading border-bottom mb-4 pb-2">Pembimbing Akademik</h2>
                                <div class="form-group row">
                                    <label class="col-12" for="example-select2">Normal</label>
                                    <div class="col-lg-12">
                                        <select class="js-select2 form-control" id="example-select2" name="pem_akademik" style="width: 100%;" data-placeholder="Choose one..">
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach ($dosen as $row)
                                                <option value="{{$row->id}}" {{$data->pem_akademik == $row->id  ? 'selected' : ''}}>{{$row->nama_dosen}}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">{{ $errors->first('pem_akademik')}}</div>
                                    </div>
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Mahasiswa</h2>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="Nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="number" class="form-control" name="sks" value="{{$data->sks}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="double" class="form-control" name="ipk" value="{{$data->ipk}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="status dosen">Status Mahasiswa</label>
                                    <input type="text" class="form-control" name="status_mhs" value="{{ $data->status_mhs}}" readonly="readonly">
                                    <!-- <input type="text" class="form-control" name="status_dosen" > -->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-5">Update</button>
                                    <a href="{{route('admin.akademik.index')}}" class="btn btn-secondary mb-5">Kembali</a>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
@endsection
