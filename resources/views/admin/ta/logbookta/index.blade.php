@extends('layouts.backend')

@section('title','Log Book Tugas Akhir')

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
            <h3 class="block-title">Daftar Log Book Tugas Akhir Mahasiswa <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 20%;">Nama</th>
                    <th class="text-center" style="width: 15%;">Logbook Submitted</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Logbook Accepted</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Logbook Draft</th>
                    <th class="text-center" style="width: 5%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($ta as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{$no++}}</td>
                    <td class="font-size-sm text-center">
                        <div class="text-primary">{{ $row->nama_mhs}}</div>
                    </td>
                    <td class="text-center font-size-sm">
                        {{$row->logcount($row->mahasiswa_id)}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->accepted($row->mahasiswa_id)}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->draft($row->mahasiswa_id)}}
                    </td>
                    <td style="text-align: center;">
                        <a href="{{route('admin.logbookta.edit', $row->nim)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Details</a>
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
