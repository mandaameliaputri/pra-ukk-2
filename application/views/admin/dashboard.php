<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
</div>

<!-- Selamat Datang Admin -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-circle mr-2"></i>Selamat Datang
                </h6>
            </div>
            <div class="card-body">
                <p class="mb-0">Halo <strong>Administrator</strong>, selamat datang di panel admin SiLaporSekolah.</p>
                <p class="mb-0 mt-2 text-muted"><small>Anda login sebagai Administrator</small></p>
            </div>
        </div>
    </div>
</div>

<!-- Content Row - Kartu Statistik Utama -->
<div class="row">
    <!-- Total Siswa -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_siswa ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Sarana -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sarana</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_sarana ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pengaduan -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengaduan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pengaduan ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row - Statistik Status Pengaduan -->
<div class="row">
    <!-- Pengaduan Baru -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengaduan Baru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_baru ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dalam Proses -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dalam Proses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_proses ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Selesai -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_selesai ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Baris Pengaduan Terbaru -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-history mr-2"></i>Pengaduan Terbaru
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Siswa</th>
                                <th>Sarana</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($pengaduan_terbaru)): ?>
                                <tr><td colspan="5" class="text-center">Belum ada pengaduan</td></tr>
                            <?php else: ?>
                                <?php foreach($pengaduan_terbaru as $p): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($p->tgl_pengaduan)) ?></td>
                                    <td><?= $p->nama_lengkap ?></td>
                                    <td><?= $p->nama_sarana ?></td>
                                    <td>
                                        <?php if($p->status == '0'): ?>
                                            <span class="badge badge-warning">Baru</span>
                                        <?php elseif($p->status == 'proses'): ?>
                                            <span class="badge badge-primary">Proses</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Selesai</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/pengaduan_detail/'.$p->id_pengaduan) ?>" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>