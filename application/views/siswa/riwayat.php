<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Pengaduan</h1>
</div>

<!-- Tabel Riwayat Pengaduan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan</h6>
    </div>
    <div class="card-body">
        <?php if(empty($pengaduan)): ?>
            <div class="alert alert-info">Belum ada pengaduan.</div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Sarana</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($pengaduan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($p->tgl_pengaduan)) ?></td>
                        <td><?= $p->nama_sarana ?></td>
                        <td>
                            <?php if($p->status == '0'): ?>
                                <span class="badge badge-warning">Menunggu</span>
                            <?php elseif($p->status == 'proses'): ?>
                                <span class="badge badge-primary">Diproses</span>
                            <?php else: ?>
                                <span class="badge badge-success">Selesai</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('siswa/detail/'.$p->id_pengaduan) ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <?php if($p->status == '0'): ?>
                                <a href="<?= base_url('siswa/batalkan/'.$p->id_pengaduan) ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Yakin ingin membatalkan pengaduan ini?')">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>