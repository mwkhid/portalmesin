<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Portal Elektro</title>


        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{asset('/css/codebase.css')}}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('{{asset('/media/login/background-uns.png')}}');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <!-- Header -->
                                <div class="py-20 text-center">
                                    <a class="link-effect font-w700" href="{{ url('/') }}">
                                        <span class="font-size-xl text-black">Portal</span><span class="font-size-xl text-black"> Elektro</span>
                                    </a>
                                    <div class="mt-10">
                                        <img src="{{asset('/media/login/logo-uns.png')}}" alt="Logo Universitas Sebelas Maret" width="50%" height="50%">
                                    </div>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" action="{{ route('login') }}" method="post">
                                @csrf
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-dusk">
                                            <h3 class="block-title">Please Sign In</h3>
                                        </div>
                                        <div class="block-content">
                                        @if(session()->has('alert'))
                                            <div class="alert alert-danger alert-dismissable" role="alert">
                                                <strong>{{ session()->get('alert')}}</strong>  
                                            </div>
                                        @endif
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="username">NIM / NIP / Email</label>
                                                    <input type="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" id="username" name="username">
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="email">Username</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-6 d-sm-flex align-items-center push">
                                                    <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-right push">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="si si-login mr-10"></i> Sign In
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="block-content bg-body-light">
                                            <div class="form-group text-center">
                                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('register') }}">
                                                    <i class="fa fa-plus mr-5"></i> Create Account
                                                </a>
                                                @if (Route::has('password.request'))
                                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                                    <i class="fa fa-warning mr-5"></i> {{ __('Forgot Your Password?') }}
                                                </a>
                                                @endif
                                            </div>
                                        </div> -->
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <!-- <script src="{{asset('/js/codebase.core.min.js')}}"></script> -->

        <script src="{{ asset('js/codebase.app.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset('/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <!-- Page JS Code -->
        <!-- <script src="{{asset('/js/pages/op_auth_signin.min.js')}}"></script> -->
    </body>
</html>