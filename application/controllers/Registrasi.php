<?php
class Registrasi extends CI_Controller{
    public function index(){

        $this->form_validation->set_rules('nama','Nama','required', [
            'required' => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required', [
            'required' => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('password_1','Password','required|matches[password_2]',[
            'required' => 'Password wajib diisi!',
            'matches'  => 'Password tidak cocok!'
        ]);
        $this->form_validation->set_rules('password_2','Password','required|matches[password_1]');


        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('v_registrasi');
            $this->load->view('templates/footer');
        }else{
            $data = array(
                'id' => '',
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password_1'),
            );

            $this->db->insert('tbl_admakun', $data);
            redirect('auth/login');
        }
        
    }
}