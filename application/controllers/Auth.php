<?php
/**
 * Auth Controller
 * @property CI_Session $session
 * @property CI_Input $input
 * @property User_model $User_model
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        if ($this->session->userdata('login')) {
            redirect($this->session->userdata('level'));
        }
        $this->load->view('auth/login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $user = $this->User_model->cek_login($username, $password);
        
        if ($user) {
            $session = array(
                'id_user' => $user->id_user,
                'nama' => $user->nama_lengkap,
                'level' => $user->level,
                'login' => true
            );
            $this->session->set_userdata($session);
            redirect($user->level);
        } else {
            $this->session->set_flashdata('error', 'Username/password salah');
            redirect('auth');
        }
    }

    public function register() {
        $this->load->view('auth/register');
    }

    public function daftar() {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => 'siswa'
        );
        
        $this->User_model->tambah($data);
        $this->session->set_flashdata('success', 'Registrasi berhasil');
        redirect('auth');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('landing');
    }
}