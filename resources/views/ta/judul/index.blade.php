@extends('layouts.backend')

@section('title','Perubahan Judul TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Perubahan Judul Tugas Akhir</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong>Success</strong> {{ session()->get('message') }}  
        </div>
    @endif
    <form action="{{route('ta.judul.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Daftar Pengajuan Perubahan Judul <small>Teknik Elektro</small></h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                            <th class="text-center" style="width: 35%;">Nama</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Judul Lama</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Judul Baru</th>
                            <th class="text-center" style="width: 10%;">Approval</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {{$no=1}} -->
                        @foreach ($listjudul as $key=>$row)
                        <tr>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $key+1}}</td>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $row->nim}}</td>
                            <td class="font-size-sm text-center">
                                <a href="#">{{ $row->nama_mhs}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">
                                {{$row->judul_lama}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">
                                {{$row->judul_baru}}
                            </td>
                            <td style="text-align: center;">
                                <?php $status=$row->status_judul ?>
                                @if($status == '1')
                                    <span class="badge badge-success">DISETUJUI</span>
                                @elseif($status == '2')
                                    <span class="badge badge-warning">BELUM DISETUJUI</span>
                                @elseif($status == '0')
                                    <span class="badge badge-danger">DITOLAK</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="nim">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="nama">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="sks">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="ta_id" value="{{$data->id}}" hidden>                        
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tugas Akhir</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="judullama">Judul Lama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="judul_lama" value="{{$data->judul}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="judulbaru">Judul Baru <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="judul" name="judul_baru" rows="4" placeholder="Masukkan judul baru">{{old('judul_baru')}}</textarea>
                            @if($errors->has('judul_baru'))
                                <span class="text-danger">
                                    {{ $errors->first('judul_baru')}}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="alasan">Alasan <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="alasan" name="judul_alasan" rows="6" placeholder="Alasan perubahan judul">{{old('judul_alasan')}}</textarea>
                            <span class="text-danger">{{ $errors->first('judul_alasan') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12"> 
                            <button type="submit" class="btn btn-primary mb-5">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
