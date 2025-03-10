<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    {{-- <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" /> --}}

    <!-- Title -->
    <title> Listify || App </title>
    {{-- <link rel="icon" href="../assets/img/brand/favicon.png" type="image/x-icon"/> --}}
    <link rel="icon" href="../vendor/img/logo.webp" type="image/x-icon" />


    <!--- Favicon --->
    <link rel="icon" type="image/png" href="{{ asset('logo-name.png') }}?v={{ time() }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!--- Style css --->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">

    <!--- Icons css --->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> --}}


</head>

<body class="main-body app sidebar-mini ltr">

    <!-- Loader -->
    @include('partials.loader')
    <!-- /Loader -->

    <!-- page -->
    <div class="page custom-index">

        <!-- main-header -->
        @include('partials.header')
        <!-- /main-header -->

        <!-- main-sidebar -->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        @include('partials.sidebar-left')
        <!-- main-sidebar -->

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                @include('partials.bread-crumb')
                <!-- /breadcrumb -->

                <!-- main-content-body -->
               <div class="page custom-index"overflow-y: auto;">

                    @yield('content')


                    <!-- //main-content-body -->

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-content -->

        <!--Sidebar-right-->
        @include('partials.sidebar-right')
        <!--/Sidebar-right-->


    </div>
    <!-- page closed -->
    @include('partials.footer')
    @include('partials.scripts')

</body>

</html>
