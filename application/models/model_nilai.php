<?php

class Model_nilai extends CI_Model{
    public function tampil_data()
    {
        return $this->db->get('tbl_nilai');
    }
}