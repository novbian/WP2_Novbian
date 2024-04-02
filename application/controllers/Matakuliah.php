<?php
class Matakuliah extends CI_Controller
{
    public function index()
    {
        // $this->load->helper(array('form', 'url'));
        // $this->load->library('form_validation');
        $this->load->view('view-form-matakuliah');
    }

    public function cetak()
    {
        $this->load->library('form_validation');
        if ($this->input->method() === 'post') {

            $this->form_validation->set_rules(
                'kode',
                'Kode Matakuliah',
                'required|min_length[3]',
                [
                    'required' => 'Kode Matakuliah harus diisi',
                    'min_length' => 'Kode terlalu pendek'
                ]
            );

            $this->form_validation->set_rules(
                'nama',
                'Nama Matakuliah',
                'required|min_length[3]',
                [
                    'required' => 'Nama Matakuliah harus diisi',
                    'min_length' => 'Nama terlalu pendek'
                ]
            );

            if ($this->form_validation->run() == false) {
                return $this->load->view('view-form-matakuliah');
            } else {
                $data = [
                    'kode' => $this->input->post('kode'),
                    'nama' => $this->input->post('nama'),
                    'sks' => $this->input->post('sks')
                ];
                $this->load->view('view-data-matakuliah', $data);
            }
        }




        // $this->load->helper('url');
    }
}
