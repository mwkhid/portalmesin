@extends('layouts.backend')

@section('title','Persetujuan Draft')

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
            <h3 class="block-title">Daftar Persetujuan Draft <small>Teknik Elektro</small></h3>
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
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Waktu</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Hal Pengesahan</th>
                    <th class="text-center" style="width: 10%;">Action</th>
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
                    {{$row->tanggal}}, jam {{date("H.i", strtotime($row->jam_mulai))}}
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                    @if($row->pem == 1)
                        @if(($row->statusHalpengesahan($row->mahasiswa_id)->pluck('PB1')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    @else
                        @if(($row->statusHalpengesahan($row->mahasiswa_id)->pluck('PB2')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    @endif
                    </td>
                    <td style="text-align: center;">
                        <a href="{{route('dosen.persetujuandraft.show', $row->ta_id)}}" class="btn btn-sm btn-alt-info btn-noborder btn-rounded mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
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
                        {{$row->tanggal}}, jam {{date("H.i", strtotime($row->jam_mulai))}}
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                    @if($row->penguji_ke == 1)
                        @if(($row->statusHalpengesahan($row->mahasiswa_id)->pluck('PJ1')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    @else
                        @if(($row->statusHalpengesahan($row->mahasiswa_id)->pluck('PJ2')->last() ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    @endif
                    </td>
                    <td style="text-align: center;">
                        <a href="{{route('dosen.draftpenguji.show', $row->ta_id)}}" class="btn btn-sm btn-alt-info btn-noborder btn-rounded mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
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