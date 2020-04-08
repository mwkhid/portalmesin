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
            <p align="right">
                <a href="{{route('admin.mahasiswa.create')}}" class="btn btn-primary mb-5 mr-5">Tambah Mahasiswa</a>
                <a href="{{route('admin.importmhs')}}" class="btn btn-success mb-5 mr-5">Import</a>
            </p>
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
                        <a href="{{route('admin.mahasiswa.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.mahasiswa.edit', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbaharui"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" data-mhsid="{{$row->id}}" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-alt-danger"><i class="fa fa-trash"></i></a>
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
    <form action="{{route('admin.mahasiswa.destroy','delete')}}" method="post">
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
                    <input type="hidden" name="mhs_id" id="mhs_id" value="">
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
      var mhs_id = button.data('mhsid') 
      var modal = $(this)
      modal.find('.block-content #mhs_id').val(mhs_id);
})
</script>
@endsection
