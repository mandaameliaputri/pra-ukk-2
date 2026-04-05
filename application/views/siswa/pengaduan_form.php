<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buat Pengaduan</h1>
</div>

<!-- Form Pengaduan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Pengaduan</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('siswa/pengaduan_simpan') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pilih Sarana</label>
                <select class="form-control" name="id_sarana" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach($sarana as $s): ?>
                    <option value="<?= $s->id_sarana ?>"><?= $s->kode_sarana ?> - <?= $s->nama_sarana ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Isi Pengaduan</label>
                <textarea class="form-control" name="isi_pengaduan" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label>Foto (Opsional)</label>
                <input type="file" class="form-control-file" name="foto" accept="image/*">
                <small class="text-muted">Format: JPG/PNG, Max: 2MB</small>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>