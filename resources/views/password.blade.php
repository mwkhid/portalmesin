<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Portal Elektro</title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <!-- <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png"> -->
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
                                <div class="py-30 text-center">
                                    <div class="mt-10">
                                        <img src="{{asset('/media/login/logo-uns.png')}}" alt="Logo Universitas Sebelas Maret" width="50%" height="50%">
                                    </div>
                                    <h1 class="h4 font-w700 mt-30 mb-10">Untuk keamanan akun anda</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Mohon masukkan password baru</h2>
                                </div>
                                <!-- END Header -->

                                <!-- Reminder Form -->
                                <!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-reminder" action="{{route('password.store', $user->id)}}" method="post">
                                    @csrf
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-primary">
                                            <h3 class="block-title">Password Reminder</h3>
                                        </div>
                                        <div class="block-content">
                                        @if(session()->has('alert'))
                                            <div class="alert alert-danger alert-dismissable mt-20" role="alert">
                                                <strong>{{ session()->get('alert')}}</strong>  
                                            </div>
                                        @endif
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="********" required>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="password-confirm">Password Confirmation</label>
                                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="********" required>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-alt-primary">
                                                    <i class="fa fa-asterisk mr-10"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Reminder Form -->
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
    </body>
</html>