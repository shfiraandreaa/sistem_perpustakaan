<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjam extends CI_Controller 
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('PeminjamModel');
	}
	
	public function submitData()
	{
        $nama = $this->input->post('nama_peminjam');
        $buku = $this->input->post('judul_buku');
        $tglPinjam = $this->input->post('tgl_pinjam');
        $tglKembali = $this->input->post('tgl_kembali');

        $id_user = $this->session->userdata('id_user');
       // var_dump($id_user);

        $data = array(
            'judul_buku' => $buku
        );

        $hasil = $this->db->get_where('data_buku',$data);

        foreach($hasil->result_array() as $result){
            $id_buku = $result['id_buku'];
        }


		$this->PeminjamModel->insertData($id_user,$id_buku,$tglPinjam,$tglKembali);
        
        redirect('/home');		
		//kalau misal sebelum pemanggilan view kita ga ada data maka kita harus nanya ke db, tapi kalau sudah ada datanya langsung saja
		
	}
	
}
?>