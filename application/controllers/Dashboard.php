<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_admin();
    }

    // halaman dashboard admin
    function index()
    {
        $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['title']  = 'Dashboard';
        $this->load->view('admin/dashboard', $data);
    }
}
