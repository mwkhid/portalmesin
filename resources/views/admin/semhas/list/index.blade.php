@extends('layouts.backend')

@section('title','List Seminar Hasil Mahasiswa')

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
                    <th class="text-center" style="width: 25%;">Nama</th>
                    <th class="d-none d-sm-table-cell  text-center" style="width: 7%;">Tanggal</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Jam</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Tempat</th>
                    <th class="text-center" style="width: 10%;">Status Semhas</th>
                    <!-- <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Berkas</th> -->
                    <th class="text-center" style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ $key+1}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ $row->tanggal}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ date('H.i', strtotime($row->jam_mulai)) }} <br>-<br> {{ date('H.i', strtotime($row->jam_selesai)) }}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">{{ $row->nama_ruang}}</td>
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
                    <!-- <td class="font-size-sm text-center">
                        <span class="badge {{$row->cetak_semhas == 1 ? 'badge-primary' : 'badge-danger'}}">
                            {{$row->cetak_semhas == 1 ? 'Sudah Cetak' : 'Belum Cetak'}}
                        </span>
                    </td> -->
                    <td class="text-center font-size-sm">
                        <a href="{{route('admin.listsemhas.edit', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbarui"><i class="fa fa-edit"></i> Edit</a>
                        <a href="{{route('admin.listsemhas.show', $row->ta_id)}}" class="btn btn-sm btn-alt-secondary mr-5 mb-5" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak Berkas Seminar Hasil"><i class="fa fa-print"></i> Cetak</a>
                        <a href="{{route('admin.rekapsemhas.edit', $row->ta_id)}}" class="btn btn-sm btn-alt-danger mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rekap"><i class="fa fa-calculator"></i> Rekap</a>
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
