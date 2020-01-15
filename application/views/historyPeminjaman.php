<html>
	<head></head>
	
	<body>
		
		<table id="history-pinjam">
			<tr>
				<td>Judul Buku di Pinjam</td>
				<td>Tanggal Peminjaman</td>
				<td>Tanggal Pengembalian</td>
				<td>Status Buku</td>
				<td>Keterangan Denda</td>
			</tr>
			
				<?php
						for($nomor=0; $nomor<$banyakData; $nomor++){
							echo "<tr>";
							echo "<td>". $judulBuku[$nomor] . "</td>";
							echo "<td>". $tanggalPinjam[$nomor]. "</td>";
							echo "<td>". $tanggalKembali[$nomor] ."</td>";
							echo "<td>". $statusBuku[$nomor] ."</td>";
							echo "<td></td>";
						}
				?>
			
		</table>
		
	</body>
</html>