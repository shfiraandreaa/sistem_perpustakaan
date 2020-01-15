<html>
    <head></head>

    <body>
        
        <form method="post" action="simpanPeminjam">
            <label>Nama Peminjam : </label>
                <input type="text" name="nama_peminjam" value="<?= $username ?>" readonly />
        <br>
            <label>Judul Buku Dipinjam : </label>
				<input type="hidden" name="id_buku" class="id" value="" />
                <input type="text" name="judul_buku" class="search" value="" />
        <br>
            <label> Tanggal Pinjam :</label>
                <input type="date" name="tgl_pinjam" value="<?= $tanggal ?>" readonly />
        <br>
            <label> Batas Kembali Buku :</label>
                <input type="date" name="tgl_kembali" value="<?= $tanggalKembali ?>"readonly />
        <br>
            <input type="submit" value="SUBMIT"/ >
			

        </form>
		
		<div class="hasil-buku">
		
		</div>
    </body>
</html>