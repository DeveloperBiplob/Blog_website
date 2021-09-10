@extends('layouts.backend_app')

@section('app-content')
    <div class="wrapper">

        <!-- Navbar -->
        @include('backend.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backend.includes.bradcame')
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
             <!-- Main Contents -->   
             @yield('master-content')
             <!-- Main Contents End -->   
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('backend.includes.footer')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endsection
