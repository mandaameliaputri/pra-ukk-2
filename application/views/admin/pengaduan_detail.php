<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
    <a href="<?= base_url('admin/pengaduan') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row">
    <!-- Detail Pengaduan -->
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Pengaduan</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">Tanggal</th>
                        <td><?= date('d/m/Y H:i', strtotime($row->tgl_pengaduan)) ?></td>
                    </tr>
                    <tr>
                        <th>Pelapor</th>
                        <td><?= $row->nama_lengkap ?> (<?= $row->nis ?>)</td>
                    </tr>
                    <tr>
                        <th>Sarana</th>
                        <td><?= $row->nama_sarana ?> - <?= $row->lokasi ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php if($row->status == '0'): ?>
                                <span class="badge badge-warning">Baru</span>
                            <?php elseif($row->status == 'proses'): ?>
                                <span class="badge badge-primary">Proses</span>
                            <?php else: ?>
                                <span class="badge badge-success">Selesai</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Isi Pengaduan</th>
                        <td><?= nl2br($row->isi_pengaduan) ?></td>
                    </tr>
                    <tr>
                        <th>Foto Bukti</th>
                        <td>
                            <?php if(!empty($row->foto) && file_exists(FCPATH.'uploads/'.$row->foto)): ?>
                                <img src="<?= base_url('uploads/'.$row->foto) ?>" 
                                     class="img-fluid img-thumbnail" 
                                     style="max-width: 400px;">
                                <br>
                                <small class="text-muted"><?= $row->foto ?></small>
                            <?php else: ?>
                                <i>Tidak ada foto</i>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Status -->
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Status</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/pengaduan_status/'.$row->id_pengaduan) ?>" method="post">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="0" <?= $row->status == '0' ? 'selected' : '' ?>>Baru</option>
                            <option value="proses" <?= $row->status == 'proses' ? 'selected' : '' ?>>Diproses</option>
                            <option value="selesai" <?= $row->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggapan</label>
                        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="4"><?= @$tanggapan->isi_tanggapan ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
                <hr>
                <a href="<?= base_url('admin/pengaduan_hapus/'.$row->id_pengaduan) ?>" 
                   class="btn btn-danger btn-block" 
                   onclick="return confirm('Yakin hapus?')">
                    <i class="fas fa-trash"></i> Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('status').onchange = function() {
    var tanggapan = document.getElementById('tanggapan');
    var pesan = {
        'proses': 'Pengaduan sedang dalam proses perbaikan.',
        'selesai': 'Pengaduan telah selesai diperbaiki.',
        '0': ''
    };
    if(pesan[this.value]) tanggapan.value = pesan[this.value];
}
</script>