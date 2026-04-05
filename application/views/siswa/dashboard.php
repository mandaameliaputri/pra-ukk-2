<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Siswa</h1>
</div>

<!-- Selamat Datang Siswa -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-user-circle mr-2"></i>Selamat Datang
                </h6>
            </div>
            <div class="card-body">
                <p class="mb-0">Halo <strong><?= $this->session->userdata('nama') ?></strong>, selamat datang di SiLaporSekolah.</p>
                <p class="mb-0 mt-2 text-muted"><small>Anda login sebagai Siswa</small></p>
            </div>
        </div>
    </div>
</div>

<!-- Ringkasan Data -->
<div class="row">
    <!-- Total Sarana -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sarana</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_sarana ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pengaduanku -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengaduanku</div>
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

<!-- Status Pengaduanku -->
<div class="row">
    <!-- Menunggu -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan_baru ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Diproses -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Diproses</div>
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

<!-- Daftar Pengaduan Terbaru -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-history mr-2"></i>Pengaduan Terbaruku
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Sarana</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($pengaduan_terbaru)): ?>
                                <tr><td colspan="4" class="text-center">Belum ada pengaduan</td></tr>
                            <?php else: ?>
                                <?php foreach($pengaduan_terbaru as $p): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($p->tgl_pengaduan)) ?></td>
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