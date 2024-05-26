<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Autentikasi | @yield('title')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://iconape.com/wp-content/files/sh/336155/png/logo.png">

    <!-- Layout config Js -->
    <script src="/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

    <body class="auth-bg 100-vh">
        <div class="bg-overlay bg-light"></div>
    
        <div class="account-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100 py-0 py-xl-4">
    
                                    <div class="card my-auto overflow-hidden">
                                        <div class="row g-0">
                                                @yield('content')
                                        </div>
                                    </div>
                                    <!-- end card -->
                                    
                                    <div class="mt-5 text-center">
                                        <p class="mb-0 text-muted">©
                                            <script>document.write(new Date().getFullYear())</script> TRIAL APP. Crafted with <i class="mdi mdi-heart text-danger"></i> by TRIAL APP
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- password-addon init -->
    <script src="/assets/js/pages/password-addon.init.js"></script>
    @if(session('OK'))
    <script>
        Swal.fire("Berhasil!", "{{ session('OK') }}", "success");

    </script>
    @endif

    @if(session('ERR'))
    <script>
        Swal.fire("Error!", "{{ session('ERR') }}", "error");
    </script>
    @endif
    @yield('js')
</body>

</html>