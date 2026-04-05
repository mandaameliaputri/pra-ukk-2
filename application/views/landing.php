<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SiLaporSekolah - Aplikasi Pengaduan Sarana Sekolah</title>

    <!-- CSS -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom-style.css') ?>" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-landing navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-school me-2"></i> SiLaporSekolah
        </a>
        <div>
            <a href="<?= base_url('auth') ?>" class="btn btn-login btn-landing">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk
            </a>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-register btn-landing">
                <i class="fas fa-user-plus me-2"></i> Daftar
            </a>
        </div>
    </div>
</nav>
<br><br><br>
<!-- Hero Section -->
<div class="container hero-section">
    <div class="row align-items-center">
        <div class="col-lg-7">
            <h1 class="hero-title"><span>Aplikasi Pengaduan</span>Sarana Sekolah</h1>
            <p class="hero-text">
                SiLaporSekolah hadir untuk memudahkan siswa dan guru dalam melapor serta menangani 
                kerusakan sarana sekolah. Semua jadi lebih teratur, cepat, dan transparan.
            </p>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-mulai">
                Mulai Sekarang
            </a>
        </div>
        <div class="col-lg-5 hero-image">
            <i class="fas fa-school"></i>
        </div>
    </div>
</div>

<!-- Fitur Unggulan -->
<div class="container mt-5">
    <h2 class="section-title">Fitur Unggulan</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-pencil-alt"></i></div>
                <h5>Lapor Kerusakan</h5>
                <p>Cukup 3 langkah: pilih sarana, tulis keluhan, upload foto. Laporan langsung masuk ke admin.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-camera"></i></div>
                <h5>Upload Foto Bukti</h5>
                <p>Lengkapi laporan dengan foto biar admin lihat langsung kondisi kerusakannya.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                <h5>Pantau Status</h5>
                <p>Lihat perkembangan laporan: Menunggu, Diproses, atau Selesai. Semua transparan.</p>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-users"></i></div>
                <h5>Dua Role Pengguna</h5>
                <p>Siswa sebagai pelapor, Admin sebagai penanggung jawab. Masing-masing punya akses berbeda.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-file-pdf"></i></div>
                <h5>Laporan</h5>
                <p>Admin dapat mencetak laporan semua data pengaduan yang masuk, untuk keperluan arsip.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-history"></i></div>
                <h5>Riwayat Lengkap</h5>
                <p>Semua laporan tersimpan rapi. Bisa dilihat kapan saja, tidak ada yang hilang.</p>
            </div>
        </div>
    </div>
</div>

<!-- Tentang Aplikasi -->
<div class="container">
    <div class="info-section">
        <h2 class="info-title">Tentang SiLaporSekolah</h2>
        <p class="info-text">
            SiLaporSekolah adalah aplikasi berbasis web yang dikembangkan untuk 
            mempermudah pengelolaan pengaduan sarana di SMK IGASAR PINDAD Bandung. 
            Aplikasi ini lahir dari kebutuhan akan sistem pelaporan yang lebih modern, 
            terstruktur, dan efisien dibandingkan cara manual yang selama ini berjalan.
            Dengan SiLaporSekolah, setiap laporan kerusakan tercatat otomatis di database, 
            admin bisa langsung merespon, dan siswa bisa memantau perkembangan laporannya. 
            Tidak ada lagi laporan yang hilang atau terlewat.
        </p>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p><i class="fas fa-school me-2" style="color: #4e73df;"></i> SiLaporSekolah © <?= date('Y') ?></p>
    </div>
</footer>

<!-- Scripts -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>