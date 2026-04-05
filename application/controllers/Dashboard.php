<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Dashboard Controller
 * @property CI_Session $session
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    // Redirect berdasarkan level
    public function index() {
        $level = $this->session->userdata('level');
        
        if ($level == 'admin') {
            redirect('admin');
        } else {
            redirect('siswa');
        }
    }
}
?>