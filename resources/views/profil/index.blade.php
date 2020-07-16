@extends('layouts.backend')

@section('title','Profil Mahasiswa')

@section('content')
<div class="content">
    <!-- Page Content -->
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('{{asset('/media/photos/photo13@2x.jpg')}}');">
        <div class="bg-black-op-75 py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('/media/avatars/avatar15.jpg')}}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->
                @can('mahasiswa')
                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{$data->nama_mhs}}</h1>
                <h2 class="h5 text-white-op">
                    Mahasiswa <a class="text-primary-light" href="javascript:void(0)">{{$data->angkatan}}</a>
                </h2>
                <!-- END Personal -->
                @endcan
                @if(Auth::user()->can('manage-users') || Auth::user()->can('koordinatorta')
                || Auth::user()->can('koordinatorkp') || Auth::user()->can('koordinatorkbk')
                || Auth::user()->can('dosen'))
                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{$dosen->nama_dosen}}</h1>
                <!-- END Personal -->
                @endif
                <!-- Actions -->
                <a href="{{route('home')}}" class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5">
                    <i class="fa fa-arrow-left mr-5"></i> Back to Home
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END User Info -->
    <br>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <!-- User Profile -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-user-circle mr-5 text-muted"></i> User Profile
            </h3>
        </div>
        <div class="block-content">
            <form action="{{route('profil.update', Auth::user()->id)}}" method="post" >
            @method('PATCH')
            @csrf
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        @can('mahasiswa')
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="name">Username</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your username.." value="{{Auth::user()->name}}">
                                <div class="text-danger">{{ $errors->first('name')}}</div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="nama_mhs">Name</label>
                                <input type="text" class="form-control form-control-lg" id="nama_mhs" name="nama_mhs" placeholder="Enter your name.." value="{{$data->nama_mhs}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email.." value="{{Auth::user()->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control form-control-lg" id="nim" name="nim" placeholder="Enter your nim.." value="{{$data->nim}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="ipk">IPK</label>
                                <input type="text" class="form-control form-control-lg" id="ipk" name="ipk" placeholder="Enter your ipk.." value="{{$data->ipk}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="sks">SKS</label>
                                <input type="text" class="form-control form-control-lg" id="sks" name="sks" placeholder="Enter your sks.." value="{{$data->sks}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" name="action" value="data" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                        @endcan
                        @if(Auth::user()->can('manage-users') || Auth::user()->can('koordinatorta')
                        || Auth::user()->can('koordinatorkp') || Auth::user()->can('koordinatorkbk')
                        || Auth::user()->can('dosen'))
                        <!-- Personal -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-username">Username</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-username" name="profile-settings-username" placeholder="Enter your username.." value="{{Auth::user()->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-email">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="profile-settings-email" name="profile-settings-email" placeholder="Enter your email.." value="{{Auth::user()->email}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-name" name="profile-settings-name" placeholder="Enter your name.." value="{{$dosen->nama_dosen}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="profile-settings-nip">NIP</label>
                                <input type="text" class="form-control form-control-lg" id="profile-settings-name" name="nip" placeholder="Enter your nip.." value="{{$dosen->nip}}" readonly>
                            </div>
                        </div>
                        <!-- END Personal -->
                        @endif
                        <!-- <div class="form-group row">
                            <div class="col-md-10 col-xl-6">
                                <div class="push">
                                    <img class="img-avatar" src="assets/media/avatars/avatar15.jpg" alt="">
                                </div>
                                <div class="custom-file">
                                    Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput())
                                    <input type="file" class="custom-file-input" id="profile-settings-avatar" name="profile-settings-avatar" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="profile-settings-avatar">Choose new avatar</label>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END User Profile -->
    <!-- User Signature -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-pencil mr-5 text-muted"></i> User Signature
            </h3>
        </div>
        <div class="block-content">
            @can('mahasiswa')
            <form action="{{route('signature.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Signature is important to support this system.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label>Upload Image Signature <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                    <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="image" data-toggle="custom-file-input" multiple>
                                    <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files .PNG</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" name="action" value="mhs" class="btn btn-alt-primary mb-5">Update MHS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endcan
            @if(Auth::user()->can('manage-users') || Auth::user()->can('koordinatorta')
            || Auth::user()->can('koordinatorkp') || Auth::user()->can('koordinatorkbk')
            || Auth::user()->can('dosen'))
            <form action="{{route('signature.update', $dosen->id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Signature is important to support this system.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label>Upload Image Signature <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                    <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="image" data-toggle="custom-file-input" multiple>
                                    <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files .PNG</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="nip" value="{{ $dosen->nip }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" name="action" value="dosen" class="btn btn-alt-primary mb-5">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
    <!-- END User Signature -->
    <!-- User Password -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-asterisk mr-5 text-muted"></i> Change Password
            </h3>
        </div>
        <div class="block-content">
            <form action="{{route('profil.update', Auth::user()->id)}}" method="post">
            @method('PATCH')
            @csrf
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Changing your sign in password is an easy way to keep your account secure.
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="current password">Current Password</label>
                                <input type="password" class="form-control form-control-lg" id="current_password" name="current_password" placeholder="password lama">
                                <div class="text-danger">{{ $errors->first('current_password')}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="password baru">
                                <div class="text-danger">{{ $errors->first('password')}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="password baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" name="action" value="pass" class="btn btn-alt-primary mb-5">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END User Password -->
</div>
@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection