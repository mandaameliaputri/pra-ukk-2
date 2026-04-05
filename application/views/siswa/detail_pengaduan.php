<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    <a href="<?= base_url('siswa/riwayat') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<!-- Detail Pengaduan dan Tanggapan -->
<div class="row">
    <!-- Informasi Pengaduan -->
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-alt mr-2"></i>Detail Pengaduan
                </h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">Tanggal</th>
                        <td><?= date('d/m/Y H:i', strtotime($pengaduan->tgl_pengaduan)) ?></td>
                    </tr>
                    <tr>
                        <th>Sarana</th>
                        <td><?= $pengaduan->nama_sarana ?> - <?= $pengaduan->lokasi ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php if($pengaduan->status == '0'): ?>
                                <span class="badge badge-warning">Menunggu</span>
                            <?php elseif($pengaduan->status == 'proses'): ?>
                                <span class="badge badge-primary">Diproses</span>
                            <?php else: ?>
                                <span class="badge badge-success">Selesai</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Isi Pengaduan</th>
                        <td><?= nl2br($pengaduan->isi_pengaduan) ?></td>
                    </tr>
                    <?php if($pengaduan->foto): ?>
                    <tr>
                        <th>Foto Bukti</th>
                        <td>
                            <a href="<?= base_url('uploads/'.$pengaduan->foto) ?>" target="_blank">
                                <img src="<?= base_url('uploads/'.$pengaduan->foto) ?>" width="300" class="img-thumbnail">
                            </a>
                            <small class="d-block mt-1 text-muted">Klik gambar untuk memperbesar</small>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Tanggapan Admin -->
    <div class="col-md-4">
        <?php if(isset($tanggapan)): ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-reply mr-2"></i>Tanggapan Admin
                </h6>
            </div>
            <div class="card-body">
                <p><?= nl2br($tanggapan->isi_tanggapan) ?></p>
                <hr>
                <small class="text-muted">
                    <i class="far fa-clock mr-1"></i><?= date('d/m/Y H:i', strtotime($tanggapan->tgl_tanggapan)) ?>
                </small>
            </div>
        </div>
        <?php else: ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="alert alert-info mb-0">
                    <i class="fas fa-info-circle mr-2"></i>Belum ada tanggapan dari admin.
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>