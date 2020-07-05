@extends('layouts.backend')

@section('title','List Mahasiswa')

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
            <h3 class="block-title">Daftar Mahasiswa <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-edited">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                    <th class="text-center" style="width: 20%;">Angkatan</th>
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
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="text-center font-size-sm text-center">{{ $row->angkatan}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">
                        <?php $status_mhs=$row->status_mhs ?>
                        <span class="badge
                        @if($status_mhs == 'AKTIF')
                            badge-success
                        @elseif($status_mhs == 'LULUS')
                            badge-primary
                        @elseif($status_mhs == 'HILANG')
                            badge-warning
                        @elseif($status_mhs == 'UNDUR DIRI')
                            badge-danger
                        @elseif($status_mhs == 'PINDAH')
                            badge-info
                        @elseif($status_mhs == 'DO')
                            badge-danger
                        @elseif($status_mhs == 'MENINGGAL DUNIA')
                            badge-secondary
                        @endif
                        ">{{$row->status_mhs}}</span>
                    </td>
                    <td width="250" style="text-align: center;">
                        <a href="{{route('kaprodi.listmahasiswa.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Lihat</a>
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
