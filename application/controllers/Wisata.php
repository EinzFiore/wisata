<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wisata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('WisataModel');
        $this->load->model('Wisata_M');
        $this->load->library('upload');
        check_admin();
    }

    // function helper
    private function _get_mysqli() { 
        $db = (array)get_instance()->db;
        return mysqli_connect('localhost', $db['username'], $db['password'], $db['database']);
    }

    // start datatables
    function get_ajax()
    {
        $list = $this->Wisata_M->get_datatables();
        $data = [];
        $no = @$_POST['start'];
        foreach ($list as $wisata) {
            $no++;
            $row = [];
            $row[]  = $no . ".";
            $row[]  = $wisata['nama'];
            $row[]  = $wisata['jenis_wisata'];
            $row[]  = $wisata['status'];
            $row[]  = 'Rp.' . '' .  number_format($wisata['harga'], 0, ',', '.');
            $row[]  = $wisata['tiket'];
            $row[] = $wisata['gambar'] != null ? '<img src="' . base_url('assets/upload/wisata/' . $wisata['gambar']) . '" class="img" style="width:80px">' : null;
            // add html for action
            $row[] = '<a href="' . site_url('wisata/edit_wisata/' . $wisata['id']) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . site_url('wisata/hapus_wisata/' . $wisata['id']) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = [
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Wisata_M->count_all(),
            "recordsFiltered" => $this->Wisata_M->count_filtered(),
            "data" => $data,
        ];
        // output to json format
        echo json_encode($output);
    }
    // end datatables

    // func meload data wisata
    function index()
    {
        $data['title']  = 'Data wisata';
        $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['wisataan'] = $this->WisataModel->getAllWisata();
        $this->load->view('admin/wisata', $data);
    }

    // func tambah wisata 
    function tambah_wisata()
    {
        // $this->_rules();
        // if ($this->form_validation->run() == false) {
            $data['title']  = 'Tambah wisata';
            $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            $this->load->view('admin/tambah_wisata', $data);
        // } else {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']      = './assets/upload/wisata/';
                $config['allowed_types']    = 'jpg|jpeg|png|svg';
                $config['max_size']         = '2048';
                $config['file_name']        = 'IMG_' . time();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $error          = $this->upload->display_errors();
                    $this->session->set_flashdata('error_upload', $error);
                    $data['title']  = 'Tambah wisata';
                    $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                    $this->load->view('admin/tambah_wisata', $data);
                } else {
                    $gambar      = array('upload_data' => $this->upload->data());
                    $nama        = htmlspecialchars($this->input->post('nama', true));
                    $jenis_wisata  = htmlspecialchars($this->input->post('jenis_wisata', true));
                    $deskripsi   = htmlspecialchars($this->input->post('deskripsi', true));
                    $status      = htmlspecialchars($this->input->post('status', true));
                    $harga       = htmlspecialchars($this->input->post('harga', true));
                    $jam_buka       = htmlspecialchars($this->input->post('jam_buka', true));
                    $jam_tutup       = htmlspecialchars($this->input->post('jam_tutup', true));
                    $lokasi       = htmlspecialchars($this->input->post('lokasi', true));
                        // Untuk link map insert bagian href nya aja, gk perlu semua tag di copy !!
                    $map       =   mysqli_real_escape_string($this->_get_mysqli(),$this->input->post('link_map'));
                    $data        = [
                        'nama'          => $nama,
                        'jenis_wisata'  => $jenis_wisata,
                        'deskripsi'     => $deskripsi,
                        'status'        => $status,
                        'harga'         => $harga,
                        'gambar'        => $gambar['upload_data']['file_name'],
                        'jam_buka'      => $jam_buka,
                        'jam_tutup'     => $jam_tutup,
                        'lokasi'        => $lokasi,
                        // Untuk link map insert bagian href nya aja, gk perlu semua tag di copy !!
                        'link_map'      => $map
                    ];
                    $this->WisataModel->insertWisata($data);
                    $this->session->set_flashdata('success', 'Data wisata berhasil ditambahkan!');
                    redirect('wisata', 'refresh');
                }
            } 
        // }
    }


    // func edit aksi
    function edit_wisata($id)
    {
        $wisata   = $this->WisataModel->getIdWisata($id);
        $this->db->distinct('jenis_wisata');
        $this->db->group_by('jenis_wisata');
        $data['wisataan'] = $this->db->get('wisata')->result_array();
        if ($wisata['id'] == null) {
            $this->session->set_flashdata('error', 'Data wisata tidak ditemukan!');
            redirect('wisata', 'refresh');
        }
            $data['title']  = 'Edit wisata';
            $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            $data['wisata']   = $this->WisataModel->getIdWisata($id);
            $this->load->view('admin/edit_wisata', $data);
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']      = './assets/upload/wisata/';
                $config['allowed_types']    = 'jpg|jpeg|png|svg';
                $config['max_size']         = '2048';
                $config['file_name']        = 'IMG_' . time();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $error          = $this->upload->display_errors();
                    $this->session->set_flashdata('error_upload', $error);
                    $data['title']  = 'Edit wisata';
                    $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                    $data['wisata']   = $this->WisataModel->getIdWisata($id);
                    $this->load->view('admin/edit_wisata', $data);
                } else {
                    $gambar     = array('upload_data' => $this->upload->data());
                    if ($wisata['gambar'] != 'default.png') {
                        unlink(FCPATH . './assets/upload/wisata/' . $wisata['gambar']);
                    }
                    $nama        = htmlspecialchars($this->input->post('nama', true));
                    $jenis_wisata  = htmlspecialchars($this->input->post('jenis_wisata', true));
                    $deskripsi   = htmlspecialchars($this->input->post('deskripsi', true));
                    $harga       = htmlspecialchars($this->input->post('harga', true));
                    $jam_buka       = htmlspecialchars($this->input->post('jam_buka', true));
                    $jam_tutup       = htmlspecialchars($this->input->post('jam_tutup', true));
                    $data        = [
                        'nama'          => $nama,
                        'jenis_wisata'  => $jenis_wisata,
                        'deskripsi'     => $deskripsi,
                        'harga'         => $harga,
                        'jam_buka'      => $jam_buka,
                        'jam_tutup'     => $jam_tutup,
                        'gambar'        => $gambar['upload_data']['file_name']
                    ];
                    $row    = ['id' => $id];
                    $this->WisataModel->updateWisata($row, $data);
                    $this->session->set_flashdata('success', 'Data wisata berhasil diubah!');
                    redirect('wisata', 'refresh');
                }
            } 
    }

    // func delete data wisata
    function hapus_wisata($id)
    {
        $wisata   = $this->WisataModel->getIdWisata($id);
        if ($wisata['id'] == null) {
            $this->session->set_flashdata('error', 'Data wisata tidak ditemukan!');
            redirect('wisata', 'refresh');
        }
        if ($wisata['gambar'] != 'default.png') {
            unlink(FCPATH . './assets/upload/wisata/' . $wisata['gambar']);
        }
        $row    = ['id' => $id];
        $this->WisataModel->deleteWisata($row);
        $this->session->set_flashdata('success', 'Data wisata berhasil dihapus!');
        redirect('wisata', 'refresh');
    }

    // func _rules validasi form
    private function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required'      => 'Nama wisata tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('jenis_wisata', 'jenis wisata', 'trim|required', [
            'required'      => 'Jenis wisata harus dipilih!'
        ]);
        $this->form_validation->set_rules('status', 'status', 'trim|required', [
            'required'      => 'Status wisata harus dipilih!'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric', [
            'required'      => 'Harga wisata harus diisi!',
            'numeric'       => 'Harga harus berupa angka!'
        ]);
        $this->form_validation->set_rules('tiket', 'tiket', 'trim|required|numeric', [
            'required'      => 'Jumlah tiket harus diisi!',
            'numeric'       => 'Jumlah tiket harus angka!'
        ]);
    }


    
}
