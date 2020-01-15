<html>

	<head>
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/login.css" />
		<link rel="shortcut icon" href="<?= base_url()?>images/logo.ico" />
	</head>
	
	<body>
		
		<div class="utama">
			<div class="kiri">
				<div class="wadah-images">
					<img src="images/fb.png"/>
					<img src="images/twitter.png"/>
					<img src="images/google.png"/>
				</div>
			<br>
				<span>Don't have an account?</span>
			<br>
				<a href="registrasi" class="register">Sign-Up</a>
			</div>
			
			<div class="kanan">
				<form method="POST" action="login/verifikasi">
					<input type="text" name="username" placeholder="Username">
					<br>
					<input type="password" name="password" placeholder="Password">
					<br>
					<div>
						<input type="checkbox">
						<span>Remember Me</span>
					</div>
					<input type="submit" value="LOGIN">

					<p id="warning"><?php echo $status; ?></p>
					
				</form>
			</div>
		</div>
		
	</body>

</html>