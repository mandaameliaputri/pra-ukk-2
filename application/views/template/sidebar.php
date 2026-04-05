<?php
$level = $this->session->userdata('level');
$menu = $this->uri->segment(1);
$sub = $this->uri->segment(2);
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($level) ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SiLaporSekolah <br><small><?= ucfirst($level) ?></small></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?= ($sub == '' || $sub == 'index') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url($level) ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php if($level == 'admin'): ?>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Data Master</div>
    
    <li class="nav-item <?= ($sub == 'sarana') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/sarana') ?>">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Kelola Sarana</span>
        </a>
    </li>
    
    <li class="nav-item <?= ($sub == 'siswa') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/siswa') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Siswa</span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Pengaduan</div>
    
    <li class="nav-item <?= ($sub == 'pengaduan') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/pengaduan') ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Data Pengaduan</span>
        </a>
    </li>
    
    <li class="nav-item <?= ($sub == 'laporan') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/laporan') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Cetak Laporan</span>
        </a>
    </li>
    
    <?php elseif($level == 'siswa'): ?>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Informasi</div>
    
    <li class="nav-item <?= ($sub == 'sarana') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('siswa/sarana') ?>">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Data Sarana</span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Pengaduan</div>
    
    <li class="nav-item <?= ($sub == 'pengaduan') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('siswa/pengaduan') ?>">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Buat Pengaduan</span>
        </a>
    </li>
    
    <li class="nav-item <?= ($sub == 'riwayat') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('siswa/riwayat') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat</span>
        </a>
    </li>
    
    <?php endif; ?>
    
    <hr class="sidebar-divider">
    
    <!-- Ganti Password -->
    <li class="nav-item <?= ($sub == 'ganti_password') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url($level.'/ganti_password') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ganti Password</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama') ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_profile.svg') ?>">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                        <a class="dropdown-item" href="<?= base_url($level.'/ganti_password') ?>">
                            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ganti Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">