<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
	
	public function getDataLogin($valid, $username, $password){
		

		$data = array(
			'username '=> $username,
			'password' => $password
		);
	
		$hasil = $this->db->get_where('data_user', $data);
	
		foreach ($hasil->result_array() as $result){
			
			
			// session_start();
			// normal $_SESSION['username'] = 'nilai';
			$userType = $result['user_type'];
			$statusApprove = $result['ket_approve'];

			if($userType == "Admin" || $userType == "Manager"){
				$valid = true;
			}else if($statusApprove == 'Approve'){
				$valid = true;
			}

			$id_user = $result['id_user'];

		
		}
		
		if($valid==false){
			redirect('/login?status=data-tidak-valid!');
		}else{
			$data = array(
				'username' => $username, 
				'userType' => $userType,
				'id_user' => $id_user
			);
		
			$this->session->set_userdata($data);

			redirect('/home');
		}
	}
	
	}

?>