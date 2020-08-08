@extends('layouts.backend')

@section('title','Halaman Pengesahan')

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
            <h3 class="block-title">Daftar Halaman Pengesahan <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 30%;">Nama</th>
                    <th class="text-center" style="width: 10%;">Hal Pengesahan</th>
                    <th class="text-center" style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1 ?>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ $no++}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="font-w600 font-size-sm text-center">
                        @if(($row->statusHalpengesahan($row->mahasiswa_id)->pluck('koor_ta')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </td>
                    <td width="250" style="text-align: center;">
                        <a href="{{route('admin.halpengesahan.show', $row->mahasiswa_id)}}" class="btn btn-sm btn-alt-primary btn-noborder btn-rounded mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
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
