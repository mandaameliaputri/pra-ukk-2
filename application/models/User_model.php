<?php
class User_model extends CI_Model {

    public function cek_login($username, $password) {
        return $this->db->get_where('users', array(
            'username' => $username,
            'password' => $password
        ))->row();
    }

    public function get_siswa() {
        return $this->db->get_where('users', array('level' => 'siswa'))->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('users', array('id_user' => $id))->row();
    }

    public function tambah($data) {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    public function hapus($id) {
        return $this->db->delete('users', array('id_user' => $id));
    }
}