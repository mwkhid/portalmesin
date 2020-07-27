@extends('layouts.backend')

@section('title','Pendadaran Tugas Akhir')

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
            <h3 class="block-title">Daftar Pendadaran Mahasiswa <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-di">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 4%">Created</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                    <th class="text-center" style="width: 20%;">Nama</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status</th>
                    <!-- <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status Pendadaran</th> -->
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status Pembimbing</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Waktu</th>
                    <th class="text-center" style="width: 35%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $no++}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{$row['created_at']}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">
                        <?php $status=$row->pem ?>
                        @if($status == '1')
                            <span class="badge badge-primary">Pembimbing 1</span>
                        @else
                            <span class="badge badge-info">Pembimbing 2</span>
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                        <!--?php $status=$row->status_pendadaran ?-->
                        <?php $status=$row->status_pendadaranpem ?>
                        @if($status == 'SETUJU')
                            <span class="badge badge-success">SETUJU</span>
                        @elseif($status == 'PENDING')
                            <span class="badge badge-warning">PENDING</span>
                        @elseif($status == 'TOLAK')
                            <span class="badge badge-danger">DITOLAK</span>
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                    {{$row->tanggal}}, jam {{date("H.i", strtotime($row->jam_mulai))}}
                    </td>
                    <!-- <td style="text-align: center;">
                        <--?php $status=$row->status_pendadaranpem ?>
                        @if($status == 'SETUJU')
                            <span class="badge badge-success">DISETUJUI</span>
                        @elseif($status == 'PENDING')
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @elseif($status == 'TOLAK')
                            <span class="badge badge-danger">DITOLAK</span>
                        @endif
                    </td> -->
                    <td style="text-align: center;">
                        @if($row->status_pendadaran == 'SETUJU')
                        <a href="{{route('dosen.pendadaran.show', $row->ta_id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
                        <a href="{{route('dosen.undangan.pendadaran', $row->ta_id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" target="_blank"><i class="fa fa-print"></i> Undangan</a>
                        <a href="{{route('dosen.pembimbing_pendadaran.show', $row->ta_id)}}" class="btn btn-sm btn-alt-danger mr-5 mb-5"><i class="fa fa-edit"></i> Nilai</a>
                            @if($row->pem == 1)
                                <a href="{{route('dosen.rekap_pendadaran.edit', $row->ta_id)}}" class="btn btn-sm btn-alt-secondary mr-5 mb-5"><i class="fa fa-edit"></i> Rekap</a>
                            @endif
                        @else
                        <a href="{{route('dosen.pendadaran.edit', $row->ta_id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5"><i class="fa fa-edit"></i> Update</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @foreach ($data2 as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $no++}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{$row['created_at']}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-size-sm text-center">
                        <div class="text-primary">{{ $row->nama_mhs}}</div>
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">
                        <span class="badge badge-warning">Penguji</span>
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                        {{$row->tanggal}}, jam {{date("H.i", strtotime($row->jam_mulai))}}
                    </td>
                    <!-- <td style="text-align: center;">
                    </td> -->
                    <td style="text-align: center;">
                        <a href="{{route('dosen.undangan.pendadaran', $row->ta_id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" target="_blank"><i class="fa fa-print"></i> Undangan</a>
                        <a href="{{route('dosen.penguji_pendadaran.show', $row->ta_id)}}" class="btn btn-sm btn-alt-danger mr-5 mb-5"><i class="fa fa-edit"></i> Nilai</a>
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
@section('js_after')
<script>
$(document).ready(function() {
    $('.js-dataTable-di').DataTable({
        pageLength: 10,
        lengthMenu: [
            [5, 10, 20],
            [5, 10, 20]
        ],
        order: [[ 1, "desc" ]],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        autoWidth: !1
    });
} );
</script>
@endsection