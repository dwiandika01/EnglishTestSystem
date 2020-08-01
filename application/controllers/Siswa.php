<?php

class Siswa extends CI_Controller{

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
        $data['siswa'] = $this->model_siswa->tampil_data()->result();
        $data['keyword'] = "";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/v_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $NIS = $this->input->post('NIS');
        $nama_siswa = $this->input->post('nama_siswa');
        $foto = $_FILES['foto']['name'];
        $kelas = $this->input->post('kelas');
        $jk = $this->input->post('jk');
        if($foto =''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Gambar Gagal Di Upload";
            }else{
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'NIS'           => $NIS,
            'nama_siswa'    => $nama_siswa,
            'foto'          => $foto,
            'kelas'         => $kelas,
            'jk'            => $jk
        );

        $this->model_siswa->tambah_siswa($data, 'tbl_siswa');
        redirect('siswa/index');
    }

    public function edit($NIS){
        $where = array('NIS' => $NIS);
        $data['siswa'] = $this->model_siswa->edit_siswa($where, 'tbl_siswa')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/v_edit_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $NIS = $this->input->post('NIS');
        $nama_siswa = $this->input->post('nama_siswa');
        $foto = $this->input->post('foto');
        $kelas = $this->input->post('kelas');
        $jk = $this->input->post('jk');

        $data = array(
            'nama_siswa'    => $nama_siswa,
            'foto'          => $foto,
            'kelas'         => $kelas,
            'jk'            => $jk
        );

        $where = array(
            'NIS'    => $NIS
        );

        $this->model_siswa->update_data($where,$data,'tbl_siswa');
        redirect('siswa/index');

    }

    public function hapus($NIS)
    {
        $where = array('NIS' => $NIS);
        $this->model_siswa->hapus_data($where, 'tbl_siswa');
        redirect('siswa/index');
    }

    public function setStatus1()
    {
        $data = array('s_quiz1' => '0' );
        $this->model_siswa->setStatus1($data, 'tbl_siswa');
        redirect('siswa/index');
    }

    public function setStatus2()
    {
        $data = array('s_quiz2' => '0' );
        $this->model_siswa->setStatus1($data, 'tbl_siswa');
        redirect('siswa/index');
    }

    public function sort()
    {
        $keyword = $this->input->post('keyword');
        $data['siswa'] = $this->model_siswa->sort($keyword);
        $data['keyword'] = $keyword;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/v_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function excel()
    {

        $data['siswa'] = $this->model_siswa->tampil_data()->result();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("English Test System");
        $object->getProperties()->setLastModifiedBy("English Test System");
        $object->getProperties()->setLastModifiedBy("Daftar Nilai");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NIS');
        $object->getActiveSheet()->setCellValue('C1', 'Nama Siswa');
        $object->getActiveSheet()->setCellValue('D1', 'Kelas');
        $object->getActiveSheet()->setCellValue('E1', 'Nilai Quiz 1');
        $object->getActiveSheet()->setCellValue('F1', 'Nilai Quiz 2');

        $baris = 2;
        $no = 1;

        foreach($data['siswa'] as $sis){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $sis->NIS);
            $object->getActiveSheet()->setCellValue('C'.$baris, $sis->nama_siswa);
            $object->getActiveSheet()->setCellValue('D'.$baris, $sis->kelas);
            $object->getActiveSheet()->setCellValue('E'.$baris, $sis->n_quiz1);
            $object->getActiveSheet()->setCellValue('F'.$baris, $sis->n_quiz2);

            $baris++;
        }

        $filename = "Data Nilai Semua".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Nilai");
        
        header('Content-Type: application/vnd.openxmlformats-officedocuments.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
    }

    public function excelA()
    {

        $data['siswa'] = $this->model_siswa->sort("8 - A");
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("English Test System");
        $object->getProperties()->setLastModifiedBy("English Test System");
        $object->getProperties()->setLastModifiedBy("Daftar Nilai");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NIS');
        $object->getActiveSheet()->setCellValue('C1', 'Nama Siswa');
        $object->getActiveSheet()->setCellValue('D1', 'Kelas');
        $object->getActiveSheet()->setCellValue('E1', 'Nilai Quiz 1');
        $object->getActiveSheet()->setCellValue('F1', 'Nilai Quiz 2');

        $baris = 2;
        $no = 1;

        foreach($data['siswa'] as $sis){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $sis->NIS);
            $object->getActiveSheet()->setCellValue('C'.$baris, $sis->nama_siswa);
            $object->getActiveSheet()->setCellValue('D'.$baris, $sis->kelas);
            $object->getActiveSheet()->setCellValue('E'.$baris, $sis->n_quiz1);
            $object->getActiveSheet()->setCellValue('F'.$baris, $sis->n_quiz2);

            $baris++;
        }

        $filename = "Data Nilai Kelas 8 - A".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Nilai");
        
        header('Content-Type: application/vnd.openxmlformats-officedocuments.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
    }

    public function excelB()
    {

        $data['siswa'] = $this->model_siswa->sort("8 - B");
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("English Test System");
        $object->getProperties()->setLastModifiedBy("English Test System");
        $object->getProperties()->setLastModifiedBy("Daftar Nilai");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NIS');
        $object->getActiveSheet()->setCellValue('C1', 'Nama Siswa');
        $object->getActiveSheet()->setCellValue('D1', 'Kelas');
        $object->getActiveSheet()->setCellValue('E1', 'Nilai Quiz 1');
        $object->getActiveSheet()->setCellValue('F1', 'Nilai Quiz 2');

        $baris = 2;
        $no = 1;

        foreach($data['siswa'] as $sis){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $sis->NIS);
            $object->getActiveSheet()->setCellValue('C'.$baris, $sis->nama_siswa);
            $object->getActiveSheet()->setCellValue('D'.$baris, $sis->kelas);
            $object->getActiveSheet()->setCellValue('E'.$baris, $sis->n_quiz1);
            $object->getActiveSheet()->setCellValue('F'.$baris, $sis->n_quiz2);

            $baris++;
        }

        $filename = "Data Nilai Kelas 8 - B".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Nilai");
        
        header('Content-Type: application/vnd.openxmlformats-officedocuments.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
    }

    public function excelC()
    {

        $data['siswa'] = $this->model_siswa->sort("8 - C");
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("English Test System");
        $object->getProperties()->setLastModifiedBy("English Test System");
        $object->getProperties()->setLastModifiedBy("Daftar Nilai");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NIS');
        $object->getActiveSheet()->setCellValue('C1', 'Nama Siswa');
        $object->getActiveSheet()->setCellValue('D1', 'Kelas');
        $object->getActiveSheet()->setCellValue('E1', 'Nilai Quiz 1');
        $object->getActiveSheet()->setCellValue('F1', 'Nilai Quiz 2');

        $baris = 2;
        $no = 1;

        foreach($data['siswa'] as $sis){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $sis->NIS);
            $object->getActiveSheet()->setCellValue('C'.$baris, $sis->nama_siswa);
            $object->getActiveSheet()->setCellValue('D'.$baris, $sis->kelas);
            $object->getActiveSheet()->setCellValue('E'.$baris, $sis->n_quiz1);
            $object->getActiveSheet()->setCellValue('F'.$baris, $sis->n_quiz2);

            $baris++;
        }

        $filename = "Data Nilai Kelas 8 - C".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Nilai");
        
        header('Content-Type: application/vnd.openxmlformats-officedocuments.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
    }
    
}

