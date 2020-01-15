<html>

	<head>
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/notifRegis.css" />
	</head>
	
	<body>

		<div class="notif">
			<h2>Registrasi Anda Berhasil Dilakukan!</h2>
			<h3>Silahkan Login dengan Menggunakan</h3>
				Username : <?= $username ?>
		<br>
				dan
		<br>
				Password  : <?= $password ?>
		<br><br>
				<a href = "/login"><button id="click">OK</button></a>
		</div>
	</body>
	
</html>