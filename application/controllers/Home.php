<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	//function untuk melihat seluruh data anggota
	public function getAllAnggota(){
		$this->load->model('RegisModel');
		$data = $this->RegisModel->getDataAnggota();
		return $data;
	}

	//function untuk mendapat data buku
	public function getDataBuku()
	{
		$username = $this->session->userdata('username');
		$this->load->model('BukuModel');
		$data = $this->BukuModel->getAllBuku();
		$data['jumlah'] = $this->BukuModel->jumlahDataKeranjang($username);
		return $data;
	}

	//function untuk mendapat data keranjang
	public function getDataKeranjang()
	{
		$username = $this->session->userdata('username');
		$this->load->model('BukuModel');
		$hasil = $this->BukuModel->getDataKeranjang($username);
		return $hasil;
	}
	
	//function untuk mendapat history
	public function getHistory()
	{
		$idPeminjam = $this->session->userdata('id_user');
		$this->load->model('BukuModel');
		$data = $this->BukuModel->getHistory($idPeminjam);
		return $data;
	}
	
	//function untuk mendapat data laporan peminjam/pengembalian
	
	public function getDataLaporan()
	{
		$idPeminjam = $this->session->userdata('id_user');
		$this->load->model('BukuModel');
		$data = $this->BukuModel->getHistory($idPeminjam);
		return $data;
	}
	
	//function download pdf
	public function printReportUser()
	{
		$username = $this->input->get('username');
		$this->load->model('BukuModel');
		$data = $this->BukuModel->getAllPeminjam($username);
		
		$jumlahData = $data['banyakData'];
		
		//$usernames = $data['username'];
		
		
		include APPPATH . 'third_party/fpdf181/fpdf.php';
		
		// melakukan penggunaan library PDF generator
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Image('images/print.png',150,15,30);
		$pdf->Cell(10);
		$pdf->Cell(80,35,'Laporan Data Peminjam dan Pengembalian',0,0);
		$pdf->Ln(20);
		$pdf->Cell(10);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(10,60,"Username:"."  ".$username,0,1);
		$pdf->Line(10,80,200,80);
		
		//array dibawah ini merupakan data dari jumlahData
		 $judulBuku = $data['judulBuku'];
		$tglpinjam = $data['tanggalPinjam'];
		$status = $data['statusBuku'];
		$denda = $data['denda'];
		 
		
		for($nomor=0; $nomor<$jumlahData; $nomor++){
			$judul = "Judul Buku : " .$judulBuku[$nomor];
			$tglText = "|| Peminjaman : ".$tglpinjam[$nomor];
			$statusText = "|| ".$status[$nomor];
			$dendaText = " || Denda : Rp.".$denda[$nomor];
			$pdf->SetFont('Arial','',12);
			//$pdf->Cell(10);
			$pdf->Cell(10,10,$judul,0,0);
			$pdf->Cell(45);
			$pdf->Cell(10,10,$tglText,0,0);
			$pdf->Cell(45);
			$pdf->Cell(10,10,$statusText,0,0);
			$pdf->Cell(35);
			$pdf->Cell(10,10,$dendaText,0,1);
			
			//if ($nomor+1 < sizeof($username)){
			//	$pdf->AddPage();
			//}
			
		}
		
		$pdf->Output();
	}
	
	
	public function openForm()
	{
		$username =  $this->session->userdata('username');
		$userType = $this->session->userdata('userType');

		if($username == True){
			$page = $this->input->get("view");

			$data = array(
				'userType' => $userType,
				'page'=> $page,
				'Home' => $this
			);
			$this->load->view('home',$data);
		}else{
			redirect('/login?status=data-tidak-valid!');
		}
		
		
		
	}


	
}

?>