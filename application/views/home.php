<?php
	if($userType == "Admin"){
		$setMenu = 'menu-admin';
		$setIsi = 'isi-admin';
	}else if($userType == "Manager"){
		$setMenu = 'menu-manager';
		$setIsi = 'isi-manager';
	}else{
		$setMenu = 'menu-general';
		$setIsi = 'isi-general';
	}
	
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/jquery.dynatable.css" />
		<script src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/jquery.dynatable.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/myDynatable.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/dynatablePeminjam.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/dynatableLaporan.js"></script>
		<script src="<?= base_url()?>js/scrollMenu.js"></script>
		<script src="<?= base_url()?>js/keranjang.js"></script>
		<script src="<?= base_url()?>js/batalBuku.js"></script>
		<script src="<?= base_url()?>js/statusBuku.js"></script>
		<script src="<?= base_url()?>js/printReport.js"></script>
		<script src="<?= base_url()?>js/cariBuku.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/home.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/dataTable.css" />
		<link rel="shortcut icon" href="<?= base_url()?>images/logo.ico" />
		<title>Dashboard</title>
	</head>
	
	<body>
		
		
		<div class="all-menu <?= $setMenu ?>">
			
				<div class="controll-menu">
					<h3>PILIH MENU</h3>
				</div>

				<div class="sub-menu">

					<div class="item">
						<a href="home"><img src="<?= base_url()?>images/home.png"/>Home</a>
					</div>

					<?php
						if($userType == "Admin"){
							$this->view('menuAdmin');
						}else if($userType == "Manager"){
							$this->view('menuManager');
						}else{
							$this->view('menuGeneral');
						}
					?>

				</div>

		</div>

			<div class="all-logo">
				<div id="logo-perpus">

					<img class="logo" src="<?= base_url()?>images/book.png"/>

					<div class="bawah">
						<span class="span-atas">DATA PERPUSTAKAAN</span>
					</div>
				</div>

				<div class="logout">
					<a href="logout"><img src="<?= base_url()?>images/logout.png" />Logout</a>
				</div>
			</div>
			
		
		
	
		
		<div class="kontainer <?= $setIsi ?>">
	
			<?php
				if($page == "daftarBuku"){
					$data = $Home->getDataBuku();
					$this->load->view('daftarBuku', $data);
				}elseif($page == "dataAnggota"){
					$data = $Home->getAllAnggota();
					$this->load->view('dataAnggota',$data);
				}elseif($page == "dataPeminjam"){
					$data = $Home->getHistory();
					$this->load->view('dataPeminjam', $data);
				}elseif($page == "formBuku"){
					$this->load->view('formBuku');
				}elseif($page == "dataLaporan"){
					$data = $Home->getDataLaporan();
					$this->load->view('dataLaporan',$data);
				}elseif($page == "formPinjam"){
					$username = $this->session->userdata('username');
					date_default_timezone_set("Asia/Jakarta");
					$tanggal =  date('Y-m-d');

					$tanggalKembali = date('Y-m-d',strtotime('+7 days'));

					$data = array(
						'username' => $username,
						'tanggal' => $tanggal,
						'tanggalKembali' => $tanggalKembali
					);

					$this->load->view('formPinjam',$data);
				}elseif($page == "keranjangBuku"){
					$hasil = $Home->getDataKeranjang();
					$this->load->view('keranjangBuku',$hasil);
				}elseif($page == "historyPeminjaman"){
					$data = $Home->getHistory();
					$this->load->view('historyPeminjaman', $data);
				}
			?>

		</div>
		
	</body>
</html>