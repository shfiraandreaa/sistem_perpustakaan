<html>

    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>css/keranjangBuku.css" />
    </head>

    <body>

        <form method="post" action="pinjamBuku">
            <table id="keranjang-buku">

                <tr>
                    <td>Id Keranjang</td>
                    <td>Judul Buku Dipinjam </td>
                    <td>Buku Karangan </td>
                    <td>Cover Buku </td>
                    <td>Jumlah Buku Dipinjam</td>
                </tr>

                <?php
                     if(isset($id_keranjang)){
                        for($nomor=0; $nomor<$banyakData; $nomor++){
							
							if($cover[$nomor] == ""){
								$gambar = "default.png";
							}else{
								$gambar = $cover[$nomor];
							}

                            echo "<tr>";
                            echo "<td><input type='checkbox' name='id' class='keranjang' value='".$id_keranjang[$nomor]."'/></td>";
                            echo "<td><input type='hidden' name='id_buku' value='".$id_buku[$nomor]."'/>".$judul_buku[$nomor].
                                "<input type='hidden' name='id_keranjang[]' value='". $id_keranjang[$nomor] ."'/></td>";
                            echo "<td>".$pengarang[$nomor]."</td>";
                            echo "<td><img src='" . base_url()."uploads/". $gambar ."'/>";
                            echo "<td>".$kuantiti[$nomor]."</td>";
                            echo "</tr>";
                        }
                     }else{
                         echo "Buku Tidak Tersedia";
                     }
                ?>
               
            </table>
        <br><br>
            <input type="submit" value="PINJAM"/>
            <button id="btn-batal">BATAL</button>
        </form>
    </body>

</html>