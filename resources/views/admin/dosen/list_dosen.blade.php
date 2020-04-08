@extends('layouts.backend')

@section('title','List Dosen')

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
            <h3 class="block-title">Daftar Dosen <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <p align="right"><a href="{{route('admin.dosen.create')}}" class="btn btn-primary">Tambah Dosen</a></p>
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 7%">Kode Dosen</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">NIP</th>
                    <th class="text-center" style="width: 45%;">Nama</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1?>
                @foreach ($data as $row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $no++}}</td>
                    <td class="text-center font-size-sm text-center">{{ $row->kode_dosen}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nip}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_dosen}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">
                        <?php $status_dosen=$row->status_dosen ?>
                        @if($status_dosen == 'AKTIF')
                            <span class="badge badge-success">{{$row->status_dosen}}</span>
                        @elseif($status_dosen == 'INAKTIF')
                            <span class="badge badge-danger">{{$row->status_dosen}}</span>
                        @endif
                    </td>
                    <td width="250" style="text-align: center;">
                        <a href="{{route('admin.dosen.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.dosen.edit', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbarui"><i class="fa fa-edit"></i></a>
                        <!-- <a href="" class="btn btn-sm btn-alt-danger mr-5 mb-5"><i class="fa fa-trash"></i></a> -->
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
