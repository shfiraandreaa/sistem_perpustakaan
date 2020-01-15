<html>

    <head>
		<title></title>
    </head>

    <body>

	<form method="post" action=" statusBuku ">
	
        <table id="data-peminjam">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Peminjam</th>
					<th>Judul Buku dipinjam</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Kembali Buku</th>
					<th>Status Buku</th>
					<th>Denda</th>
				</tr>
			</thead>
				
			<tbody>
				
					<?php
						for($nomor=0; $nomor<$banyakData; $nomor++){
								echo "<tr>";
								echo "<td><input type='checkbox' name='id[]' class='check-buku' value='".$id[$nomor]."'/></td>";
								echo "<td>". $username[$nomor]."</td>";
								echo "<td>". $judulBuku[$nomor] . "</td>";
								echo "<td>". $tanggalPinjam[$nomor]. "</td>";
								echo "<td>". $tanggalKembali[$nomor] ."</td>";
								echo "<td>". $statusBuku[$nomor] ."</td>";
								echo "<td>". $denda[$nomor] ."</td>";
								echo "</tr>";
							}
						
					?>
				
			</tbody>
					
		</table>
		
			<input type="submit" id="btn-kembali" value="Buku Kembali" />
			<button id="btn-hilang" >Buku Hilang</button>
		</form>
    </body>

</html>