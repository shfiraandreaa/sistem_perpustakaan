<html>

    <head>
		<link rel="stylesheet" type="text/css"" href="<?= base_url() ?>css/daftarBuku.css" />
		<title></title>
    </head>

    <body>

		<div id="utama">

			<?php
				if($userType == "General"){
					echo "<div id='img-keranjang'/>";
					echo "<a href='/home?view=keranjangBuku'><img src='". base_url()."images/bag.png'/></a>";
					echo "<span id='total-buku'>". $jumlah ."</span>";
					echo "</div>";
				}
			?>

			<?php
				for($nomor=0; $nomor<$banyakData; $nomor++){

					if($img_buku[$nomor] == ""){
						$gambar = "default.png";
					}else{
						$gambar = $img_buku[$nomor];
					}

					if($userType == "Admin"){
						echo "<div class='dataBuku'>";
						echo "<span>Judul Buku : ".$judul_buku[$nomor]."</span>";
						echo "<br>";
						echo "<span>Pengarang Buku : " .$pengarang[$nomor]."</span>";
						echo "<br>";
						echo "<img src='" . base_url()."uploads/" .$gambar ."'/>";
						echo "<br>";
						echo "<span>Status Buku : " . $status_ketersediaan[$nomor] ."</span>";
						echo "<br>";
						echo "<span class='jumlah'>Jumlah Buku : <input type='text' class='kuantiti' value=''/>";
						echo "</div>";
					}else{
						
						echo "<div class='dataBuku'>";
						echo "<span>Judul Buku : ".$judul_buku[$nomor]."</span>";
						echo "<br>";
						echo "<span>Pengarang Buku : " .$pengarang[$nomor]."</span>";
						echo "<br>";
						echo "<img src='" . base_url()."uploads/" .$gambar ."'/>";
						echo "<br>";
						echo "<span>Status Buku : " . $status_ketersediaan[$nomor] ."</span>";
						echo "<br>";
						echo "<span class='jumlah'>Jumlah Dipinjam : <input type='number' class='kuantiti' value=''/>";
						echo "<br>";
						echo "<input type='hidden' class='id_buku' value='". $id_buku[$nomor] ."'/>";
						echo "<button class='submit'>SIMPAN</button>"; 
						echo "</div>";
					}
					
				}
			?>

		</div>

    </body>

</html>