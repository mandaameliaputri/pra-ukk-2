<?php
class Pengaduan_model extends CI_Model {

   public function get_all() {
    $this->db->select('p.*, u.nama_lengkap, u.nis, s.nama_sarana, s.lokasi'); // Tambahkan s.lokasi
    $this->db->from('pengaduan p');
    $this->db->join('users u', 'p.id_user = u.id_user');
    $this->db->join('sarana s', 'p.id_sarana = s.id_sarana');
    $this->db->order_by('p.tgl_pengaduan', 'DESC');
    return $this->db->get()->result();
}

    public function get_by_user($id_user) {
        $this->db->select('p.*, s.nama_sarana');
        $this->db->from('pengaduan p');
        $this->db->join('sarana s', 'p.id_sarana = s.id_sarana');
        $this->db->where('p.id_user', $id_user);
        $this->db->order_by('p.tgl_pengaduan', 'DESC');
        return $this->db->get()->result();
    }

    // Cek apakah pengaduan milik siswa tertentu
public function cek_milik_siswa($id_pengaduan, $id_user) {
    $this->db->where('id_pengaduan', $id_pengaduan);
    $this->db->where('id_user', $id_user);
    return $this->db->get('pengaduan')->row();
}

    public function get_detail($id) {
    $this->db->select('p.*, u.nama_lengkap, u.nis, s.nama_sarana, s.lokasi');
    $this->db->from('pengaduan p');
    $this->db->join('users u', 'p.id_user = u.id_user');
    $this->db->join('sarana s', 'p.id_sarana = s.id_sarana');
    $this->db->where('p.id_pengaduan', $id);
    return $this->db->get()->row();
}

    public function get_tanggapan($id) {
        return $this->db->get_where('tanggapan', array('id_pengaduan' => $id))->row();
    }

    public function tambah($data) {
        return $this->db->insert('pengaduan', $data);
    }

    public function tambah_tanggapan($data) {
        return $this->db->insert('tanggapan', $data);
    }

    public function update_tanggapan($id, $data) {
        $this->db->where('id_pengaduan', $id);
        return $this->db->update('tanggapan', $data);
    }

    public function update_status($id, $status) {
        $this->db->where('id_pengaduan', $id);
        return $this->db->update('pengaduan', array('status' => $status));
    }

    // Hapus pengaduan dan tanggapan terkait
public function hapus($id) {
    // Hapus tanggapan terkait (jika ada)
    $this->db->delete('tanggapan', array('id_pengaduan' => $id));
    
    // Hapus pengaduan
    $this->db->where('id_pengaduan', $id);
    return $this->db->delete('pengaduan');
}
}