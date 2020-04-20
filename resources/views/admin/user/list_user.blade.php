@extends('layouts.backend')

@section('title','List User')

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
            <h3 class="block-title">Daftar User <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <p align="right">
                <a href="{{route('admin.user.create')}}" class="btn btn-primary">Tambah User</a>
                <a href="{{route('admin.importuser')}}" class="btn btn-success">Import User</a>
            </p>
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-edited">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 17%">Name</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">NIM</th>
                    <th class="text-center" style="width: 30%;">Email</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Hak Akses</th>
                    <th class="text-center" style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1?>
                @foreach ($data as $row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $no++}}</td>
                    <td class="text-center font-size-sm text-center">{{ $row->name}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->email}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">
                        {{implode(', ',$row->roles()->get()->pluck('name')->toArray())}}
                    </td>
                    <td width="250" style="text-align: center;">
                        <a href="{{route('admin.user.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.user.edit', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbarui"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" data-userid="{{$row->id}}" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-alt-danger"><i class="fa fa-trash"></i></a>
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
    <form action="{{route('admin.user.destroy','delete')}}" method="post">
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
                    <input type="hidden" name="user_id" id="user_id" value="">
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
      var user_id = button.data('userid') 
      var modal = $(this)
      modal.find('.block-content #user_id').val(user_id);
})
</script>
@endsection
