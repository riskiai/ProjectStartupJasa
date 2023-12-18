<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">

        @if (!empty(getSettings()) && getSettings()->website_title != '')
        <title>{{ getSettings()->website_title }}</title>
        @else
        <title>Jasa Design || Home Page</title>
        @endif
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/adminlte.min.css?v=3.2.0') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/dropzone/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/custom.css') }}">   
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">     
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>                    
                </ul>                         
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link bg-white" style="height: 57px;">
					{{-- <img src="{{ asset('assets/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
					 <img src="{{ asset('assets/images/LogoCahaya.png') }}" alt="" class="w-75 ml-3" style="margin-top:-5px"> 
                    
                    {{-- <h4>Admin Panel</h4> --}}
                    <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
				  </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

                            <li class="nav-item">
                                <a href="{{ route('welcomeList') }}" class="nav-link"> 
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Manage About</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

                            <li class="nav-item">
                                <a href="{{ route('serviceList') }}" class="nav-link"> 
                                    <i class="fas fa-rocket nav-icon"></i>
                                    <p>Manage Services</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

							<li class="nav-item">
                                <a href="{{ route('blogList') }}" class="nav-link">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>Manage Blogs</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

							<li class="nav-item">
                                <a href="{{ route('faqList') }}" class="nav-link">
                                    <i class="far fa-question-circle nav-icon"></i>
                                    <p>Manage Faq</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

							<li class="nav-item">
                                <a href="{{ route('pageList') }}" class="nav-link">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Manage Pages</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

                            <li class="nav-item">
                                <a href="{{ route('commentList') }}" class="nav-link">
                                    <i class="far fa-comments nav-icon"></i>
                                    <p>Manage Comment</p>
                                </a>
                            </li>

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">

							<li class="nav-item">
                                <a href="{{ route('settings.index') }}" class="nav-link">
                                    <i class="fas fa-wrench nav-icon"></i>
                                    <p>Settings</p>
                                </a>
                            </li>  

                            <hr class="sidebar-divider col-md-8 nav-item mb-3">
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.logout') }}" class="nav-link">
                                    <i class='fas fa-sign-out-alt nav-icon'></i>

                                    <p>Logout</p>
                                </a>
                            </li>                          
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
           
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->


            <footer class="main-footer">
                <strong>Copyright &copy; 2023 </strong>All rights reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        
        <script src="{{ asset('admin_assets/assets/plugins/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('admin_assets/assets/js/adminlte.min.js?v=3.2.0') }}"></script>
        
        <!-- Summernote -->
        <script src="{{ asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
        
        <script src="{{ asset('admin_assets/assets/plugins/dropzone/dropzone.js') }}"></script>

        <script src="{{ asset('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  
        <script type="text/javascript">
            $(document).ready(function(){
                $(".summernote").summernote({
                    height: 300
                });
            });


            $.ajaxSetup({
                headers:  {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        </script>

        @yield('extraJs')
        @yield('script')

    </body>
</html>