@extends('layouts.backend')

@section('title','Admin User')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Mahasiswa</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.users.store') }}" method="post">
                        @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="name">Username <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="eg: john" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="nim">NIM / NIP <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="eg: I0716001" required>
                                    @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input required type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="eg: john@example.com" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input required type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="********" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password-confirm">Password Confirmation <span class="text-danger">*</span></label>
                                    <input required type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="********" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-12 text-sm-center push">
                                    <button type="submit" class="btn btn-alt-success">
                                        <i class="fa fa-plus mr-10"></i> Create Account
                                    </button>
                                    <a href="{{route('admin.users.index')}}" class="btn btn-alt-warning">Back</a>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('admin.users.index')}}" class="btn btn-warning">Back</a>
                            </div> -->
                        </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr','select2']); });</script>
@endsection
