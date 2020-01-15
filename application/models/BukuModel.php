<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BukuModel extends CI_Model
{

    public function getAllBuku()
    {
        $hasil = $this->db->get('data_buku');

        foreach($hasil->result_array() as $result){
            $idBuku[] = $result['id_buku'];
            $judul[] = $result['judul_buku'];
            $pengarang[] = $result['pengarang'];
            $img[] = $result['img'];
            $ketSedia[] = $result['status_ketersediaan'];
        }

        $banyakData = sizeof($judul);

        $allBuku = array(
            'id_buku' => $idBuku,
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'img_buku' => $img,
            'status_ketersediaan' => $ketSedia,
            'banyakData' => $banyakData
        );

        return $allBuku;

    }
	
	public function getBuku($judul_buku)
    {
		$kondisi = array(
			'judul_buku' => $judul_buku
		);
		
		$this->db->like('judul_buku', $judul_buku);
		$hasil = $this->db->get('data_buku');
		
        //$hasil = $this->db->get_where('data_buku', $kondisi);

        foreach($hasil->result_array() as $result){
            $idBuku[] = $result['id_buku'];
            $judul[] = $result['judul_buku'];
            $pengarang[] = $result['pengarang'];
            $img[] = $result['img'];
            $ketSedia[] = $result['status_ketersediaan'];
        }

        $banyakData = sizeof($judul);

        $allBuku = array(
            'id_buku' => $idBuku,
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'img_buku' => $img,
            'status_ketersediaan' => $ketSedia,
            'banyakData' => $banyakData
        );

        return $allBuku;

    }

    public function insertKeranjang($username, $id_buku, $kuantitiBuku)
    {
        $data = array(
            'username' => $username,
            'kuantiti' => $kuantitiBuku,
            'id_buku' => $id_buku
        );

        $this->db->insert('data_keranjang',$data);

    }

    public function getDataKeranjang($username)
    {
        $this->db->select('data_keranjang.kuantiti,data_keranjang.id_keranjang,data_keranjang.id_buku, data_buku.judul_buku, data_buku.pengarang, data_buku.img');
        $this->db->from('data_keranjang');
        $this->db->join('data_buku','data_keranjang.id_buku=data_buku.id_buku','inner');

        // $data = array(
        //     'username' => $username
        // );

        $this->db->where('username',$username);
        $hasil = $this->db->get();

        foreach($hasil->result_array() as $result){
            $kuantiti[] = $result['kuantiti'];
            $id_keranjang[] = $result['id_keranjang'];
            $judul_buku[] = $result['judul_buku'];
            $pengarang[] = $result['pengarang'];
            $cover[] = $result['img'];
            $id_buku[] = $result['id_buku'];
        }

        if(isset($id_keranjang)){
            $banyakData = sizeof($id_keranjang);

            $allDataKeranjang = array(
                'kuantiti' => $kuantiti,
                'id_keranjang' => $id_keranjang,
                'judul_buku' => $judul_buku,
                'pengarang' => $pengarang,
                'cover' => $cover,
                'id_buku' => $id_buku,
                'banyakData' => $banyakData
             );
     
             return $allDataKeranjang;

        }else{
            return '';
        }
   
    }

    public function insertPeminjam($idUser,$idBuku,$tanggalPinjam,$tanggalKembali,$statusBuku)
    {
        $data = array(
            'id_user_peminjam' => $idUser,
            'id_buku_dipinjam' => $idBuku,
            'tanggal_pinjam' => $tanggalPinjam,
            'tanggal_kembali' => $tanggalKembali,
            'status_buku' => $statusBuku
        );

        $this->db->insert('data_peminjam', $data);
    }

    public function hapusDataKeranjang($idKeranjang)
    {
        $data = array(
            'id_keranjang' => $idKeranjang
        );

        $this->db->delete('data_keranjang', $data);
    }

    public function jumlahDataKeranjang($username)
    {
        $data = array(
            'username' => $username
        );

        $jumlahData = 0;

        $hasil = $this->db->get_where('data_keranjang', $data);
		
        foreach($hasil->result_array() as $result){
            $jumlahData++;
        }

        return $jumlahData;

    }
	
	
	public function getUsername($id)
	{
		$kondisi = array(
			'id_user' => $id
		);
		$hasil = $this->db->get_where('data_user', $kondisi)->row();
		return $hasil->username;
	}
	
	public function getHistory($idPeminjam)
	{
		
		$this->db->select('data_peminjam.id_user_peminjam,
		data_peminjam.id_buku_dipinjam,
		data_peminjam.id_peminjam,
		data_peminjam.tanggal_pinjam,
		data_peminjam.tanggal_kembali,
		data_peminjam.status_buku,
		data_buku.id_buku,
		data_buku.judul_buku');
        $this->db->from('data_peminjam');
        $this->db->join('data_buku','data_peminjam.id_buku_dipinjam=data_buku.id_buku',
		'inner');
		
		if($idPeminjam != 1  && $idPeminjam !=2){
			$this->db->where('id_user_peminjam', $idPeminjam);
		}
		
		
        $hasil = $this->db->get();

        foreach($hasil->result_array() as $result){
			$username = $this->getUsername($result['id_user_peminjam']);
			$usernames[] = $username;
            $judul_buku[] = $result['judul_buku'];
			$idPinjam[] = $result['id_peminjam'];
			$idUser[] = $result['id_user_peminjam'];
			
			date_default_timezone_set("Asia/Jakarta");
				$tglHariIni =  date('Y-m-d');
			
			$tglHariIni = new DateTime($tglHariIni);
			$tglPinjam = new DateTime($result['tanggal_pinjam']);
			
			$selisih = $tglPinjam->diff($tglHariIni)->d;
			
			$selisihHari = $selisih - 7;
			
			$statusBukuAwal = $result['status_buku'];
			
			
			if($selisihHari >= 1 && $statusBukuAwal == "Dipinjam"){
				$denda = 1000 * $selisihHari;
			}else if ($statusBukuAwal == "Buku Hilang"){
				$denda = 5000;
			}else{
				$denda = 0;
			}
			
			$bayaranDenda[] =  $denda;
			
			
			$tanggal_pinjam[] = $result['tanggal_pinjam'];
			$tanggal_kembali[] = $result['tanggal_kembali'];
			$status_buku[] = $result['status_buku'];
        }
		
		$banyakData = sizeof($judul_buku);
		
		$allHistory = array(
			'judulBuku' => $judul_buku,
			'tanggalPinjam' => $tanggal_pinjam,
			'tanggalKembali' => $tanggal_kembali,
			'statusBuku' => $status_buku,
			'username' => $usernames,
			'banyakData' => $banyakData,
			'denda' => $bayaranDenda,
			'id' => $idPinjam,
			'id_user'=>$idUser
		);
		
		return $allHistory;
		
	}
	
	public function updateStatusBuku($idTerpilih)
	{
		
		$this->db->set('status_buku', 'Sudah Dikembalikan');
		$this->db->where('id_peminjam', $idTerpilih);
		$this->db->update('data_peminjam');
		
	}
	
	public function updateStatusBukuHilang($id)
	{
		
		$this->db->set('status_buku', 'Buku Hilang');
		$this->db->where('id_peminjam', $id);
		$this->db->update('data_peminjam');
		
	}
	
	public function getIdUser($username)
	{
		$data = array();
			$hasil = $this->db->get('data_peminjam');
		
		$kondisi = array(
			'username' => $username
		);
		
		$hasil = $this->db->get_where('data_user', $kondisi)->row();
		return $hasil->id_user;
	}
	
	public function getJudulBuku($id)
	{	
		$kondisi = array(
			'id_buku' => $id
		);
		
		$hasil = $this->db->get_where('data_buku', $kondisi)->row();
		return $hasil->judul_buku;
	}
	
	
	public function getAllPeminjam($username)
	{
		$id_user = $this->getIdUser($username);
		
		$dataSiap = $this->getHistory($id_user);
		
		return $dataSiap;
		
	}
	



}
?>	