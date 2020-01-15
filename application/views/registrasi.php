<?php

	if(isset($notif)){
		$notifStatus = $notif;
	}else{
		$notifStatus= '';
	}

?>


<html>

	<head>
		<script src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
		<script src="<?= base_url()?>js/cekDuplikat.js"></script>
		<link rel="stylesheet" text="text/css" href="<?= base_url()?>css/registrasi.css" />
		<title>Registrasi Anggota</title>
	
	</head>
	
	<body>
	
		<form id="regis-anggota" method="post" action="registrasi/submit">
		
			<div class="form-isi">
				<h2> Formulir Pendaftaran Anggota Perpustakaan </h3>
					<div id="label">
						<label>Masukan Nama Anda :</label>
					<br><br>
						<label>Masukan Nim Anda :</label>
					<br><br>
						<label>Masukan E-mail Anda :</label>
					<br><br>	
						<label>Buat Username Anda :</label>
					<br><br>	
						<label>Buat Password Anda :</label>
					</div>
					
					<div id="input">
						<input type="text" name="nama" required />
					<br><br>
						<input type="text" value="" name="nim" maxlength="8" required />
					<br><br>
						<input type="text" value="" name="email" required />
					<br><br>
						<input type="text" value="" name="username" id="cekUser" required/>
						<div class="gmb-error"><img id="img-error" src="<?= base_url()?>images/error.png"></div>
					<br><br>
						<input type="text" value="" name="password" maxlength="8" required/>
					</div>
			<hr>
				<h3>Syarat Menjadi Anggota</h3>
				<input type="checkbox" name="mhsAktif" value="aktif" required/>Mahasiswa Aktif STMIK Mardira Indonesia
			<br>
				<input type="checkbox" name="ktm" value="aktif" required/>Memiliki Kartu Tanda Mahasiswa
			<br><br>
				
				<div id="submit">
					<input type="submit" id="btn-submit" value="Sign-Up" />
				</div>
				
			</div>
			
		</form>
	
	</body>

</html>