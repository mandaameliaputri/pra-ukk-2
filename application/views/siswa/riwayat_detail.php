<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
    <a href="<?= base_url('siswa/riwayat') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row">
    <!-- Detail Pengaduan -->
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Pengaduan</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">Tanggal</th>
                        <td><?= date('d/m/Y H:i', strtotime($row->tgl_pengaduan)) ?></td>
                    </tr>
                    <tr>
                        <th>Sarana</th>
                        <td><?= $row->nama_sarana ?> (<?= $row->lokasi ?>)</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php if($row->status == '0'): ?>
                                <span class="badge badge-warning">Menunggu</span>
                            <?php elseif($row->status == 'proses'): ?>
                                <span class="badge badge-primary">Diproses</span>
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
                            <?php if(empty($row->foto)): ?>
                                <div class="alert alert-secondary mb-0">
                                    <i class="fas fa-image"></i> Tidak ada foto bukti
                                </div>
                            <?php elseif(!file_exists(FCPATH.'uploads/'.$row->foto)): ?>
                                <div class="alert alert-warning mb-0">
                                    <i class="fas fa-exclamation-triangle"></i> File foto tidak ditemukan
                                </div>
                            <?php else: ?>
                                <img src="<?= base_url('uploads/'.$row->foto) ?>" 
                                     class="img-fluid img-thumbnail" 
                                     style="max-width: 300px; cursor: pointer;"
                                     onclick="window.open(this.src, '_blank')">
                                <br>
                                <small class="text-muted">Klik gambar untuk memperbesar</small>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Tanggapan & Aksi -->
    <div class="col-md-4">
        <!-- Tanggapan Admin -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tanggapan Admin</h6>
            </div>
            <div class="card-body">
                <?php if(isset($tanggapan) && !empty($tanggapan->isi_tanggapan)): ?>
                    <div class="alert alert-info">
                        <p><?= nl2br($tanggapan->isi_tanggapan) ?></p>
                        <hr>
                        <small class="text-muted">
                            Ditanggapi: <?= date('d/m/Y H:i', strtotime($tanggapan->tgl_tanggapan)) ?>
                        </small>
                    </div>
                <?php else: ?>
                    <div class="alert alert-secondary">
                        <i class="fas fa-info-circle"></i> 
                        Belum ada tanggapan dari admin.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tombol Batalkan -->
        <?php if($row->status == '0'): ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <a href="<?= base_url('siswa/batalkan/'.$row->id_pengaduan) ?>" 
                   class="btn btn-danger btn-block" 
                   onclick="return confirm('Yakin ingin membatalkan pengaduan ini?')">
                    <i class="fas fa-times"></i> Batalkan Pengaduan
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Script Konfirmasi -->
<script>
function confirmBatal() {
    return confirm('Yakin ingin membatalkan pengaduan ini?');
}
</script>