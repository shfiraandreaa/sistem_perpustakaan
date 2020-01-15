<html>

    <head>
		<title></title>
    </head>

    <body>
		
		<h3>Berikut Ini Data Laporan Peminjam</h3>
			<label>Pilih Nama Anggota :</label>
				
				<select id="option-username">
					<option></option>
						
					
					<?php 
						
						$namaOrg = array();
						
						for($nomor=0; $nomor<$banyakData; $nomor++){
							
							$namaPerson = "";
							$namaPerson = $username[$nomor];
							
							
							if(in_array($namaPerson, $namaOrg)){
									
							}else{
								echo "<option>". $namaPerson. "</option>";
								$namaOrg[] = $namaPerson;
							}
							//echo "<option>". $username[$nomor]. "</option>"; 
						}
					?>
				</select>
				
				<button id="print-report">Download as PDF</button>
		<br><br>
		
		<form method="post" action=" Laporan ">
		
			<table id="data-laporan">
				<thead>
					<tr>
						<th>Id User</th>
						<th>Nama Anggota</th>
						<th>Judul Buku Dipinjam</th>
						<th>Tanggal Peminjam</th>
						<th>Tanggal Kembali</th>
						<th>Status Buku</th>
						<th>Denda</th>
					</tr>
				</thead>
					
				<tbody>
					<?php
						for($nomor=0; $nomor<$banyakData; $nomor++){
							echo "<tr>";
							echo "<td>". $id_user[$nomor]. "</td>";
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

			
		</form>
		
    </body>

</html>