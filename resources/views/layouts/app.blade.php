<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> Listify || App </title>

    <!--- Favicon --->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}?v={{ time() }}">


    <!-- Bootstrap css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" id="style" />

    <!--- Style css --->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/plugins.css" rel="stylesheet">

    <!--- Icons css --->
    <link href="../assets/css/icons.css" rel="stylesheet">

    <!--- Animations css --->
    <link href="../assets/css/animate.css" rel="stylesheet">
    <script src="{{ asset('js/time.js') }}"></script>


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
                <div class="breadcrumb-header justify-content-between">
                    <div>
                        <h4 class="content-title mb-2">Hi, welcome back!</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Project</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex my-auto">
                        <div class=" d-flex right-page">
                            <div class="d-flex justify-content-center me-5">
                                <div class="">
                                    <span class="d-block">
                                        <span class="label ">EXPENSES</span>
                                    </span>
                                    <span class="value">
                                        $53,000
                                    </span>
                                </div>
                                <div class="ms-3 mt-2">
                                    <span class="sparkline_bar"></span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    <span class="d-block">
                                        <span class="label">PROFIT</span>
                                    </span>
                                    <span class="value">
                                        $34,000
                                    </span>
                                </div>
                                <div class="ms-3 mt-2">
                                    <span class="sparkline_bar31"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- main-content-body -->
                <div class="main-content-body">
                    @yield('home')

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
