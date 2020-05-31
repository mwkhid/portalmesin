@extends('layouts.backend')

@section('title','LogBook Tugas Akhir')

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
            <h3 class="block-title">Daftar Log Book Tugas Akhir <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <p align="right"><a href="{{route('ta.logbook.show', $ta->mahasiswa_id)}}" class="btn btn-secondary mb-5 mr-5" target="_blank">Cetak Log Book</a>
            <a href="{{route('ta.logbook.create')}}" class="btn btn-primary mb-5">Buat Log Book</a></p>
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 15%;">Nama</th>
                    <th class="text-center" style="width: 30%;">Kegiatan</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 17%;">Hubungan Bab</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Kendala</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Rencana</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 5%;">Status Logbook</th>
                    <th class="text-center" style="width: 5%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $key+1}}</td>
                    <td class="font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="text-justify font-size-sm">
                        {{$row->kegiatan}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
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
                    <td class="d-none d-sm-table-cell text-center">
                        {{$row->kendala}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        {{$row->rencana}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($row->status_logbook1 == 1)
                            <span class="badge badge-success">Accepted</span>
                        @elseif($row->status_logbook1 == 2)
                            <span class="badge badge-warning">Submitted</span>
                        @elseif($row->status_logbook1 == 0)
                            <span class="badge badge-danger">Draf</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <!-- <a href="{{route('ta.logbook.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i></a> -->
                        @if($row->status_logbook1 == 0)
                        <a href="{{route('ta.logbook.edit', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" data-logid="{{$row->id}}" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-alt-danger"><i class="fa fa-trash"></i></a>
                        <!-- <a href="{{route('ta.logbook.destroy', $row->id)}}" class="btn btn-sm btn-alt-danger mr-5 mb-5"><i class="fa fa-trash"></i></a> -->
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
<!-- Top Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
    <form action="{{route('ta.logbook.destroy','delete')}}" method="post">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Delete Confirmation</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    @csrf
                    @method('DELETE')
                    <p class="text-center">Are You Sure Want To Delete ?</p>
                    <input type="hidden" name="log_id" id="log_id" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-alt-danger">
                    <i class="fa fa-check"></i> Yes, Delete
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
<!-- END Top Modal -->
@endsection
@section('js_after')
<script>
     $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var log_id = button.data('logid') 
      var modal = $(this)
      modal.find('.block-content #log_id').val(log_id);
})
</script>
@endsection
