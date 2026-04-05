<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    <a href="<?= base_url('admin/siswa_tambah') ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Siswa
    </a>
</div>

<!-- Tabel Siswa -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($siswa as $s): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $s->nis ?></td>
                        <td><?= $s->nama_lengkap ?></td>
                        <td><?= $s->username ?></td>
                        <td>
                            <a href="<?= base_url('admin/siswa_edit/'.$s->id_user) ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/siswa_reset/'.$s->id_user) ?>" class="btn btn-info btn-sm" onclick="return confirm('Reset password jadi 123456?')">
                                <i class="fas fa-key"></i>
                            </a>
                            <a href="<?= base_url('admin/siswa_hapus/'.$s->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
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