<?php

class Model_siswa extends CI_Model{
    public function tampil_data()
    {
        return $this->db->get('tbl_siswa');
    }

    public function tambah_siswa($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_siswa($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function setStatus1($data, $table){
        $this->db->update($table,$data);
    }

    public function setStatus2($data, $table){
        $this->db->update($table,$data);
    }

    public function sort($keyword){
        $this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->like('kelas',$keyword);
		return $this->db->get()->result();
    }
}