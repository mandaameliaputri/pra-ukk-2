<?php
/**
 * Siswa Controller
 * @property CI_DB_query_builder $db
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Upload $upload
 * @property Sarana_model $Sarana_model
 * @property Pengaduan_model $Pengaduan_model
 * @property User_model $User_model
 */
class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login') || $this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('Sarana_model');
        $this->load->model('Pengaduan_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['title'] = 'Dashboard Siswa';
        $data['content'] = 'siswa/dashboard';
        
        $id_user = $this->session->userdata('id_user');
        
        // Total data
        $data['total_sarana'] = $this->db->count_all('sarana');
        $data['total_pengaduan'] = $this->db->where('id_user', $id_user)->count_all_results('pengaduan');
        
        // Statistik status
        $data['pengaduan_baru'] = $this->db->where('id_user', $id_user)->where('status', '0')->count_all_results('pengaduan');
        $data['pengaduan_proses'] = $this->db->where('id_user', $id_user)->where('status', 'proses')->count_all_results('pengaduan');
        $data['pengaduan_selesai'] = $this->db->where('id_user', $id_user)->where('status', 'selesai')->count_all_results('pengaduan');
        
        // Pengaduan terbaru
        $this->db->select('p.*, s.nama_sarana');
        $this->db->from('pengaduan p');
        $this->db->join('sarana s', 'p.id_sarana = s.id_sarana');
        $this->db->where('p.id_user', $id_user);
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        $this->db->limit(5);
        $data['pengaduan_terbaru'] = $this->db->get()->result();
        
        $this->_view($data);
    }

    public function sarana() {
        $data['title'] = 'Data Sarana';
        $data['content'] = 'siswa/sarana';
        $data['sarana'] = $this->Sarana_model->get_all();
        $this->_view($data);
    }

    public function pengaduan() {
        $data['title'] = 'Buat Pengaduan';
        $data['content'] = 'siswa/pengaduan_form';
        $data['sarana'] = $this->Sarana_model->get_all();
        $this->_view($data);
    }

    public function pengaduan_simpan() {
        // Upload foto
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = true;
        
        $this->load->library('upload', $config);
        $foto = '';
        
        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
        }
        
        // Simpan pengaduan
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_sarana' => $this->input->post('id_sarana'),
            'isi_pengaduan' => $this->input->post('isi_pengaduan'),
            'foto' => $foto,
            'status' => '0'
        );
        
        $this->Pengaduan_model->tambah($data);
        $this->session->set_flashdata('success', 'Pengaduan terkirim');
        redirect('siswa/riwayat');
    }

    public function riwayat() {
        $data['title'] = 'Riwayat Pengaduan';
        $data['content'] = 'siswa/riwayat';
        $data['pengaduan'] = $this->Pengaduan_model->get_by_user($this->session->userdata('id_user'));
        $this->_view($data);
    }

    public function detail($id) {
        $data['title'] = 'Detail Pengaduan';
        $data['content'] = 'siswa/riwayat_detail';
        $data['row'] = $this->Pengaduan_model->get_detail($id);
        $data['tanggapan'] = $this->Pengaduan_model->get_tanggapan($id);
        $this->_view($data);
    }

    public function batalkan($id) {
        $id_user = $this->session->userdata('id_user');
        $pengaduan = $this->Pengaduan_model->cek_milik_siswa($id, $id_user);
        
        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan');
            redirect('siswa/riwayat');
        }
        
        if ($pengaduan->status != '0') {
            $this->session->set_flashdata('error', 'Tidak dapat membatalkan pengaduan yang sudah diproses');
            redirect('siswa/riwayat');
        }
        
        $this->db->delete('tanggapan', array('id_pengaduan' => $id));
        $this->Pengaduan_model->hapus($id);
        
        $this->session->set_flashdata('success', 'Pengaduan berhasil dibatalkan');
        redirect('siswa/riwayat');
    }

    public function ganti_password() {
        $data['title'] = 'Ganti Password';
        $data['content'] = 'siswa/ganti_password';
        $this->_view($data);
    }

    public function update_password() {
        $id = $this->session->userdata('id_user');
        $lama = md5($this->input->post('password_lama'));
        $baru = md5($this->input->post('password_baru'));
        
        $user = $this->User_model->get_by_id($id);
        
        if ($user->password == $lama) {
            $this->User_model->update($id, array('password' => $baru));
            $this->session->set_flashdata('success', 'Password diganti, silahkan login ulang');
            redirect('auth/logout');
        } else {
            $this->session->set_flashdata('error', 'Password lama salah');
            redirect('siswa/ganti_password');
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