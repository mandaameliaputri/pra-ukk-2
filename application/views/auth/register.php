<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - SiLaporSekolah</title>

    <!-- CSS -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom-style.css') ?>" rel="stylesheet">
</head>
<body class="fullscreen-center">

<div class="card card-register shadow-lg">
    <div class="text-center mb-4">
        <h4>Registrasi Siswa</h4>
    </div>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <form class="user" action="<?= base_url('auth/daftar') ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nis" placeholder="NIS" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-user btn-block">Daftar</button>
    </form>

    <div class="text-center mt-3">
        <a href="<?= base_url('auth') ?>">Sudah punya akun? Login</a>
    </div>
</div>

<!-- Scripts -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>