<?php
/**
 * Admin Controller
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property User_model $User_model
 * @property Sarana_model $Sarana_model
 * @property Pengaduan_model $Pengaduan_model
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login') || $this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('User_model');
        $this->load->model('Sarana_model');
        $this->load->model('Pengaduan_model');
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['content'] = 'admin/dashboard';
        
        // Total data
        $data['total_siswa'] = $this->db->where('level', 'siswa')->count_all_results('users'); 
        $data['total_sarana'] = $this->db->count_all('sarana');
        $data['total_pengaduan'] = $this->db->count_all('pengaduan');
        
        // Statistik status
        $data['pengaduan_baru'] = $this->db->where('status', '0')->count_all_results('pengaduan');
        $data['pengaduan_proses'] = $this->db->where('status', 'proses')->count_all_results('pengaduan');
        $data['pengaduan_selesai'] = $this->db->where('status', 'selesai')->count_all_results('pengaduan');
        
        // Pengaduan terbaru
        $this->db->select('p.*, u.nama_lengkap, s.nama_sarana');
        $this->db->from('pengaduan p');
        $this->db->join('users u', 'p.id_user = u.id_user');
        $this->db->join('sarana s', 'p.id_sarana = s.id_sarana');
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        $this->db->limit(5);
        $data['pengaduan_terbaru'] = $this->db->get()->result();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view($data['content']);
        $this->load->view('template/footer');
    }

    // SARANA 
    public function sarana() {
        $data['title'] = 'Data Sarana';
        $data['content'] = 'admin/sarana';
        $data['sarana'] = $this->Sarana_model->get_all();
        $this->_view($data);
    }

    public function sarana_tambah() {
        $data['title'] = 'Tambah Sarana';
        $data['content'] = 'admin/sarana_form';
        $this->_view($data);
    }

    public function sarana_simpan() {
    $jumlah_total = $this->input->post('jumlah_total');
    $jumlah_rusak = $this->input->post('jumlah_rusak');

    if($jumlah_rusak > $jumlah_total){
        $this->session->set_flashdata('error', 'Jumlah rusak tidak boleh lebih dari jumlah total!');
        redirect('admin/sarana_tambah');
    }

    $kondisi = ($jumlah_rusak == 0) ? 'Baik' :
           (($jumlah_rusak < $jumlah_total) ? 'Rusak sebagian' : 'Rusak');

    $data = array(
        'kode_sarana' => $this->input->post('kode_sarana'),
        'nama_sarana' => $this->input->post('nama_sarana'),
        'lokasi' => $this->input->post('lokasi'),
        'jumlah_total' => $jumlah_total,
        'jumlah_rusak' => $jumlah_rusak,
        'kondisi' => $kondisi,
        'keterangan' => $this->input->post('keterangan')
    );
    
    if ($this->Sarana_model->get_by_kode($data['kode_sarana'])) {
        $this->session->set_flashdata('error', 'Kode sarana sudah digunakan');
        redirect('admin/sarana_tambah');
    }
    
    $this->Sarana_model->tambah($data);
    $this->session->set_flashdata('success', 'Data tersimpan');
    redirect('admin/sarana');
}

    public function sarana_edit($id) {
        $data['title'] = 'Edit Sarana';
        $data['content'] = 'admin/sarana_form';
        $data['row'] = $this->Sarana_model->get_by_id($id);
        $this->_view($data);
    }

    public function sarana_update($id) {
    $jumlah_total = $this->input->post('jumlah_total');
    $jumlah_rusak = $this->input->post('jumlah_rusak');

    if($jumlah_rusak > $jumlah_total){
        $this->session->set_flashdata('error', 'Jumlah rusak tidak boleh lebih dari jumlah total!');
        redirect('admin/sarana_edit/'.$id);
    }

    $kondisi = ($jumlah_rusak == 0) ? 'Baik' :
           (($jumlah_rusak < $jumlah_total) ? 'Rusak sebagian' : 'Rusak');

    $data = array(
        'kode_sarana' => $this->input->post('kode_sarana'),
        'nama_sarana' => $this->input->post('nama_sarana'),
        'lokasi' => $this->input->post('lokasi'),
        'jumlah_total' => $jumlah_total,
        'jumlah_rusak' => $jumlah_rusak,
        'kondisi' => $kondisi,
        'keterangan' => $this->input->post('keterangan')
    );

    $this->Sarana_model->update($id, $data);
    $this->session->set_flashdata('success', 'Data diupdate');
    redirect('admin/sarana');
}
    public function sarana_hapus($id) {
        $this->Sarana_model->hapus($id);
        $this->session->set_flashdata('success', 'Data dihapus');
        redirect('admin/sarana');
    }

    public function get_kode_sarana($prefix) {
        $this->db->like('kode_sarana', $prefix . '-', 'after');
        $this->db->order_by('kode_sarana', 'DESC');
        $last = $this->db->get('sarana', 1)->row();
        
        if ($last) {
            $last_num = intval(substr($last->kode_sarana, -2));
            $new_num = $last_num + 1;
        } else {
            $new_num = 1;
        }
        
        $kode = $prefix . '-' . str_pad($new_num, 2, '0', STR_PAD_LEFT);
        echo json_encode(['kode' => $kode]);
    }

    // SISWA
    public function siswa() {
        $data['title'] = 'Data Siswa';
        $data['content'] = 'admin/siswa';
        $data['siswa'] = $this->User_model->get_siswa();
        $this->_view($data);
    }

    public function siswa_tambah() {
        $data['title'] = 'Tambah Siswa';
        $data['content'] = 'admin/siswa_form';
        $this->_view($data);
    }

    public function siswa_simpan() {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5('123456'),
            'level' => 'siswa'
        );
        $this->User_model->tambah($data);
        $this->session->set_flashdata('success', 'Siswa ditambahkan');
        redirect('admin/siswa');
    }

    public function siswa_edit($id) {
        $data['title'] = 'Edit Siswa';
        $data['content'] = 'admin/siswa_form';
        $data['row'] = $this->User_model->get_by_id($id);
        $this->_view($data);
    }

    public function siswa_update($id) {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username')
        );
        $this->User_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data diupdate');
        redirect('admin/siswa');
    }

    public function siswa_reset($id) {
        $this->User_model->update($id, array('password' => md5('123456')));
        $this->session->set_flashdata('success', 'Password direset');
        redirect('admin/siswa');
    }

    public function siswa_hapus($id) {
        $this->User_model->hapus($id);
        $this->session->set_flashdata('success', 'Siswa dihapus');
        redirect('admin/siswa');
    }

    // PENGADUAN 
    public function pengaduan() {
        $data['title'] = 'Data Pengaduan';
        $data['content'] = 'admin/pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_all();
        $this->_view($data);
    }

    public function pengaduan_detail($id) {
        $data['title'] = 'Detail Pengaduan';
        $data['content'] = 'admin/pengaduan_detail';
        $data['row'] = $this->Pengaduan_model->get_detail($id);
        $data['tanggapan'] = $this->Pengaduan_model->get_tanggapan($id);
        $this->_view($data);
    }

    public function pengaduan_hapus($id) {
        if (!$this->Pengaduan_model->get_detail($id)) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan');
            redirect('admin/pengaduan');
        }
        
        $this->db->delete('tanggapan', array('id_pengaduan' => $id));
        $this->Pengaduan_model->hapus($id);
        $this->session->set_flashdata('success', 'Pengaduan dihapus');
        redirect('admin/pengaduan');
    }

    public function pengaduan_status($id) {
        $status = $this->input->post('status');
        $this->Pengaduan_model->update_status($id, $status);
        
        $tanggapan = '';
        if ($status == 'proses') {
            $tanggapan = 'Sedang dalam proses perbaikan, mohon menunggu.';
        } elseif ($status == 'selesai') {
            $tanggapan = 'Pengaduan telah selesai diperbaiki. Terima kasih.';
        }
        
        $manual = $this->input->post('tanggapan');
        if (!empty($manual)) {
            $tanggapan = $manual;
        }
        
        if (!empty($tanggapan)) {
            $data = array(
                'id_pengaduan' => $id,
                'id_user' => $this->session->userdata('id_user'),
                'isi_tanggapan' => $tanggapan
            );
            
            if ($this->Pengaduan_model->get_tanggapan($id)) {
                $this->Pengaduan_model->update_tanggapan($id, array('isi_tanggapan' => $tanggapan));
            } else {
                $this->Pengaduan_model->tambah_tanggapan($data);
            }
        }
        
        $this->session->set_flashdata('success', 'Status diupdate');
        redirect('admin/pengaduan');
    }

    // LAINNYA 
    public function laporan() {
        $data['title'] = 'Cetak Laporan';
        $data['content'] = 'admin/laporan';
        $data['total_pengaduan'] = $this->db->count_all('pengaduan');
        $this->_view($data);
    }

    public function ganti_password() {
        $data['title'] = 'Ganti Password';
        $data['content'] = 'admin/ganti_password';
        $this->_view($data);
    }

    public function update_password() {
        $id = $this->session->userdata('id_user');
        $lama = md5($this->input->post('password_lama'));
        $baru = md5($this->input->post('password_baru'));
        $konfirmasi = md5($this->input->post('konfirmasi'));
        
        if ($baru != $konfirmasi) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak sama');
            redirect('admin/ganti_password');
        }
        
        $user = $this->User_model->get_by_id($id);
        if ($user->password == $lama) {
            $this->User_model->update($id, array('password' => $baru));
            $this->session->set_flashdata('success', 'Password diganti');
            redirect('auth/logout');
        } else {
            $this->session->set_flashdata('error', 'Password lama salah');
            redirect('admin/ganti_password');
        }
    }

    // HELPER 
    private function _view($data) {
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view($data['content']);
        $this->load->view('template/footer');
    }
}