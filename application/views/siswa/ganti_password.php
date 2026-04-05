<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
</div>

<!-- Form Ganti Password -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-key mr-2"></i>Form Ganti Password
        </h6>
    </div>
    <div class="card-body">
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>
        
        <form action="<?= base_url('siswa/update_password') ?>" method="post">
            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" class="form-control" name="password_lama" required>
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="password_baru" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" class="form-control" name="konfirmasi" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-2"></i>Ganti Password
            </button>
        </form>
    </div>
</div>