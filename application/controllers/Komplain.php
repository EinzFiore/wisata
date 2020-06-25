<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Komplain extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('WisataModel');
    }

    // func tambah komplain wisata
    function tambah($id)
    {
        check_member();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required', [
            'required'  => 'Tanggal tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', [
            'required'  => 'Isi keluhan tidak boleh kosong!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']  = 'Data Keluhan';
            $data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();
            $data['wisata']   = $this->WisatatModel->getIdWisata($id);
            $this->load->view('user/komplain_wisata', $data);
        } else {
            $date   = $this->input->post('tanggal', true);
            $desc   = $this->input->post('deskripsi', true);
            $data   = [
                'id_member' => $this->session->userdata('id'),
                'tanggal'   => $date,
                'id_wisata'   => $this->uri->segment(3),
                'jenis'     => $this->input->post('jenis', true),
                'lainnya'   => $this->input->post('lainnya', true),
                'deskripsi' => $desc
            ];
            $this->WisataModel->insertKomplain($data);
            $this->session->set_flashdata('success', 'Data komplain berhasil direkam!');
            redirect('home/info', 'refresh');
        }
    }
}
