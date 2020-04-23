@extends('layouts.backend')

@section('title','User Management')

@section('content')
<!-- Page Content -->
<div class="content">
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">User <small>Management</small></h3>
        </div>
        <div class="block-content block-content-full">
            <p align="right">
                <a href="{{route('admin.users.create')}}" class="btn btn-primary">Tambah User</a>
                <a href="{{route('admin.importuser')}}" class="btn btn-success">Import User</a>
            </p>
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-edited">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                        <th class="" style="width: 17%;">Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">NIP/NIM</th>
                        <th class="d-none d-sm-table-cell" style="width: 25%;">Email</th>
                        <th style="width: 15%;">Hak Akses</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Registered</th>
                        <th style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                        <tr>
                            <td class="d-none d-sm-table-cell text-center">{{$key+1}}</td>
                            <td class="font-w600">
                                <a href="javascript:void(0)">{{$user->name}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{$user->nim}}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{$user->email}}</em>
                            </td>
                            <td class="text-center">
                                {{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{ $user->created_at }}</em>
                            </td>
                            <td class="text-center">
                                <a href="{{route('admin.users.show', $user->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                                @can('edit-users')
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-alt-warning mb-5 mr-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Perbarui"><i class="fa fa-edit"></i></a>
                                @endcan
                                <a href="javascript:;" data-userid="{{$user->id}}" data-toggle="modal" data-target="#delete" class="btn btn-sm btn-alt-danger"><i class="fa fa-trash"></i></a>
                                <!-- @can('delete-users')
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="mb-5">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->
<!-- Top Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
    <form action="{{route('admin.users.destroy','delete')}}" method="post">
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
