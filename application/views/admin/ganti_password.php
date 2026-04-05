<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
</div>

<!-- Form Ganti Password -->
<div class="row">
    <!-- Kolom Form -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-key mr-2"></i>Form Ganti Password
                </h6>
            </div>
            <div class="card-body">
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                <?php endif; ?>
                
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                <?php endif; ?>
                
                <form action="<?= base_url('admin/update_password') ?>" method="post">
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
    </div>
    
    <!-- Kolom Informasi -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-info-circle mr-2"></i>Informasi
                </h6>
            </div>
            <div class="card-body">
                <p>Pastikan password baru Anda:</p>
                <ul>
                    <li>Minimal 4 karakter</li>
                    <li>Tidak sama dengan password sebelumnya</li>
                    <li>Mudah diingat tapi sulit ditebak</li>
                </ul>
                <hr>
                <p class="mb-0 text-danger">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Anda akan logout otomatis, password baru berlaku setelah login ulang.
                </p>
            </div>
        </div>
    </div>
</div>