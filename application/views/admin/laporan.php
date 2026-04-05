<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cetak Laporan</h1>
    <a href="<?= base_url('admin') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<!-- Info Ringkas -->
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info">
            <i class="fas fa-info-circle mr-2"></i>
            Halaman ini digunakan untuk mencetak laporan pengaduan dalam format PDF.
            Total data <strong><?= $total_pengaduan ?></strong> pengaduan tersedia.
        </div>
    </div>
</div>

<!-- Tombol Cetak PDF -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-pdf mr-2"></i>Laporan Semua Pengaduan
                </h6>
            </div>
            <div class="card-body text-center py-5">
                <i class="fas fa-file-pdf fa-5x text-danger mb-4"></i>
                <h4 class="mb-3">Cetak Laporan PDF</h4>
                <p class="mb-4">Laporan akan menampilkan semua data pengaduan yang tersimpan dalam sistem.</p>
                <a href="<?= base_url('laporan/cetak') ?>" target="_blank" class="btn btn-success btn-lg px-5">
                    <i class="fas fa-print mr-2"></i> Cetak PDF Sekarang
                </a>
            </div>
        </div>
    </div>
</div>