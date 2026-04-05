<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Sarana</h1>
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
                        if($s->kondisi == 'Baik') {
                            echo '<span class="badge badge-success">Baik</span>';
                        } elseif($s->kondisi == 'Rusak sebagian') {
                            echo '<span class="badge badge-warning">Rusak sebagian</span>';
                        } else {
                            echo '<span class="badge badge-danger">Rusak</span>';
                        }
                        ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>