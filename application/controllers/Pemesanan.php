<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('WisataModel');
        $this->load->library('upload');
        $this->load->helper('download');
    }

    // start datatables
    function get_ajax()
    {
        check_admin();
        $list = $this->WisataModel->get_datatables();
        $data = [];
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = [];
            $row[]  = $no . ".";
            $row[]  = $item['nama_member'];
            $row[]  = $item['nama_wisata'];
            $row[]  = $item['harga'];
            $row[]  = $item['lama'] . '/Bulan';
            $row[]  = number_format($item['harga'] * $item['lama'], 0, ',', '.');
            $row[]  = tgl_indo($item['tgl_bayar']);
            $row[]  = $item['status_pembayaran'] == "1" ? "<span class='badge badge-success badge-pill'>Lunas</span>" : "<span class='badge badge-success badge-pill'>Belum Lunas</span>";
            $row[]  = tgl_indo($item['tgl_konfirmasi']);
            $row[]  = $tanggal = date('Y-m-d', strtotime(+$item['lama'] . 'months', $item['tgl_konfirmasi']));
            tgl_indo($tanggal);
            $data[] = $row;
        }
        $output = [
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->WisataModel->count_all(),
            "recordsFiltered" => $this->WisataModel->count_filtered(),
            "data" => $data,
        ];
        // output to json format
        echo json_encode($output);
    }
    // end datatables


    // Admin mengelola data pemesanan
    function index()
    {
        check_admin();
        $data['title']      = 'Data Pemesanan';
        $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['pemesanan']  = $this->WisataModel->getPemesananData();
        $this->load->view('admin/pemesanan_data', $data);
    }

    // func pemesanan wisata
    function tambah($id)
    {
        check_member();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required', [
            'required'  => 'Tanggal pemesanan tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('lama', 'lama', 'trim|required|numeric', [
            'required'  => 'Lama waktu tidak boleh kosong',
            'numeric'   => 'Masukkan angka!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']  = 'Pemesanan Wisata';
            $data['wisata']   = $this->WisataModel->getIdWisata($id);
            $data['member'] = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('user/pemesanan_wisata', $data);
        } else {
            $tanggal    = $this->input->post('tanggal', true);
            $lama       = htmlspecialchars($this->input->post('lama', true));
            $data       = [
                'id_member' => $this->session->userdata('id'),
                'id_wisata'   => $this->uri->segment(3),
                'tanggal'   => $tanggal,
                'lama'      => $lama,
            ];
            // update data status wisata
            $statusWisata    = [
                'status'    => "Buka"
            ];
            $id_wisata    = $this->uri->segment(3);
            $this->db->set($statusWisata);
            $this->db->where('id', $id_wisata);
            $this->db->update('wisata');
            // insert data pemesanan
            $this->WisataModel->insertPemesanan($data);
            $this->session->set_flashdata('success', 'Data pemesanan berhasil dilakukan! Silahkan cek pembayaran!');
            redirect('home/info', 'refresh');
        }
    }

    // member kelola data transaksi
    function data_transaksi()
    {
        check_member();
        $data['title']      = 'Data Transaksi Pemesanan';
        $data['member']     = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan']  = $this->WisataModel->getPemesananuser();
        $this->load->view('user/data_pemesanan', $data);
    }

    // func delete data pemesanan
    function batal_pesan($id)
    {
        check_member();
        // update data wisata
        $statusWisata   = [
            'status'    => "Tersedia"
        ];
        $data['pemesanan']  = $this->WisataModel->getPemesananuser();
        foreach ($data['pemesanan'] as $value) {
            $id_wisata    = $value['id_wisata'];
        }
        $this->db->set($statusWisata);
        $this->db->where('id', $id_wisata);
        $this->db->update('wisata');
        // batalkan pemesanan
        $row    = ['id' => $id];
        $this->WisataModel->deletePemesanan($row);
        $this->session->set_flashdata('success', 'Data pemesanan berhasil dihapus!');
        redirect('pemesanan/data_transaksi', 'refresh');
    }

    // cetak_invoice
    function cetak_invoice($id)
    {
        $data['pemesanan']  = $this->WisataModel->getPemesananuser();
        $this->load->view('user/cetak_invoice', $data);
        $html   = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size      = "A5";
        $orientation     = "Potrait";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("invoice_pemesanan.pdf", array("Attachment" => 0));
    }
    
    function cetak_bukti($id)
    {
        $data['pemesanan']  = $this->WisataModel->getPemesananuser();
        $this->load->view('user/cetak_bukti', $data);
        $html   = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size      = "A5";
        $orientation     = "Potrait";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("bukti_pembayaran.pdf", array("Attachment" => 0));
    }
    
    function cetak_tiket($id)
    {
        $data['pemesanan']  = $this->WisataModel->getPemesananuser();
        $this->load->view('user/tiket', $data);
        $html   = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $paper_size      = "A5";
        $orientation     = "Potrait";
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("tiket.pdf", array("Attachment" => 0));
    }


    // pemesanan batal oleh admin
    function pemesanan_batal($id)
    {
        // update data wisata
        check_admin();
        $statusWisata     = [
            'status'    => "Tersedia"
        ];
        $data['pemesanan']  = $this->WisataModel->getPemesananData();
        foreach ($data['pemesanan'] as $value) {
            $id_wisata        = $value['id_wisata'];
            $file           = $value['bukti_pembayaran'];
        }
        if ($file != null) {
            unlink(FCPATH . './assets/upload/pembayaran/' . $file);
        }
        $this->db->set($statusWisata);
        $this->db->where('id', $id_wisata);
        $this->db->update('wisata');
        // batalkan pemesanan
        $row    = ['id' => $id];
        $this->WisatatModel->deletePemesanan($row);
        redirect('pemesanan', 'refresh');
    }

    // member melalukan pembayaran
    function bayar()
    {
        check_member();
        $data['title']      = 'Bayar Pemesanan';
        $data['member']     = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan']  = $this->WisataModel->getPemesananuser();
        $this->load->view('user/pembayaran', $data);
    }

    // member upload pembayaran pemesanan
    function upload_pembayaran()
    {
        date_default_timezone_set('Asia/Jakarta');
        check_member();
        $id             = $this->input->post('id', true);
        $tgl_bayar      = $this->input->post('tgl_bayar');
        $no     = 1;
        $this->form_validation->set_rules('tgl_bayar', 'tgl_bayar', 'trim|required', [
            'required'  => 'Tanggal pembayaran harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Bayar Pemesanan';
            $data['member']     = $this->db->get_where('member', ['email' => $this->session->userdata('email')])->row_array();
            $data['pemesanan']  = $this->WisataModel->getPemesananuser();
            $this->load->view('user/pembayaran', $data);
        } else {
            $config['upload_path']      = './assets/upload/pembayaran/';
            $config['allowed_types']    = 'jpg|jpeg|png|pdf';
            $config['max_size']         = '1024';
            $config['file_name']        = 'IMG_' . date('dmY') . '_' . $no++;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti_pembayaran')) {
                $error  = $this->upload->display_errors();
                $this->session->set_flashdata('error_upload', $error);
                redirect('pemesanan/bayar/' . $id, 'refresh');
            } else {
                $gambar = ['upload_data' => $this->upload->data()];
                $data   = [
                    'tgl_bayar'         => $tgl_bayar,
                    'bukti_pembayaran'  => $gambar['upload_data']['file_name'],
                    'status_pembayaran' => 0,
                    'jam' => date("h:i:s")
                ];
                $this->db->set($data);
                $this->db->where('id', $id);
                $this->db->update('pemesanan');
                $this->session->set_flashdata('success', 'Upload pembayaran berhasil, silahkan menunggu konfirmasi!');
                redirect('pemesanan/bayar/' . $id, 'refresh');
            }
        }
    }

    // admin mengelola konfirmasi pemesanan
    function konfirmasi_pemesanan($id)
    {
        check_admin();
        $this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required', [
            'required'  => 'Status pembayaran harus dipilih'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Konfirmasi Pemesanan';
            $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
            $data['pemesanan']  = $this->db->get_where('pemesanan', ['id' => $id])->row_array();

            $this->load->view('admin/konfirmasi_pemesanan', $data);
        } else {
            $id         = $this->input->post('id');
            $status     = $this->input->post('status_pembayaran');
            $email = $this->input->post('email');
            $data   = [
                'status_pembayaran' => $status,
                'tgl_konfirmasi'    => time()
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('pemesanan');
            if($email){
                $this->_kirimEmail();
            }
            $this->session->set_flashdata('success', 'Pemesanan berhasil dikonfirmasi');
            redirect('pemesanan', 'refresh');
        }
    }

    private function _kirimEmail()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'siparwa@gmail.com',
            'smtp_pass' => 'ABC5dasar',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'uff-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $data = array(
            'name' => 'Ukhtea',
            'link' => ' ' . base_url() . 'pemesanan/cetak_bukti/',
        );

        $this->email->from('siparwa@gmail.com','Ukhtea dari Siparwa');
        $this->email->to($this->input->post('email'));

            $link = $this->email->subject('Pemberitahuan Konfirmasi Pemesanan Tiket');
            $body = $this->load->view('templates/email_template',$data,true);
            $this->email->message($body);
            
        if($this->email->send()) {
            return true;
        } else{
            echo $this->email->print_debugger();
            die;
        }
        
    }



    // admin mendownload bukti
    function download_bukti($id)
    {
        check_admin();
        $data['pemesanan'] = $this->db->get_where('pemesanan', ['id' => $id])->row_array();
        $file   = './assets/upload/pembayaran/' . $data['pemesanan']['bukti_pembayaran'];
        force_download($file, NULL);
    }

    // admin mengelola detail pemesanan selesai
    function detail_pemesanan()
    {
        check_admin();
        $data['title']      = 'Detail Pemesanan Selesai';
        $data['admin']      = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['pemesanan']  = $this->WisataModel->getPemesananData();
        $this->load->view('admin/detail_pemesanan', $data);
    }
}
