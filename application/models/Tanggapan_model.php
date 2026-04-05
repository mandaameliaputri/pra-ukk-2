<?php
class Tanggapan_model extends CI_Model {

    public function get_by_pengaduan($id) {
        return $this->db->get_where('tanggapan', array('id_pengaduan' => $id))->row();
    }

    public function tambah($data) {
        return $this->db->insert('tanggapan', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_pengaduan', $id);
        return $this->db->update('tanggapan', $data);
    }
}