@extends('layouts.backend')

@section('title','Tugas Akhir')

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
            <h3 class="block-title">Daftar Tawaran TA Mahasiswa <small>Teknik Mesin</small></h3>
        </div>
        <div class="block-content block-content-full">
        <div class="mb-10">
            <p align="right"><a href="{{route('dosen.tawaran.create')}}" class="btn btn-primary">Tambah Tawaran TA</a></p>
        </div>
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 25%;">Pemberi Topik</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Jenis Topik</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Nama Proyek</th>
                    <th class="text-center" style="width: 17%;">Judul Topik</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- {{$no=1}} -->
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $key+1}}</td>
                    <td class="font-size-sm text-center">
                        <a href="#">{{ $row->nama_dosen}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">
                        {{$row->jenis_topik}}
                    </td>
                    <td class="d-none d-sm-table-cell" style="text-align: center;">
                        {{$row->nama_proyek}}
                    </td>
                    <td style="text-align: center;">
                        {{$row->judul_topik}}
                    </td>
                    <td style="text-align: center;">
                        <a href="{{route('dosen.tawaran.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="{{route('dosen.tawaran.edit', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbarui"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" data-tawaranid="{{$row->id}}" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-alt-danger"><i class="fa fa-trash"></i></a>
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
    <form action="{{route('dosen.tawaran.destroy','delete')}}" method="post">
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
                    <input type="hidden" name="tawaran_id" id="tawaran_id" value="">
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
      var tawaran_id = button.data('tawaranid') 
      var modal = $(this)
      modal.find('.block-content #tawaran_id').val(tawaran_id);
})
</script>
@endsection