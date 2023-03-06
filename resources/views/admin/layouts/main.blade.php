<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendors/base/vendor.bundle.base.css')}}">

        <link rel="stylesheet" href="{{asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">

        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/dropify.css')}}">
        <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.png')}}" />
        <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.min.css')}}">
        <style>
            .btn-primary, .btn-danger, .btn-success, .btn-warning { color: #FFF; }
        </style>
        @livewireStyles
    </head>
    <body>
        <div class="container-scroller">
            <!-- Navbar -->
            @include('admin.layouts.navbar')

            <div class="container-fluid page-body-wrapper">

                {{-- Sidebar --}}
                @include('admin.layouts.sidebar')

                {{-- Main --}}
                @yield('content')

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{asset('assets/admin/vendors/base/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="{{asset('assets/admin/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{asset('assets/admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('assets/admin/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('assets/admin/js/template.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
        <script src="{{asset('assets/admin/js/data-table.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.bootstrap4.js')}}"></script>
        <!-- End custom js for this page-->
        <script src="{{asset('assets/admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/dropify.js')}}"></script>
        <script src="{{asset('assets/admin/js/fontawesome.min.js')}}"></script>
        <script>
            $('.dropify').dropify();
        </script>
        @livewireScripts

        @yield('scripts')
    </body>
</html>
