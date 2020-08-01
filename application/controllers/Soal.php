<?php 

class Soal extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('email') == NULL)
        {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login !!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/login');
        }
    }
    
    public function index()
    {
        $data['soal'] = $this->model_soal->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('soal/v_soal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $soal = $this->input->post('soal');
        $a = $this->input->post('a');
        $b = $this->input->post('a');
        $c = $this->input->post('a');
        $d = $this->input->post('a');
        $j_benar = $this->input->post('j_benar');
        $gambar = $_FILES['gambar']['name'];
        if($gambar =''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal Di Upload";
            }else{
                $gambar = $this->upload->data('file_name');
            }
        }
        $quiz = $this->input->post('quiz');

        $data = array(
            'soal'    => $soal,
            'a'          => $a,
            'b'          => $b,
            'c'          => $c,
            'd'          => $d,
            'j_benar'          => $j_benar,
            'gambar'         => $gambar,
            'quiz'         => $quiz
        );

        $this->model_soal->tambah_soal($data, 'tbl_soal');
        redirect('soal/index');
    }

    public function edit($id_soal){
        $where = array('id_soal' => $id_soal);
        $data['soal'] = $this->model_soal->edit_soal($where, 'tbl_soal')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('soal/v_edit_soal', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id_soal = $this->input->post('id_soal');
        $soal = $this->input->post('soal');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $j_benar = $this->input->post('j_benar');
        $gambar = $_FILES['gambar']['name'];
        if($gambar =''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal Di Upload";
            }else{
                $gambar = $this->upload->data('file_name');
            }
        }
        $quiz = $this->input->post('quiz');

        $data = array(
            'soal'    => $soal,
            'a'          => $a,
            'b'          => $b,
            'c'          => $c,
            'd'          => $d,
            'j_benar'          => $j_benar,
            'gambar'         => $gambar,
            'quiz'         => $quiz
        );

        $where = array(
            'id_soal'    => $id_soal
        );

        $this->model_soal->update_data($where,$data,'tbl_soal');
        redirect('soal/index');

    }

    public function hapus($id_soal)
    {
        $where = array('id_soal' => $id_soal);
        $this->model_soal->hapus_data($where, 'tbl_soal');
        redirect('soal/index');
    }
}