<?php 

class Nilai extends CI_Controller{
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
        $data['nilai'] = $this->model_nilai->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('nilai/v_nilai', $data);
        $this->load->view('templates/footer');
    }
}