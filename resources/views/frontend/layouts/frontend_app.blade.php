@php
    $website = App\Models\Website::first();
    $latest_posts = App\Models\Post::latest()->limit(3)->get();
@endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $website->title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/fontastic.css">
        <!-- Google fonts - Open Sans-->

        <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <!-- Fancybox-->
        <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/custom.css">
        <!-- Toastr Notification-->
        {{-- <link rel="stylesheet" href="{{ asset('plugins') }}/toaster.css"> --}}
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <!-- Bootstrap Datatabel-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('frontend') }}/favicon.png">

    </head>
    <body>
        @include('frontend.includes.header')
    <!-- frontend app content -->
    @yield('app-content')
    <!-- frontend app content End -->
    @include('frontend.includes.footer')
        
        <!-- JavaScript files-->
        <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
        <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('frontend') }}/js/wow.min.js"></script>
        <script src="{{ asset('frontend') }}/js/front.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
        <!-- Bootstrap datatable-->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
            </script>
        <!-- Toastr Notification-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
        <script>
            @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}", 'Success!')
            @elseif(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}", 'Warning!')
            @elseif(Session::has('error'))
                toastr.error("{{ Session::get('error') }}", 'Error!')
            @endif
        </script>
        <script src="{{ asset('frontend') }}/js/custom.js"></script>
    </body>
</html>