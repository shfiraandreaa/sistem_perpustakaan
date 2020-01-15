<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller 
{
	
	 function __construct()
	{
		parent:: __construct();
		$this->load->model('BukuModel');
	}
	
	public function submitData()
	{
        $judulBuku = $this->input->post('judul_buku');
        $penulis = $this->input->post('pengarang');
        $penerbit = $this->input->post('penerbit');
        $kuantiti = $this->input->post('kuantiti');
        $ketersediaan = $this->input->post('status_sedia');
        $picture = $this->input->post('picture');

        $dataFile =  explode ('.',$_FILES['picture']['name']);

        date_default_timezone_set("Asia/Jakarta");
		//penulisan tanggal dan jamnya itu sesuai struktur yg ada di mysql
		$tanggal =  date('YmdHis');
	
	    $nomorBaru = $tanggal;
	
	    $namaBaru = $dataFile[0].$nomorBaru.'.'.$dataFile[1];

        $config = array(
			'file_name' => $namaBaru,
			'upload_path' => './uploads/',
	     	'allowed_types' => 'gif|jpg|png|jpeg|pdf' ,
			'overwrite' => TRUE,
		 	'max_size' => '2048000',
			'max_height' => '768',
			'max_width' => '1024'
        );
        
        $this->load->library('upload', $config);
        
        //picture ini nama elemen
		$this->upload->do_upload('picture');

        $data = array(
            'judul_buku' => $judulBuku,
            'pengarang' => $penulis,
            'penerbit' => $penerbit,
            'kuantiti_buku' => $kuantiti,
            'status_ketersediaan' => $ketersediaan,
            'img' => $namaBaru
		);
		
        $this->db->insert('data_buku', $data);	
        
        redirect('/home');
		//kalau misal sebelum pemanggilan view kita ga ada data maka kita harus nanya ke db, tapi kalau sudah ada datanya langsung saja
		
	}

	public function getDataBuku()
	{
		$allBuku = $this->BukuModel->getAllBuku();

		return $allBuku;
	}

	public function simpanKeranjang()
	{
		$username = $this->session->userdata('username');
		$id_buku = $this->input->post('id_buku');
		$kuantitiBuku = $this->input->post('kuantiti'); 

		$this->BukuModel->insertKeranjang($username, $id_buku, $kuantitiBuku);

		echo "Sukses";

	}

	public function dataKeranjang()
	{
		$username = $this->session->userdata('username');

		$hasil = $this->BukuModel->getDataKeranjang($username);

		$this->load->view('keranjangBuku',$hasil);

		
	}

	public function pinjamBuku()
	{
		$idUser = $this->session->userdata('id_user');
		$idBuku = $this->input->post('id_buku');

		$idKeranjang = $this->input->post('id_keranjang');

		$statusBuku = 'Dipinjam';

		date_default_timezone_set("Asia/Jakarta");
		$tanggalPinjam =  date('Y-m-d');

		$tanggalKembali = date('Y-m-d',strtotime('+7 days'));

		$this->BukuModel->insertPeminjam($idUser,$idBuku,$tanggalPinjam,$tanggalKembali,$statusBuku);

		for($nomor=0; $nomor<sizeof($idKeranjang); $nomor++){
			
			$idTarget = $idKeranjang[$nomor];
			$this->BukuModel->hapusDataKeranjang($idTarget);
		}

		redirect('/home?view=daftarBuku');
		
	}

	public function hapusKeranjang()
	{
		$id_keranjang = $this->input->post('id');

	 	// $data = array(
		// 	'id_kerajang' => $id_keranjang
		// );

		//  $this->db->delete('data_keranjang', $data);

		$this->BukuModel->hapusDataKeranjang($id_keranjang);

		echo $id_keranjang;
	}
	
	public function notifKeranjang()
	{
		$username = $this->session->userdata('username');
		$this->BukuModel->jumlahDataKeranjang($username);
		$hasil = $this->BukuModel->jumlahDataKeranjang($username);

		return $hasil;
	}
	
	public function dataPeminjaman()
	{
		// id milik user yg login
		$userType = $this->session->userdata('userType');
		
		if($userType !== "Admin"){
			$idPeminjam = $this->session->userdata('id_user');
		}else{
			$idPeminjam = 1;
		}
		
		$this->BukuModel->getHistory($idPeminjam);
		
		$hasil = $this->BukuModel->getHistory($idPeminjam);
		
		return $hasil;
		
	}
	
	public function updateStatusBuku()
	{
		$id = $this->input->post('id');
		
		for($nomor=0; $nomor<sizeof($id); $nomor++){
			
			$idTerpilih = $id[$nomor];
			$this->BukuModel->updateStatusBuku($idTerpilih);
		}
		
		redirect('/home?view=dataPeminjam');
		
	}
	
	public function updateStatusHilang()
	{
		$id = $this->input->post('id');
		
		$this->BukuModel->updateStatusBukuHilang($id);
		
		
		echo $id;
		
	}
	
	public function getJudulBuku()
	{
		$judul_buku = $this->input->post('judul_buku');
		
		//$this->BukuModel->getBuku($judul_buku);
		$hasil = $this->BukuModel->getBuku($judul_buku);
		
		//array yg mau diecho kini jadi string json
		echo  json_encode($hasil);
	}
}
?>