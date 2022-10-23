<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ BASE_URL }}App/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ BASE_URL }}App/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ BASE_URL }}App/public/dist/css/adminlte.min.css">
    <script src="{{ BASE_URL }}App/public/plugins/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed d-flex justify-content-center">

    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ BASE_URL }}register" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Tên">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if (!empty($error['name']))
                        <div class="alert alert-danger">{{ $error['name'] }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email đăng nhập">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if (!empty($error['email']))
                        <div class="alert alert-danger">{{ $error['email'] }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if (!empty($error['password']))
                        <div class="alert alert-danger">{{ $error['password'] }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="repassword" class="form-control" placeholder="Nhập lại Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if (!empty($error['repassword']))
                        <div class="alert alert-danger">{{ $error['repassword'] }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if (!empty($error['phone']))
                        <div class="alert alert-danger">{{ $error['phone'] }}</div>
                    @endif
                    <div class="row">
                        <div class="col-12 py-2">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="{{ BASE_URL }}App/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ BASE_URL }}App/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ BASE_URL }}App/public/dist/js/adminlte.min.js"></script>


    @stack('js')

</body>

</html>
