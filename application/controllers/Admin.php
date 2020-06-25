<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('MemberModel', 'member');
        check_admin();
    }

    // start datatables
    function get_ajax()
    {


        $list   = $this->member->get_datatables();
        $data   = [];
        $no     = @$_POST['start'];
        foreach ($list as $member) {
            $no++;
            $row = [];
            $row[]  = $no . ".";
            $row[]  = $member['nama'];
            $row[]  = $member['gender'];
            $row[]  = $member['email'];
            $row[]  = $member['status'];
            $row[]  = $member['telepon'];
            $row[]  = $member['alamat'];
            $row[]  = '<a class="btn btn-danger btn-sm" href="' . site_url('admin/member_hapus/' . $member['id']) . '" onclick="return confirm(\'Yakin hapus data\')"><i class="fas fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = [
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->member->count_all(),
            "recordsFiltered" => $this->member->count_filtered(),
            "data" => $data,
        ];
        // output to json format
        echo json_encode($output);
    }

    // end datatables
    function laporan_wisata()
    {
        $data['title']  = 'Laporan Data wisata';
        $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['wisata'] = $this->WisataModel->getAllWisata();
        $this->load->view('admin/laporan_wisata', $data);
    }

    // func untuk meload data member
    function member()
    {
        $data['title']  = 'Data Member';
        $data['member'] = $this->WisataModel->getMemberWisata();
        $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('admin/member_data', $data);
    }

    function cetak_laporan_member()
    {
        $data['member'] = $this->WisataModel->getMemberWisata();
        $this->load->view('admin/laporan/cetak_member', $data);
        $html   = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size     = "A4";
        $orientation    = "Potrait";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_member.pdf", array("Attachment" => 0));
    }

    function cetak_laporan_wisata()
    {
        $data['wisata']  = $this->WisataModel->getAllWisata();
        $this->load->view('admin/laporan/cetak_wisata', $data);
        $html   = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size      = "A4";
        $orientation     = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_wisata.pdf", array("Attachment" => 0));
    }

    // func hapus data member
    function cetak_laporan_pemesanan()
    {
        $data['pemesanan']  = $this->WisataModel->getPemesananData();
        $this->load->view('admin/laporan/cetak_pemesanan', $data);
        $html   = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size      = "A4";
        $orientation     = "Landscape";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_pemesanan.pdf", array("Attachment" => 0));
    }

    // func hapus data member
    function member_hapus($id)
    {
        $row    = ['id' => $id];
        $this->WisataModel->deleteMember($row);
        $this->session->set_flashdata('success', 'Data member berhasil dihapus!');
        redirect('admin/member', 'refresh');
    }

    // func kelola komplain
    function komplain()
    {
        $data['title']      = 'Data Keluhan';
        $data['komplain']   = $this->WisataModel->getKomplainWisata();
        $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('admin/komplain_data', $data);
    }

    // func hapus data komplain
    function komplain_hapus($id)
    {
        $row    = ['id_keluhan' => $id];
        $this->WisataModel->deleteKeluhan($row);
        $this->session->set_flashdata('success', 'Data keluhan berhasil dihapus!');
        redirect('admin/komplain', 'refresh');
    }
    
    function post_hapus($id)
    {
        $row    = ['id_info' => $id];
        $this->WisataModel->deletePost($row);
        $this->session->set_flashdata('success', 'Data keluhan berhasil dihapus!');
        redirect('admin/informasi', 'refresh');
    }
    // func untuk menampilkan profil admin
    function profil()
    {
        $data['title']      = 'Profil Saya';
        $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('admin/profil', $data);
    }

    // func update profil
    function edit_profil()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required'  => 'Nama tidak boleh kosong!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Ubah Profil';
            $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            $this->load->view('admin/ubah_profil', $data);
        } else {
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']      = './assets/upload/';
                $config['allowed_types']    = 'jpg|jpeg|png|svg';
                $config['max_size']         = '2048';
                $config['file_name']        = 'IMG_' . time();
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image')) {
                    $error              = $this->upload->display_errors();
                    $this->session->set_flashdata('error_upload', $error);
                    $data['title']      = 'Ubah Profil';
                    $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                    $this->load->view('admin/ubah_profil', $data);
                } else {
                    $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                    if ($data['admin']['image'] != 'default.png') {
                        unlink(FCPATH . './assets/upload/' . $data['admin']['image']);
                    }
                    $upload     = ['uploads' => $this->upload->data()];
                    $nama       = htmlspecialchars($this->input->post('nama', true));
                    $telepon    = htmlspecialchars($this->input->post('telepon', true));
                    $data       = [
                        'nama'  => $nama,
                        'telepon' => $telepon,
                        'image'  => $upload['uploads']['file_name']
                    ];
                    $this->db->set($data);
                    $this->db->where('id', $this->session->userdata('id'));
                    $this->db->update('admin');
                    $this->session->set_flashdata('success', 'Profil berhasil diubah!');
                    redirect('admin/edit_profil', 'refresh');
                }
            } else {
                $nama       = htmlspecialchars($this->input->post('nama', true));
                $telepon    = htmlspecialchars($this->input->post('telepon', true));
                $data       = [
                    'nama'      => $nama,
                    'telepon'   => $telepon
                ];
                $this->db->set($data);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('admin');
                $this->session->set_flashdata('success', 'Profil berhasil diubah!');
                redirect('admin/edit_profil', 'refresh');
            }
        }
    }

    // func ubah password 
    function ubahpassword()
    {
        $this->form_validation->set_rules('password_lama', 'password lama', 'trim|required', [
            'required'      => 'Password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password_baru', 'password baru', 'trim|required|min_length[4]|max_length[6]', [
            'required'      => 'Password baru tidak boleh kosong!',
            'min_length'    => 'Minimal 4 karakter!',
            'max_length'    => 'Maksimal 6 karakter!'
        ]);
        $this->form_validation->set_rules('ulangi_password', 'ulangi password', 'trim|required|matches[password_baru]', [
            'required'      => 'Ulangi password tidak boleh kosong!',
            'matches'       => 'Password baru tidak sama!',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Ubah Password';
            $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            $this->load->view('admin/ubah_password', $data);
        } else {
            $pass_lama      = md5($this->input->post('password_lama', true));
            $pass_baru      = md5($this->input->post('password_baru', true));
            $ulangi_pass    = md5($this->input->post('ulangi_password', true));
            $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            if ($pass_lama != $data['admin']['password']) {
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('admin/ubahpassword', 'refresh');
            } else {
                if ($pass_baru == $pass_lama) {
                    $this->session->set_flashdata('error', 'Password tidak boleh sama!');
                    redirect('admin/ubahpassword', 'refresh');
                } else {
                    $this->db->set('password', $pass_baru);
                    $this->db->where('id', $this->session->userdata('id'));
                    $this->db->update('admin');
                    $this->session->set_flashdata('success', 'Password berhasil diubah!');
                    redirect('admin/ubahpassword', 'refresh');
                }
            }
        }
    }

    function informasi()
    {
        $data['title']      = 'Informasi';
        $data['informasi']   = $this->db->get('informasi')->result_array();
        $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('admin/data_info', $data);
    }

    function tambah_post()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['title']  = 'Tambah Post';
        $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->join('admin','admin.id = informasi.admin_id');
        $data['post'] = $this->db->get()->row_array();
        $this->load->view('admin/tambah_post', $data);
    // } else {
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']      = './assets/upload/blog/cover';
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
                $id          = $this->input->post('id');
                $gambar      = array('upload_data' => $this->upload->data());
                $judul       = htmlspecialchars($this->input->post('judul', true));
                $penulis     = htmlspecialchars($this->input->post('penulis', true));
                $post        = $this->input->post('post');
                $data        = [
                    'judul'        => $judul,
                    'admin_id'     => $id,
                    'cover'        => $gambar['upload_data']['file_name'],
                    'post'         => $post,
                    'tanggal_post' => date('Ymd'),
                    'jam_post'     => date('H:i:s a'),
                ];
                $this->db->insert('informasi',$data);
                $this->session->set_flashdata('success', 'Data Informasi berhasil ditambahkan!');
                redirect('admin/informasi', 'refresh');
            }
        } 
    }
    
    function edit_post($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['title']  = 'Edit Post';
        $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->join('admin','admin.id = informasi.admin_id');
        $this->db->where('id_info',$id);
        $data['post'] = $this->db->get()->row_array();
        $this->load->view('admin/edit_post', $data);
    // } else {
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']      = './assets/upload/blog/cover';
            $config['allowed_types']    = 'jpg|jpeg|png|svg';
            $config['max_size']         = '2048';
            $config['file_name']        = 'IMG_' . time();
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $error          = $this->upload->display_errors();
                $this->session->set_flashdata('error_upload', $error);
                $data['title']  = 'Edit Post';
                $data['admin']  = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                $this->load->view('admin/edit_post', $data);
            } else {
                $id_admin    = $this->input->post('id_admin');
                $gambar      = array('upload_data' => $this->upload->data());
                $judul       = htmlspecialchars($this->input->post('judul', true));
                $penulis     = htmlspecialchars($this->input->post('penulis', true));
                $post        = $this->input->post('post');
                $data        = [
                    'judul'        => $judul,
                    'admin_id'     => $id_admin,
                    'cover'        => $gambar['upload_data']['file_name'],
                    'post'         => $post,
                    'tanggal_post' => date('Ymd'),
                    'jam_post'     => date('H:i:s a'),
                ];
                $row    = ['id_info' => $id];
                $this->WisataModel->editPost($row,$data);
                $this->session->set_flashdata('success', 'Data Informasi berhasil ditambahkan!');
                redirect('admin/informasi', 'refresh');
            }
        } 
    }


    // func untuk logout
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login/admin', 'refresh');
    }
}
