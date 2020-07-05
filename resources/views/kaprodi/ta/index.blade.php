@extends('layouts.backend')

@section('title','List Tugas Akhir')

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
            <h3 class="block-title">Daftar Tugas Akhir Mahasiswa<small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                    <th class="text-center" style="width: 30%;">Nama</th>
                    <th class="text-center" style="width: 20%;">Judul</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Pembimbing</th>
                    <th class="text-center" style="width: 20%;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1?>
                @foreach ($data as $row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $no++}}</td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="{{route('kaprodi.tugasakhir.show', $row->nim)}}">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="font-size-sm text-center">
                        {{ $row->judul}}
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center font-w700 text-pulse">{{implode(" & \n",$row->pemta($row->id)->pluck('nama_dosen')->toArray())}}</td>
                    <td class="font-size-sm text-center">
                        <?php $status=$row->proses_ta ?>
                        @if($status == 6)
                            <span class="badge badge-danger">BATAL TA</span>
                        @elseif($status == 5)
                            <span class="badge badge-primary">LULUS - LENGKAP</span>
                        @elseif($status == 4)
                            <span class="badge badge-info">LULUS - REVISI</span>
                        @elseif($status == 3)
                            <span class="badge badge-success">AKTIF TA - BELUM PENDADARAN</span>
                        @elseif($status == 2)
                            <span class="badge badge-success">AKTIF TA - BELUM SEMHAS</span>
                        @elseif($status == 1)
                            <span class="badge badge-warning">CALON MAHASISWA TA</span>
                        @elseif($status == 0)
                            <span class="badge badge-danger">DITOLAK</span>
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
