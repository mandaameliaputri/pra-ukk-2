<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Pengaduan - SiLaporSekolah</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h2 { margin: 0; color: #4e73df; }
        .header h3 { margin: 5px 0; font-weight: normal; }
        .header p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .footer { margin-top: 50px; }
        .footer-left { float: left; width: 50%; }
        .footer-right { float: right; width: 50%; text-align: right; }
        .clear { clear: both; }
        .total { margin-top: 20px; font-weight: bold; }
        .web-identity { font-size: 14px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h2><?= $judul ?></h2>
        <h3>SiLaporSekolah - Aplikasi Pengaduan Sarana Sekolah</h3>
        <p>SMK Igasar Pindad Bandung</p>
        <p>Jl. Cisaranten Kulon No. 17 Bandung</p>
        <?php if(isset($tanggal_awal) && isset($tanggal_akhir)): ?>
            <p>Periode: <?= $tanggal_awal ?> s/d <?= $tanggal_akhir ?></p>
        <?php endif; ?>
        <p>Tanggal Cetak: <?= date('d/m/Y H:i') ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Sarana</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($pengaduan)): ?>
                <tr><td colspan="6" style="text-align: center">Tidak ada data</td></tr>
            <?php else: ?>
                <?php $no=1; foreach($pengaduan as $p): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d/m/Y', strtotime($p->tgl_pengaduan)) ?></td>
                    <td><?= $p->nis ?></td>
                    <td><?= $p->nama_lengkap ?></td>
                    <td><?= $p->nama_sarana ?></td>
                    <td><?= $p->lokasi ?></td>
                    <td>
                        <?php 
                        if($p->status == '0') echo 'Baru';
                        elseif($p->status == 'proses') echo 'Diproses';
                        else echo 'Selesai';
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div class="total">
        Total Data: <?= count($pengaduan) ?> pengaduan
    </div>
    
    <div class="footer">
        <div class="footer-left">
            Mengetahui,<br>
            Kepala Sekolah<br>
            <br>
            <br>
            <br>
            <u>Rony Harimurti, S.Pd., M.M.</u><br>
            NIP. 73000016
        </div>
        <div class="footer-right">
            Bandung, <?= date('d F Y') ?><br>
            Petugas,<br>
            <br>
            <br>
            <br>
            <u>(____________________)</u>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="web-identity">
        <p style="text-align: center; margin-top: 20px;">
            <i>Dicetak dari SiLaporSekolah - Sistem Informasi Pengaduan Sarana Sekolah</i>
        </p>
    </div>
</body>
</html>