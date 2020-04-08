@extends('layouts.backend')

@section('title','Pengajuan KP')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pendaftaran Kerja Praktek</h2>
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
                        <h3 class="block-title">Form Pengajuan KP</h3>
                    </div> -->
                    <div class="block-header block-header-default">
                        <h3 class="block-title" style="text-align: center; color: red;">Permohonan Kerja Praktek di Tolak!</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('kp.pendaftaran.update', $tolak->id) }}" method="post">
                            @method('PATCH') 
                            @csrf
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{$tolak->nama_mhs}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="Nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{$tolak->nim}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="status_kp" value="PENDING">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="kp_id" value="{{$tolak->id}}">
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                    <label for="sks">Jumlah SKS Lulus</label>
                                    <input type="number" class="form-control" name="sks" value="{{$tolak->sks}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="IPK">IPK</label>
                                    <input type="double" class="form-control" name="ipk" value="{{$tolak->ipk}}" readonly>
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Data Perusahaan</h2>
                                <div class="form-group">
                                    <label for="nama perusahaan">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_nama" value="{{$tolak->perusahaan_nama}}">
                                    @if($errors->has('perusahaan_nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="alamat perusahaan">Alamat Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_almt" value="{{$tolak->perusahaan_almt}}">
                                    @if($errors->has('perusahaan_almt'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_almt')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan_jenis" value="{{$tolak->perusahaan_jenis}}">
                                    @if($errors->has('perusahaan_jenis'))
                                        <div class="text-danger">
                                            {{ $errors->first('perusahaan_jenis')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="PIC">PIC</label>
                                    <input type="text" class="form-control" name="pic" value="{{$tolak->pic}}">
                                    @if($errors->has('pic'))
                                        <div class="text-danger">
                                            {{ $errors->first('pic')}}
                                        </div>
                                    @endif
                                </div>
                            <h2 class="content-heading border-bottom mb-4 pb-2">Tanggal Pelaksanaan</h2>
                                <div class="form-group">
                                    <label for="Tanggal Mulai">Tanggal Mulai KP</label>
                                    <input type="text" class="form-control bg-white" id="flatpickr" name="rencana_mulai_kp" value="{{$tolak->rencana_mulai_kp}}">
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Selesai">Tanggal Selesai KP</label>
                                    <input type="text" class="form-control bg-white" id="flatpickr" name="rencana_selesai_kp" value="{{$tolak->rencana_selesai_kp}}">
                                </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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
    <script>
        var example = flatpickr('#flatpickr',{
            dateFormat: 'Y-m-d'
        });
    </script>
@endsection