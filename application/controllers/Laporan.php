<?php
class Laporan extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login') || $this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('Pengaduan_model');
    }

    // Cetak semua pengaduan
    public function cetak() {
        $data['pengaduan'] = $this->Pengaduan_model->get_all();
        $data['judul'] = 'LAPORAN SEMUA PENGADUAN';
        $this->load->view('laporan/cetak', $data);
    }

    // Cetak laporan bulanan (tambahan)
    public function bulanan() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        
        if (!$bulan || !$tahun) {
            redirect('admin/laporan');
        }
        
        $data['pengaduan'] = $this->Pengaduan_model->get_by_month($bulan, $tahun);
        
        $nama_bulan = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
        
        $data['judul'] = 'LAPORAN BULAN ' . $nama_bulan[$bulan] . ' ' . $tahun;
        $this->load->view('laporan/cetak', $data);
    }
}
?>