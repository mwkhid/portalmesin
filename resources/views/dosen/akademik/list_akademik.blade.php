@extends('layouts.backend')

@section('title','Bimbingan Akademik')

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
            <h3 class="block-title">Daftar Bimbingan Akademik Mahasiswa <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                    <th class="text-center" style="width: 10%;">IPK</th>
                    <th class="text-center" style="width: 50%;">Nama</th>
                    <th class="text-center" style="width: 30%;">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- {{$no=1}} -->
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $key+1}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        {{ $row->ipk}}
                    </td>
                    <td class="font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td width="250" style="text-align: center;">
                        <?php $status=$row->status_mhs ?>
                        @if($status == 'AKTIF')
                            <span class="badge badge-success">{{$row->status_mhs}}</span>
                        @elseif($status == 'LULUS')
                            <span class="badge badge-primary">{{$row->status_mhs}}</span>
                        @elseif($status == 'HILANG')
                            <span class="badge badge-warning">{{$row->status_mhs}}</span>
                        @elseif($status == 'UNDUR DIRI')
                            <span class="badge badge-danger">{{$row->status_mhs}}</span>
                        @endif
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
