@extends('layouts.backend')

@section('title','Pengajuan Kerja Pratek')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pengajuan Kerja Praktek</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Riwayat Pendaftaran KP</h3>
                </div>
                <div class="block">
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                                    <th class="text-center" style="width: 30%;">Perusahaan</th>
                                    <th class="text-center" style="width: 30%;">Alamat</th>
                                    <th class="text-center" style="width: 27%;">Jenis Usaha</th>
                                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status KP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayatkp as $key=>$row)
                                <tr>
                                    <td class="d-none d-sm-table-cell text-center">{{$key+1}}</td>
                                    <td class="d-none d-sm-table-cell text-center">{{$row->perusahaan_nama}}</td>
                                    <td class="d-none d-sm-table-cell text-center">{{$row->perusahaan_almt}}</td>
                                    <td class="d-none d-sm-table-cell text-center">{{$row->perusahaan_jenis}}</td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        @if($row->status_kp == 'PENDING' )
                                            <span class="badge badge-info">{{$row->status_kp}}</span>
                                        @elseif($row->status_kp == 'WAITING')
                                            <span class="badge badge-warning">{{$row->status_kp}}</span>
                                        @elseif($row->status_kp == 'SETUJU')
                                            <span class="badge badge-success">{{$row->status_kp}}</span>
                                        @elseif($row->status_kp == 'TOLAK')
                                            <span class="badge badge-danger">{{$row->status_kp}}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.pengajuan.update', $data->id) }}" method="post">
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
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" class="form-control" name="sks" value="{{ $data->sks}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" class="form-control" name="ipk" value="{{ $data->ipk}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Perusahaan</h2>
                            <div class="form-group">
                                <label for="nama perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_nama" value="{{ $data->perusahaan_nama}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="alamat perusahaan">Alamat Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_almt" value="{{ $data->perusahaan_almt}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_jenis" value="{{ $data->perusahaan_jenis}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="PIC">PIC</label>
                                <input type="text" class="form-control" name="pic" value="{{ $data->pic}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Tanggal Pelaksanaan</h2>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Dimulai KP</label>
                                <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="tgl_mulai_kp" value="{{date("d-m-Y",strtotime($data->rencana_mulai_kp)) }}" readonly="readonly">
                            </div>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Selesai KP</label>
                                <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="tgl_selesai_kp" value="{{date("d-m-Y",strtotime($data->rencana_selesai_kp)) }}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                @if($data->status_kp == 'PENDING')
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mr-5 mb-5">Setuju</button>
                                @endif
                                <button type="submit" name="action" value="tolak" class="btn btn-danger mr-5 mb-5">Belum Setuju</button>
                                <a href="{{route('admin.pengajuan.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
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

