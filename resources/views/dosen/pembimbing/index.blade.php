@extends('layouts.backend')

@section('title','Perubahan Judul Tugas Akhir')

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
            <h3 class="block-title">Daftar Perubahan Judul TA Mahasiswa <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                    <th class="text-center" style="width: 35%;">Nama</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Status</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status Pembimbing</th>
                    <th class="text-center" style="width: 15%;">Approval</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- {{$no=1}} -->
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $key+1}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">
                        <?php $status=$row->pembimbing_ke ?>
                        @if($status == '1')
                            <span class="badge badge-primary">Pembimbing 1</span>
                        @else
                            <span class="badge badge-info">Pembimbing 2</span>
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                        <?php $status=$row->id ?>
                        @if($status == $row->pembimbing_lama)
                            <span class="badge badge-info">Pembimbing Lama</span>
                        @else
                            <span class="badge badge-primary">Pembimbing Baru</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <?php $status=$row->id ?>
                        @if($status == $row->pembimbing_lama)
                            <?php $status=$row->status_pembimbing_lama ?>
                            @if($status == '1')
                                <span class="badge badge-success">DISETUJUI</span>
                            @elseif($status == '2')
                                <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @elseif($status == '0')
                                <span class="badge badge-danger">DITOLAK</span>
                            @endif
                        @else
                            <?php $status=$row->status_pembimbing_baru ?>
                            @if($status == '1')
                                <span class="badge badge-success">DISETUJUI</span>
                            @elseif($status == '2')
                                <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @elseif($status == '0')
                                <span class="badge badge-danger">DITOLAK</span>
                            @endif
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <?php $status=$row->id ?>
                        @if($status == $row->pembimbing_baru)
                        <a href="{{route('dosen.pembimbingta.show', $row->ta_id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
                        @else
                        <a href="{{route('dosen.pembimbingta.edit', $row->ta_id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
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
