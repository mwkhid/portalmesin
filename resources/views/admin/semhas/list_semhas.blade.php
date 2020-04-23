@extends('layouts.backend')

@section('title','List Pendaftaran Seminar Hasil')

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
            <h3 class="block-title">Daftar Seminar Hasil Tugas Akhir <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 35%;">Nama</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 37%;">Judul</th>
                    <th class="text-center" style="width: 10%;">Status Semhas</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ $key+1}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">
                        {{ $row->judul}}
                    </td>
                    <td class="font-size-sm text-center">
                        <?php $status=$row->status_seminar ?>
                        @if($status == 'SETUJU')
                            <span class="badge badge-success">{{$row->status_seminar}}</span>
                        @elseif($status == 'PENDING')
                            <span class="badge badge-warning">{{$row->status_seminar}}</span>
                        @elseif($status == 'TOLAK')
                            <span class="badge badge-danger">{{$row->status_seminar}}</span>
                        @endif
                    </td>
                    <td width="250" style="text-align: center;">
                        <!-- <a href="{{route('admin.semhas.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i></a> -->
                        <a href="{{route('admin.semhas.edit', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
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
