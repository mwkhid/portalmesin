@extends('layouts.backend')

@section('title','User Management')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- <div class="my-50 text-center">
        <h2 class="font-w700 text-black mb-10">Dashboard</h2>
        <h3 class="h5 text-muted mb-0">Welcome to your app.</h3>
    </div> -->

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">User <small>Management</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-edited">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell text-center" style="width: 3%;">No</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                        <th style="width: 15%;">Roles</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Registered</th>
                        <th style="width: 13%;">Action</th>
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
                                <em class="text-muted">{{$user->email}}</em>
                            </td>
                            <td class="text-center">
                                {{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted">{{ $user->created_at }}</em>
                            </td>
                            <td class="text-center">
                                @can('edit-users')
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-sm btn-alt-warning mb-5 mr-5"><i class="fa fa-edit"> Edit</i></a>
                                @endcan
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
@endsection
