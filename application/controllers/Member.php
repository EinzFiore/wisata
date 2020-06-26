<?php
class Member extends CI_Controller
{
    function profile()
    {
        $data['judul'] = 'Profil Saya';
        $data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('user/member/header', $data);
        $this->load->view('user/member/profile', $data);
        $this->load->view('user/member/footer');
    }

    function tes()
    {
        $data = $this->input->post('deskripsi');
        var_dump($data);
        die;
    }
}
