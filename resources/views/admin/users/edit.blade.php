@extends('layouts.backend')
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

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
            <h3 class="block-title">Edit <small>User</small></h3>
        </div>
        <div class="block-content block-content-full col-12 col-md-6">
            <form action="{{route('admin.users.update',$user)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" id="name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="nim">NIP/NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{$user->nim}}" required>
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" id="email" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="roles">Roles</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label for="">{{$role->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" name="action" value="data" class="btn btn-primary mr-5 mb-5">Submit</button>
                        <button type="submit" name="action" value="password" class="btn btn-danger mr-5 mb-5">Reset Password</button>
                        <a href="{{route('admin.users.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->
@endsection
