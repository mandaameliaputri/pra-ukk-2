<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengaduan</h1>
</div>

<!-- Tabel Pengaduan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaduan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelapor</th>
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
                        <td><?= $p->nama_lengkap ?> <br><small><?= $p->nis ?></small></td>
                        <td><?= $p->nama_sarana ?></td>
                        <td>
                            <?php if($p->status == '0'): ?>
                                <span class="badge badge-warning">Baru</span>
                            <?php elseif($p->status == 'proses'): ?>
                                <span class="badge badge-primary">Diproses</span>
                            <?php else: ?>
                                <span class="badge badge-success">Selesai</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/pengaduan_detail/'.$p->id_pengaduan) ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('admin/pengaduan_hapus/'.$p->id_pengaduan) ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Hapus pengaduan ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>