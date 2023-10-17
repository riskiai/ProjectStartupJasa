<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Web APP | Admin Panel</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/adminlte.min.css?v=3.2.0') }}">
       
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
           
            {{-- Image/Gambar --}}
            {{--  <div class="login-logo mb-4">
                <a href="#"><img src="../images/logo.png"></a>
            </div> --}}

            

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="#" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <script src="{{ asset('admin_assets/assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/adminlte.min.js?v=3.2.0') }}"></script>
    </body>
</html>