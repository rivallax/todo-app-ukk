 <!-- main-sidebar -->
 <div class="sticky">
     <aside class="app-sidebar sidebar-scroll">
         <div class="main-sidebar-header active">
             {{-- <a class="desktop-logo logo-light active" href="index.html"><img src="../assets/img/brand/logo.png"
                     class="main-logo" alt="logo"></a> --}}
                     <img src="../vendor/img/logo-text.png" class="main-logo" style="width: 150px; height: auto; margin-top: -10px;">



             {{-- <a class="desktop-logo logo-dark active" href="index.html"><img src="../assets/img/brand/logo-white.png"
                     class="main-logo" alt="logo"></a> --}}
             <a class="logo-icon mobile-logo icon-light active" href="index.html"><img
                     src="../assets/img/brand/favicon.png" alt="logo"></a>
             <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                     src="../assets/img/brand/favicon-white.png" alt="logo"></a>
         </div>
         <div class="main-sidemenu">
             <div class="main-sidebar-loggedin">
                 <div class="app-sidebar__user">
                     <div class="dropdown user-pro-body text-center">
                         <div class="user-pic">
                             <img src="../vendor/img/RPL00756.JPG" alt="user-img" class="rounded-circle mCS_img_loaded">
                         </div>
                         <div class="user-info">
                             <h6 class=" mb-0 text-dark">MUHAMMAD RIVALDI AKBAR</h6>
                             <span class="text-muted app-sidebar__user-name text-sm">Admin</span>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                     <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                 </svg></div>
             <ul class="side-menu ">
                 <li class="slide">
                     <a class="side-menu__item" href="/"><i class="side-menu__icon fe fe-airplay"></i><span
                             class="side-menu__label">Dashboard</span></a>
                 </li>
                 <li class="slide {{ request()->is('all-task') || request()->is('low') || request()->is('medium') || request()->is('high') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <i class="side-menu__icon fe fe-box"></i>
                        <span class="side-menu__label">Apps</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu" style="{{ request()->is('all-task') || request()->is('low') || request()->is('medium') || request()->is('high') ? 'display:block;' : 'display:none;' }}">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Apps</a></li>
                        <li><a class="slide-item {{ request()->is('all-task') ? 'active' : '' }}" href="{{ route('all-task') }}">ALL TASK & LIST</a></li>
                        <li><a class="slide-item {{ request()->is('low') ? 'active' : '' }}" href="{{ route('low') }}">LOW</a></li>
                        <li><a class="slide-item {{ request()->is('medium') ? 'active' : '' }}" href="{{ route('medium') }}">MEDIUM</a></li>
                        <li><a class="slide-item {{ request()->is('high') ? 'active' : '' }}" href="{{ route('high') }}">HIGH</a></li>
                    </ul>
                </li>
                
             </ul>

             <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                     width="24" height="24" viewBox="0 0 24 24">
                     <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                 </svg></div>
         </div>
     </aside>
 </div>
 <!-- //main-sidebar -->
