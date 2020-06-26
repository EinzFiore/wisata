<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->library('pdf');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}


// $pdf = new FPDF('p', 'mm', 'A4');
// // membuat halaman baru
// $pdf->AddPage();
// // setting jenis font yang akan digunakan
// $pdf->SetFont('Arial', 'B', 16);
// // mencetak string 
// $pdf->Cell(190, 10, 'PERGURUAN TINGGI UNIVERSITAS BINA SARANA INFORMATIKA', 0, 1, 'C');
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
// // Memberikan space kebawah agar tidak terlalu rapat
// $pdf->Cell(10, 7, '', 0, 1);
// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(50, 6, 'Nama', 1, 0);
// $pdf->Cell(35, 6, 'Jenis Kelamin', 1, 0);
// $pdf->Cell(50, 6, 'Email', 1, 0);
// $pdf->Cell(35, 6, 'status', 1, 1);
// $pdf->SetFont('Arial', '', 10);
// $member = $this->db->get('member')->result_array();
// foreach ($member as $row) {
// 	$pdf->Cell(50, 6, $row['nama'], 1, 0);
// 	$pdf->Cell(35, 6, $row['gender'], 1, 0);
// 	$pdf->Cell(50, 6, $row['email'], 1, 0);
// 	$pdf->Cell(35, 6, $row['status'], 1, 1);
// }
// $pdf->Output();
// $html = $this->output->get_output();
// $this->load->library('dompdf_gen');
// $this->dompdf->load_html($html);
// $this->dompdf->render();
// $this->dompdf->stream("welcome.pdf", array("Attachment" => 0));
