<?php
class Sarana_model extends CI_Model {

    public function get_all() {
        return $this->db->order_by('kode_sarana', 'ASC')->get('sarana')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('sarana', array('id_sarana' => $id))->row();
    }

    public function tambah($data) {
        return $this->db->insert('sarana', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_sarana', $id);
        return $this->db->update('sarana', $data);
    }

    public function hapus($id) {
        return $this->db->delete('sarana', array('id_sarana' => $id));
    }
    public function get_by_kode($kode) {
    return $this->db->get_where('sarana', array('kode_sarana' => $kode))->row();
}
}