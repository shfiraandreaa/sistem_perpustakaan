<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RegisModel extends CI_Model {
	
	public function insertRegis($namaMhs, $nimMhs, $emailMhs, $username, $password, $mhsAktif, $ktmAktif, $userType){


		$data = array(
			'username' => $username,
			'email' => $emailMhs,
			'password' => $password,
			'nama_user' => $namaMhs,
			'nim_user' => $nimMhs,
			'mahasiswa_aktif' => $mhsAktif,
			'ktm_aktif' => $ktmAktif,
			'user_type' => $userType,
			'ket_approve' => 'Belum Approve'
		);
		
		$this->db->insert('data_user', $data);
	}	

	public function cekUsername($username){

		$statusDuplicate = true;

		$data = array(
			'username' => $username
		);

		$hasil = $this->db->get_where('data_user', $data);
	
		foreach ($hasil->result_array() as $result){
			if($username == $result['username']){
					$statusDuplicate = false;
					break;
			}
			
		}


		return $statusDuplicate;

	}

	public function getDataAnggota()
	{
		$userType = "General";

		$data = array(
			'user_type' => $userType
		);

		$hasil = $this->db->get_where('data_user',$data);

		$allDataAnggota = array();
		$id = array();
		$nama = array();
		$nimUser = array();
		$username = array();
		$emailUser = array();
		$mhsAktif = array();
		$ktm = array();
		$ketApprove = array();
		
			foreach ($hasil->result_array() as $result){
				$id[] = $result['id_user'];
				$nama[] = $result['nama_user'];
				$nimUser[] = $result['nim_user'];
				$username[] = $result['username'];
				$emailUser[] = $result['email'];
				$mhsAktif[] = $result['mahasiswa_aktif'];
				$ktm[] = $result['ktm_aktif'];
				$ketApprove[] = $result['ket_approve'];
			}
						
			$banyakData = sizeof($id);
			
			$allDataAnggota = array(
				'id' => $id,
				'nama' => $nama,
				'nim' => $nimUser,
				'username' => $username,
				'email' => $emailUser,
				'mhs_aktif' => $mhsAktif,
				'ktm' => $ktm,
				'ket_approve' => $ketApprove,
				'banyakData' => $banyakData
			);

			return $allDataAnggota;

	}

	public function updateApprove($idTerpilih)
	{
	
		//yg set itu digunakan untuk set value berdasarkan kolom tersebut
		$this->db->set('ket_approve', 'Approve');
		$this->db->where('id_user', $idTerpilih);
		$this->db->update('data_user');
		
	}
	
}

?>