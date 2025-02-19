<div class="main-header side-header sticky nav nav-item">
    <div class="container-fluid main-container ">
        <div class="main-header-left ">
            <div class="app-sidebar__toggle mobile-toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);" style="position: relative; top: -2px;">
                    <i class="header-icons" data-eva="menu-outline"></i>
                </a>
                <a class="close-toggle" href="javascript:void(0);" style="position: relative; top: -2px;">
                    <i class="header-icons" data-eva="close-outline"></i>
                </a>

            </div>
            <div class="responsive-logo">
                <a href="index.html" class="header-logo"><img src="../assets/img/brand/logo.png" class="logo-11"></a>
                <a href="index.html" class="header-logo"><img src="../assets/img/brand/logo-white.png"
                        class="logo-1"></a>
            </div>
            <ul class="header-megamenu-dropdown  nav">
                <li class="nav-item">
                    <div class="btn-group dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-link dropdown-toggle"
                            data-bs-toggle="dropdown" id="dropdownMenuButton2" type="button"><span><i
                                    class="fe fe-settings"></i> Settings </span></button>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-header header-img p-3">
                                <div class="drop-menu-inner">
                                    <div class="header-content text-start d-flex">
                                        <div class="text-white">
                                            <h5 class="menu-header-title">Setting</h5>
                                            <h6 class="menu-header-subtitle mb-0">Overview of theme</h6>
                                        </div>
                                        <div class="my-auto ms-auto">
                                            <span class="badge bg-pill bg-warning float-end">View all</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="setting-scroll">
                                <div>
                                    <div class="setting-menu ">
                                        <a class="dropdown-item" href="{{ route('profile') }}"><i
                                                class="mdi mdi-account-outline tx-16 me-2 mt-1"></i>Profile</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="setting-menu-footer flex-column ps-0">
                                <li class="divider mb-0 pb-0 "></li>
                                <li class="setting-menu-btn">
                                    <button class=" btn-shadow btn btn-success btn-sm">Cancel</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
         <div class="nav nav-item nav-link">
                        <div class="row mb-50">
                            <div class="col-50 mx-auto">
                                <form action="{{ route('all-task') }}" method="GET" class="d-flex gap-2">
                                    <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..."
                                        value="{{ request()->query('query') }}">
                                        <button type="submit" class="btn btn-danger" style="padding-left: 10px;">Cari</button>

                                </form>
                            </div>
                        </div>

                    </div>
        <button class="navbar-toggler nav-link icon navresponsive-toggler vertical-icon ms-auto" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
            aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
        </button>
        <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0  mg-lg-s-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <div class="main-header-right">
                   
                    <li class="dropdown nav-item main-layout">
                        <a class="new theme-layout nav-link-bg layout-setting">
                            <span class="dark-layout"><i class="fe fe-moon"></i></span>
                            <span class="light-layout"><i class="fe fe-sun"></i></span>
                        </a>
                    </li>
                    <div class="nav nav-item  navbar-nav-right mg-lg-s-auto">
                        <div class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="javascript:void(0);"><i
                                    class="fe fe-maximize"></i></span></a>
                        </div>
                        <div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user d-flex" href=""><img src="../vendor/img/RPL00756.JPG"
                                    alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>

                            <div class="dropdown-menu">
                                <div class="main-header-profile header-img">
                                    <div class="main-img-user"><img alt="" src="../vendor/img/RPL00756.JPG">
                                    </div>
                                    <h6>Muhammad Rival</h6><span>Admin </span>
                                </div>
                                <a class="dropdown-item" href="{{ route('profile') }}"><i class="far fa-user"></i> My
                                    Profile</a>
                                <a data-bs-toggle="modal" data-bs-target="#settingsModal"class="dropdown-item"
                                    href="#EditModalProfile"><i class="far fa-edit"></i> Edit
                                    Profile</a>
                                <a data-bs-toggle="modal" data-bs-target="#settingsModal"class="dropdown-item"
                                    href="#ActivModal"><i class="far fa-clock"></i> Activity
                                    Logs</a>
                                <a data-bs-toggle="modal" data-bs-target="#settingsModal"class="dropdown-item"
                                    href="#AccountModal"><i class="fas fa-sliders-h"></i> Account
                                    Settings</a>
                                <a data-bs-toggle="modal" data-bs-target="#settingsModal"class="dropdown-item"
                                    href="#SignModal"><i class="fas fa-sign-out-alt"></i> Sign
                                    Out</a>
                            </div>
                        </div>
                        <div class="dropdown main-header-message right-toggle">
                            <a class="nav-link pe-0" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
                                <i class="ion ion-md-menu tx-20 bg-transparent"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
