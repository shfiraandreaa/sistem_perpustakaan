<html>

    <head>
		<title></title>
    </head>

    <body>
		
		<form method="post" action=" approveAnggota ">
		
			<table id="data-anggota">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Anggota</th>
						<th>NIM Anggota</th>
						<th>Username</th>
						<th>Email Anggota</th>
						<th>Keterangan Mahasiswa</th>
						<th>Keterangan Ktm </th>
						<th>Status Approve</th>
					</tr>
				</thead>
					
				<tbody>
					<?php
						for($nomor=0; $nomor<$banyakData; $nomor++){
							echo "<tr>";
							echo "<td>". ($nomor+1). "<input type='checkbox' name='id[]' value='".$id[$nomor]."'/></td>";
							echo "<td><span>". $nama[$nomor] . "</span></td>";
							echo "<td><span>". $nim[$nomor]. "</span></td>";
							echo "<td><span>". $username[$nomor] ."</span></td>";
							echo "<td><span>". $email[$nomor] ."</span></td>";
							echo "<td><span>". $mhs_aktif[$nomor] ."</span></td>";
							echo "<td><span>". $ktm[$nomor] ."</span></td>";
							echo "<td><span>". $ket_approve[$nomor] ."</span></td>";
							echo "</tr>";
						}
					?>
				</tbody>

			</table>

			<input type="submit" id="btn-approve" value="Approve" />
			
		</form>
		
    </body>

</html>