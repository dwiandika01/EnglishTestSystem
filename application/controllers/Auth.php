<?php

class Auth extends CI_Controller{
    
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('v_form_login');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email','Email','required', [
            'required' => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('password','Password','required', [
            'required' => 'Password wajib diisi!'
        ]);
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('v_form_login');
            $this->load->view('templates/footer');
        }else{
            $auth = $this->model_auth->cek_login();
            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Email atau Password anda salah!!!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>');
                                            redirect('auth/login');
            }else{
                $this->session->set_userdata('email',$auth->email);
                redirect('dashboard');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}