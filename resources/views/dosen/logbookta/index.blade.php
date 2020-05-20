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
            <!-- <p align="right"><a href="{{route('dosen.logbookta.create')}}" class="btn btn-primary">Buat Log Book</a></p> -->
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 15%;">Nama</th>
                    <th class="text-center" style="width: 30%;">Kegiatan</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 17%;">Hubungan Bab</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Kendala</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Rencana</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $key+1}}</td>
                    <td class="font-size-sm text-center">
                        <a href="{{route('dosen.logbookta.show', $row->mahasiswa_id)}}">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="text-justify font-size-sm">
                        {{$row->kegiatan}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        @if($row->bab == 1)
                            BAB 1 PENDAHULUAN
                        @elseif($row->bab == 2)
                            BAB 2 TINJAUAN PUSTAKA
                        @elseif($row->bab == 3)
                            BAB 3 METODOLOGI (JALANNYA PENELITIAN)
                        @elseif($row->bab == 4)
                            BAB 4 HASIL DAN PEMBAHASAN
                        @elseif($row->bab == 5)
                            BAB 5 KESIMPULAN
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->kendala}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->rencana}}
                    </td>
                    <td style="text-align: center;">
                        @if($row->pem == 1)
                        <label class="css-control css-control-sm css-control-success css-switch">
                            <input type="checkbox" data-id="{{ $row->id }}" id="status_logbook1"  name="status_logbook1" class="css-control-input status_logbook1" {{ $row->status_logbook1 == 1 ? 'checked' : '' }}>
                            <span class="css-control-indicator"></span>
                        </label>
                        @else
                        <label class="css-control css-control-sm css-control-success css-switch">
                            <input type="checkbox" data-id="{{ $row->id }}" id="status_logbook2"  name="status_logbook2" class="css-control-input status_logbook2" {{ $row->status_logbook2 == 1 ? 'checked' : '' }}>
                            <span class="css-control-indicator"></span>
                        </label>
                        @endif
                        <a href="{{route('dosen.logbookta.edit', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Komentar"><i class="fa fa-edit"></i></a>
                        <!-- <a href="{{route('dosen.logbookta.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i></a> -->
                        <!-- <a href="{{route('dosen.logbookta.destroy', $row->id)}}" class="btn btn-sm btn-alt-danger mr-5 mb-5"><i class="fa fa-trash"></i></a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
<!-- END Dynamic Table with Export Buttons -->
</div>
<!-- Bootstrap Toasts -->
<div style="position: fixed; top: 3rem; right: 3rem; z-index: 9999999;">
    <!-- Toast Example 1 -->
    <div id="toast-example-1" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="si si-bubble text-primary mr-2"></i>
            <strong class="mr-auto">Title</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            This is a nice notification based on Bootstrap implementation.
        </div>
    </div>
    <!-- END Toast Example 1 -->

    <!-- Toast Example 2 -->
    <div id="toast-example-2" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="si si-wrench text-danger mr-2"></i>
            <strong class="mr-auto">System</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Log book telah direview.
        </div>
    </div>
    <!-- END Toast Example 2 -->
</div>
<!-- END Bootstrap Toasts -->
@endsection
@section('js_after')
<script>
$(document).ready(function(){
    $('.status_logbook1').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let klaimId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('dosen.update.statuslog') }}',
            data: {'status': status, 'klaim_id': klaimId},
            success: function (data) {
                // console.log(data.message);
                $('#toast-example-2').toast('show');
            }
        });
    });
});
$(document).ready(function(){
    $('.status_logbook2').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let logId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('dosen.update.statuslog2') }}',
            data: {'status': status, 'log_id': logId},
            success: function (data) {
                // console.log(data.message);
                $('#toast-example-2').toast('show');
            }
        });
    });
});
</script>
@endsection
