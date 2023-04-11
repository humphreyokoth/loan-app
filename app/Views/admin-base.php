<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>loan app</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/theme/admin-lte/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/theme/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

    <?= $this->renderSection('css-files') ?>

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/theme/admin-lte/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <?= session('first_name') . ' - ' . session('user_group') ?>
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
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url('assets/theme/admin-lte/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">loan app</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- SidebarSearch Form -->
                <div class="form-inline mt-3">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="<?= base_url('accounts') ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Accounts</p>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a href="<?= base_url('transactions') ?>" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Transactions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('loan-requests') ?>" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Loan Requests</p>
                            </a>
                        </li>
                      
                        <li class="nav-item">
                            <a href="<?= base_url('logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Logout</p>
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
            <?= $this->renderSection('content') ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Powered by humphrey
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y') ?> <a href="javascript:;">loan app</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- Main Modal -->
    <div class="modal" id="ajaxModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <!-- ./ Main Modal -->



    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/dist/js/adminlte.min.js') ?>"></script>
    <!-- DataTables  & Plugins -->
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
    <!-- <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/jszip/jszip.min.js') ?>"></script> -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/pdfmake/pdfmake.min.js') ?>"></script> -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/pdfmake/vfs_fonts.js') ?>"></script> -->
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
    <!-- <script type="text/javascript" src="<?= base_url('assets/theme/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script> -->
    
    <!-- Custom script -->
    <script src= "<?=base_url('assets/js/custom.js')?>"></script>
    <?= $this->renderSection('js-files') ?>
</body>

</html>