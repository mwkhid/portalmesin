@extends('layouts.backend')

@section('title','Update Pembimbing')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pembimbing Kerja Praktek</h2>
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
                        <h3 class="block-title">Pembimbing Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content">
                        <form action="{{ route('admin.pembimbing.update', $data->id) }}" method="post">
                            @method('PATCH') 
                            @csrf
                            <h2 class="content-heading border-bottom mb-4 pb-2">Pembimbing</h2>
                                <div class="form-group row">
                                    <label class="col-12" for="example-select2">Pembimbing Kerja Praktek</label>
                                    <div class="col-lg-12">
                                        <select class="js-select2 form-control" id="example-select2" name="pem_kp" style="width: 100%;" data-placeholder="Choose one..">
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach ($dosen as $row)
                                                <option value="{{$row->id}}" {{$data->pem_kp == $row->id  ? 'selected' : ''}}>{{$row->nama_dosen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="Nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly="readonly">
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                                <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="text" class="form-control" name="sks" value="{{$data->sks}}" readonly="readonly">
                                    <div class="text-danger">{{ $errors->first('sks')}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="double" class="form-control" name="ipk" value="{{$data->ipk}}" readonly="readonly">
                                    @if($errors->has('ipk'))
                                        <div class="text-danger">
                                            {{ $errors->first('ipk')}}
                                        </div>
                                    @endif
                                </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-5">Update</button>
                                <a class="btn btn-warning mb-5" href="{{route('admin.pembimbing.index')}}">Back</a>
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
