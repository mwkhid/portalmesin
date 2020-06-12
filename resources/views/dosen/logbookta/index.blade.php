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
                    <th class="text-center" style="width: 20%;">Nama</th>
                    <th class="text-center" style="width: 15%;">Logbook Submitted</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Logbook Accepted</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Logbook Draft</th>
                    <th class="text-center" style="width: 5%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{$no++}}</td>
                    <td class="font-size-sm text-center">
                        <div class="text-primary">{{ $row->nama_mhs}}</div>
                    </td>
                    <td class="text-center font-size-sm">
                        {{$row->logcount($row->mahasiswa_id)}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->accepted1($row->mahasiswa_id)}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->draft1($row->mahasiswa_id)}}
                    </td>
                    <td style="text-align: center;">
                        <!-- @if($row->pem == 1)
                        <label class="css-control css-control-sm css-control-success css-switch">
                            <input type="checkbox" data-id="{{ $row->id }}" id="status_logbook1"  name="status_logbook1" class="css-control-input status_logbook1" {{ $row->status_logbook1 == 1 ? 'checked' : '' }}>
                            <span class="css-control-indicator"></span>
                        </label>
                        @else
                        <label class="css-control css-control-sm css-control-success css-switch">
                            <input type="checkbox" data-id="{{ $row->id }}" id="status_logbook2"  name="status_logbook2" class="css-control-input status_logbook2" {{ $row->status_logbook2 == 1 ? 'checked' : '' }}>
                            <span class="css-control-indicator"></span>
                        </label>
                        @endif -->
                        <a href="{{route('dosen.logbookta.details', $row->nim)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i> Details</a>
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
