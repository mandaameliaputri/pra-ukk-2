<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= isset($row) ? 'Edit' : 'Tambah' ?> Siswa</h1>
    <a href="<?= base_url('admin/siswa') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<!-- Form Siswa -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Siswa</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url(isset($row) ? 'admin/siswa_update/'.$row->id_user : 'admin/siswa_simpan') ?>" method="post">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" class="form-control" name="nis" value="<?= isset($row) ? $row->nis : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="<?= isset($row) ? $row->nama_lengkap : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?= isset($row) ? $row->username : '' ?>" required>
            </div>
            <?php if(!isset($row)): ?>
            <div class="alert alert-info">Password default: <strong>123456</strong></div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>