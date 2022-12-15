<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $data['title'] ?></title>

	<link rel="shortcut icon" href="<?= BASEURL ?>/icon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= BASEURL ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/sweetalert2.min.css" rel="stylesheet">
    <!-- <link href="<?= BASEURL; ?>/css/font-google.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/fh-3.3.1/r-2.4.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/datatables.min.css"/>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center bg-gray-900" href="<?= BASEURL; ?>/home">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laptop-code"></i> -->
                    <img src="<?= BASEURL ?>/icon/favicon-32x32.png" alt="firman" class="shadow">
                </div>
                <div class="sidebar-brand-text mx-3">Apps</div>
            </a>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link pb-0" href="<?= BASEURL ?>/home">
                    <i class="fas fa-home fa-fw"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= BASEURL ?>/kendaraan">
                    <i class="fas fa-car fa-fw"></i>
                    <span>Kendaraan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= BASEURL ?>/report">
                    <i class="fas fa-book fa-fw"></i>
                    <span>Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Profile</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow border-bottom-warning">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-light d-md-none rounded-circle mr-3">
                        <i class="fas fa-bars text-dark"></i>
                    </button>

                    <p class="font-weight-bold h5 text-warning">Tracker Apps</p>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small font-weight-bold"><?= $data['userlogin']['nama_user'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= BASEURL ?>/img/<?= $data['userlogin']['profile'] ?>" alt="profile">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            