@extends('layouts.backend')

@section('title','Tawaran Topik TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Tawaran Topik Tugas Akhir</h2>
    <form action="{{ route('dosen.tawaran.update', $data->id) }}" method="post">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Topik Tugas Akhir</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <input type="hidden" class="form-control" name="dosen_id" value="{{$data->dosen_id}}" hidden> 
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Jenis Topik</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="jenis_topik" value="{{$data->jenis_topik}}">
                            <span class="text-danger">{{ $errors->first('jenis_topik') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama Proyek</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama_proyek" value="{{$data->nama_proyek}}">
                            <span class="text-danger">{{ $errors->first('nama_proyek') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Judul Topik</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="judul_topik" name="judul_topik" rows="4" >{{$data->judul_topik}}</textarea>
                            <span class="text-danger">{{ $errors->first('judul_topik') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Penjelasan</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="penjelasan" name="penjelasan" rows="6">{{$data->penjelasan}}</textarea>
                            <span class="text-danger">{{ $errors->first('penjelasan') }}</span>
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Hardware & Software</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Hardware</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="hardware" name="hardware" rows="4" placeholder="Hardware yang digunakan">{{$data->hardware}}</textarea>
                            <span class="text-danger">{{ $errors->first('hardware') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Software</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="software" name="software" rows="4" placeholder="Software yang digunakan">{{$data->software}}</textarea>
                            <span class="text-danger">{{ $errors->first('software') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-warning mb-5">Update</button>
                            <a href="{{route('dosen.tawaran.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
