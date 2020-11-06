@extends('layouts.app')

@section('content')
    <body class="loading"
          data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <!-- LOGO -->
            <a href="{{ route('home') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src= "/images/logo.png" alt="" height="16">
                    </span>
                <span class="logo-sm">
                        <img src= "/images/logo_sm.png" alt="" height="16">
                    </span>
            </a>

            <!-- LOGO -->
            <a href="{{ route('home') }}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src= "/images/logo-dark.png" alt="" height="16">
                    </span>
                <span class="logo-sm">
                        <img src= "/images/logo_sm_dark.png" alt="" height="16">
                    </span>
            </a>

            <div class="h-100" id="left-side-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav">

                    <li class="side-nav-title side-nav-item">Control panel</li>

                    <li class="side-nav-item">
                        <a href="{{  route('home') }}" class="side-nav-link">
                            <i class="uil-layer-group"></i>
                            <span> My repos </span>
                        </a>
                    </li>
                </ul>

                <!-- End Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0"x>
                        <li class="dropdown notification-list d-none d-sm-inline-block">
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                               aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                <span>
                                        <span class="account-user-name">{{  Auth::user()->name }}</span>
                                        <span class="account-position">{{  Auth::user()->email }}</span>
                                    </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout mr-1"></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                @yield('content')

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-md-block">
                                <a href="{{ route('landing') }}">Go to landing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->



    </div>
    <!-- END wrapper -->

    <!-- bundle -->
    <script src="/js/vendor.min.js"></script>
    <script src="/js/app.min.js"></script>

    </body>
@overwrite

