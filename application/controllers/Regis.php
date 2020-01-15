<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regis extends CI_Controller 
{
	public function openForm()
	{
		
		
		$this->load->view('registrasi');
	}
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('RegisModel');
	}
	
	public function cekUsername(){
		
		$username = $this->input->post('username');

		$duplikat = $this->RegisModel->cekUsername($username);

		if($duplikat == false){
			echo "Duplikat";
		}else{
			echo "Aman";
		}

	}


	public function submitData()
	{
		$namaMhs = $this->input->post('nama');
		$nimMhs = $this->input->post('nim');
		$emailMhs = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$mhsAktif = $this->input->post('mhsAktif');
		$ktmAktif = $this->input->post('ktm');
		$userType = "General";
		
		$this->RegisModel->insertRegis($namaMhs, $nimMhs, $emailMhs, $username, $password, $mhsAktif, $ktmAktif, $userType);
		
		$hasilUsername = array(
				'username' => $username,
				'password' => $password
		);
			
		$this->load->view('notif_regis', $hasilUsername);
	
	}

	public function getData()
	{

		$dataAnggota = $this->RegisModel->getDataAnggota();

		return $dataAnggota;
		
	}
	
	public function updateStatusApprove()
	{
		$id = $this->input->post('id');
		
		for($nomor=0; $nomor<sizeof($id); $nomor++){
			
			$idTerpilih = $id[$nomor];
			$this->RegisModel->updateApprove($idTerpilih);
		}
		
		redirect('/home?view=dataAnggota');
		
	}

	
}
?>