<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- include head files -->
    @include("admin.includes.head")

    <title>Chef's Frozen Foods - Admin</title>
</head>

<body>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">Home Page</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User session and Logout -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Welcome: {{ Auth::user()->name }}</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{route('logout')}}">
                        Logout
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin.home')}}" class="brand-link">
                <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">Chefs Frozen Foods</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- <li class="nav-item menu-close">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    Profile
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="change-password" class="nav-link">
                                        <i class="fa fa-key nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="edit-profile" class="nav-link">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Edit Profile</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="logout" class="nav-link">
                                        <i class="fa fa-sign-out nav-icon"></i>
                                        <p>Logout</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->

                        <li class="nav-header">MANAGEMENT</li>

                        <li class="nav-item">
                            <a href="{{route('admin.banner')}}" class="nav-link">
                                <p>
                                    <i class="fa fa-image nav-icon"></i>
                                    Banner
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.category')}}" class="nav-link">
                                <p>
                                    <i class="fa fa-th-large nav-icon"></i>
                                    Category
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.product')}}" class="nav-link">
                                <p>
                                    <i class="fas fa-square nav-icon"></i>
                                    Product
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.brand')}}" class="nav-link">
                                <p>
                                    <i class="fa fa-circle nav-icon"></i>
                                    Brand
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.vendor')}}" class="nav-link">
                                <p>
                                    <i class="fa fa-users nav-icon"></i>
                                    Vendor
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.contact')}}" class="nav-link">
                                <p>
                                    <i class="fa fa-envelope nav-icon"></i>
                                    Contact Form
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.faq')}}" class="nav-link">
                                <p>
                                    <i class="fas fa-pager nav-icon"></i>
                                    FAQs
                                </p>
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
            <main>
                @yield('content')
            </main>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2024. Chef's Frozen Foods</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                Developed by <b>Sandeep Sabu</b>
            </div>
        </footer>

    </div>
    @include("admin.includes.foot")
</body>

</html>