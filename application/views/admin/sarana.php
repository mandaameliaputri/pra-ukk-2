<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Sarana</h1>
    <a href="<?= base_url('admin/sarana_tambah') ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Sarana
    </a>
</div>

<!-- Tabel Daftar Sarana -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Sarana</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Jumlah Total</th>
                        <th>Jumlah Rusak</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($sarana as $s): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $s->kode_sarana ?></td>
                        <td><?= $s->nama_sarana ?></td>
                        <td><?= $s->lokasi ?></td>
                        <td><?= $s->jumlah_total ?></td>
                        <td><?= $s->jumlah_rusak ?></td>
                        <td>
                            <?php
                            if($s->jumlah_rusak == 0):
                                $badge_class = 'success';
                                $label = 'Baik';
                            elseif($s->jumlah_rusak < $s->jumlah_total):
                                $badge_class = 'warning';
                                $label = 'Rusak sebagian';
                            else:
                                $badge_class = 'danger';
                                $label = 'Rusak';
                            endif;
                            ?>
                            <span class="badge badge-<?= $badge_class ?>"><?= $label ?></span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/sarana_edit/'.$s->id_sarana) ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/sarana_hapus/'.$s->id_sarana) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
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