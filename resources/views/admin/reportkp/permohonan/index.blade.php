@extends('layouts.backend')

@section('title','Report Permohonan KP')

@section('content')
<div class="content">
<!-- Dynamic Table with Export Buttons -->
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Report Permohonan Kerja Praktek <small>Teknik Mesin</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%;">NIM</th>
                    <th class="text-center" style="width: 30%;">Nama</th>
                    <th class="text-center" style="width: 30%;">Perusahaan</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status KP</th>
                    <th class="text-center" style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $key+1}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="font-size-sm text-center">
                        {{ $row->perusahaan_nama}}
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">
                        @if($row->status_kp == 'PENDING' )
                            <span class="badge badge-info">{{$row->status_kp}}</span>
                        @elseif($row->status_kp == 'WAITING')
                            <span class="badge badge-warning">{{$row->status_kp}}</span>
                        @elseif($row->status_kp == 'SETUJU')
                            <span class="badge badge-success">{{$row->status_kp}}</span>
                        @elseif($row->status_kp == 'TOLAK')
                            <span class="badge badge-danger">{{$row->status_kp}}</span>
                        @elseif($row->status_kp == 'EDIT')
                            <span class="badge badge-danger">{{$row->status_kp}}</span>
                        @endif
                    </td>
                    <td width="250" style="text-align: center;">
                        <a href="{{ route('admin.reportpermohonan.show', $row->id)}}" class="btn btn-sm btn-alt-secondary mr-5 mb-5" target="_blank"><i class="fa fa-eye"></i> Lihat Surat Permohonan</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
<!-- END Dynamic Table with Export Buttons -->
</div>
@endsection
