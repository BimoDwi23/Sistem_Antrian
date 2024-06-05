<?= $this->extend('layout/header'); ?>
<?= $this->section('header'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="navbar-brand" data-widget="pushmenu" role="button">
                        <img src="<?= base_url(); ?>public/template/dist/img/logo-rs.png" alt="RSPM Logo" class="img-circle elevation-3" style="opacity: .8; width:50px">
                        <span class="font-weight-light">RS Paru Maguharjo Madiun</span>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout'); ?>" class="nav-link tombol-logout"><i class="fas fa-power-off"></i> Logout</a>
                </li>
            </ul>
    </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?= base_url(); ?>public/template/dist/img/logo-rs.png" alt="RS Maguharjo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">RSPM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url(); ?>public/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= session()->get('username'); ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <?php if (session()->get('level_id') == 'LV002') : ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>" class="nav-link <?= $uri->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                    <?php else : ?>
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>" class="nav-link <?= $uri->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-header">Data User</li>
                                <li class="nav-item">
                                    <a href="<?= base_url('user/view'); ?>" class="nav-link <?= $uri->getSegment(1) == 'user' ? 'active' : '' ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Data User
                                        </p>
                                    </a>
                                <li class="nav-item">
                                    <a href="<?= base_url('level/view'); ?>" class="nav-link <?= $uri->getSegment(1) == 'level' ? 'active' : '' ?>">
                                        <i class="fas fa-universal-access nav-icon"></i>
                                        <p>Level</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                    <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <?= $this->renderSection('content'); ?>
    <footer class="main-footer">
        <strong>Copyright &copy; 2019 - 2023 <a href="https://www.instagram.com/bimo_dwi23" target="_blank">ReyogIot</a>.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=VjXfaW67"></script>
    <script src="<?= base_url(); ?>public/template/dist/js/myscript.js"></script>
    <?= $this->endSection(); ?>