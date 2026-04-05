<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= isset($row) ? 'Edit' : 'Tambah' ?> Sarana</h1>
    <a href="<?= base_url('admin/sarana') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Sarana</h6>
  </div>
  <div class="card-body">
    <form action="<?= base_url(isset($row) ? 'admin/sarana_update/'.$row->id_sarana : 'admin/sarana_simpan') ?>" method="post">

      <div class="form-group">
        <label>Nama Sarana</label>
        <input type="text" name="nama_sarana" id="nama_sarana" class="form-control"
               value="<?= isset($row) ? $row->nama_sarana : '' ?>" required
               <?= isset($row) ? 'readonly' : 'oninput="generateKode()"' ?>>
      </div>

      <div class="form-group">
        <label>Kode Sarana</label>
        <input type="text" name="kode_sarana" id="kode_sarana" class="form-control"
               value="<?= isset($row) ? $row->kode_sarana : '' ?>" required readonly>
      </div>

      <div class="form-group">
        <label>Lokasi</label>
        <select name="lokasi" class="form-control" required>
          <option value="">-- Pilih Lokasi --</option>
          <?php
          $lokasi_list = ['Ruang X','Ruang XI','Ruang XII','Ruang XII RPL','Lab Komputer','Lab RPL','Lab TKJ','Perpustakaan','Ruang Guru','Ruang TU','Aula','Mushola','Kantin','Lapangan','Gudang'];
          foreach($lokasi_list as $lok){
              $sel = (isset($row) && $row->lokasi==$lok)?'selected':'';
              echo "<option value='$lok' $sel>$lok</option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Jumlah Total</label>
        <input type="number" name="jumlah_total" id="jumlah_total" class="form-control"
               value="<?= isset($row)?$row->jumlah_total:'' ?>" min="0" required oninput="hitungKondisi()">
      </div>

      <div class="form-group">
        <label>Jumlah Rusak</label>
        <input type="number" name="jumlah_rusak" id="jumlah_rusak" class="form-control"
               value="<?= isset($row)?$row->jumlah_rusak:'' ?>" min="0" required oninput="hitungKondisi()">
      </div>

      <div class="form-group">
        <label>Kondisi</label>
        <input type="text" name="kondisi" id="kondisi" class="form-control"
               value="<?= isset($row)?$row->kondisi:'' ?>" readonly>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>

<script>
function generateKode(){
  let nama = document.getElementById('nama_sarana').value;
  if(nama.length<3) return;
  fetch('<?= base_url('admin/get_kode_sarana/') ?>'+nama.substring(0,3).toUpperCase())
    .then(r=>r.json()).then(d=>document.getElementById('kode_sarana').value=d.kode);
}

function hitungKondisi(){
  let total = parseInt(document.getElementById('jumlah_total').value)||0;
  let rusak = parseInt(document.getElementById('jumlah_rusak').value)||0;
  let kondisi = rusak==0?'Baik': (rusak<total?'Rusak sebagian':'Rusak');
  document.getElementById('kondisi').value = kondisi;
}

window.onload = hitungKondisi;
</script>