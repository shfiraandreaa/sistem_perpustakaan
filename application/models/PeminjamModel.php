<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PeminjamModel extends CI_Model {
	
	public function insertData($id_user,$id_buku,$tglPinjam,$tglKembali){
		
		$data = array(
            'id_user_peminjam' => $id_user,
            'id_buku_dipinjam' => $id_buku,
            'tanggal_pinjam' => $tglPinjam,
            'tanggal_kembali' => $tglKembali
		);
		
		$this->db->insert('data_peminjam', $data);
	}	
	
}

?>