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
		<script src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/jquery.dynatable.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>js/myDynatable.js"></script>
		<script src="<?= base_url()?>js/scrollMenu.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/home.css" />
		<link rel="shortcut icon" href="<?= base_url()?>images/logo.ico" />
		<title>Dashboard</title>
	</head>
	
	<body>
		
		
		<div class="all-menu <?= $setMenu ?>">
			
			<div id="logo-perpus">

				<img class="logo" src=""/>

				<div class="bawah">
					<span class="span-atas">DATA PERPUSTAKAAN</span>
				</div>
			</div>
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
			
		</div>
		
		<div class="atas">
			<img id="chat" src="<?= base_url()?>images/chat.png"/>
			<img src="<?= base_url()?>images/fly.png"/>
			<img id="setting" src="<?= base_url()?>images/atom.png"/>
			<div class="isi">
				<img src="<?= base_url()?>images/user.png"/>
			</div>
			<div class="logout">
				<a href="logout"><img src="<?= base_url()?>images/logout.png" /></a>
			</div>
		</div>
		
		<div class="kontainer <?= $setIsi ?>">
	
			<?php
				if($page == "daftarBuku"){
					$this->load->view('daftarBuku');
				}elseif($page == "dataAnggota"){
					$this->load->view('dataAnggota');
				}elseif($page == "dataPeminjam"){
					$this->load->view('dataPeminjam');
				}elseif($page == "formBuku"){
					$this->load->view('formBuku');
				}elseif($page == "formLaporan"){
					$this->load->view('formLaporan');
				}elseif($page == "dataLaporan"){
					$this->load->view('dataLaporan');
				}elseif($page == "cetakLaporan"){
					$this->load->view('cetakLaporan');
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

				}elseif($page == "formPengembalian"){
					$this->load->view('formPengembalian');
				}
			?>

		</div>
		
	</body>
</html>