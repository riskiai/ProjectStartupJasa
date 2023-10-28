@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="welcome-panel">
                        <h1 class="welcome-dashboard">Welcome To Admin Panel</h1> 
                        <a href="{{ route('serviceList') }}"><button class="button-merah">Selamat Bekerja</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
