<html>

    <head></head>

    <body>

        <form method="post" action="simpanBuku" enctype="multipart/form-data">

            <table>

                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td><input type="text" name="judul_buku" value="" /></td>
                </tr>

                <tr>
                    <td>Pengarang Buku</td>
                    <td>:</td>
                    <td><input type="text" name="pengarang" value="" /></td>
                </tr>

                <tr>
                    <td>Penerbit Buku</td>
                    <td>:</td>
                    <td><input type="text" name="penerbit" value="" /></td>
                </tr>

                <tr>
                    <td>Jumlah Buku</td>
                    <td>:</td>
                    <td><input type="text" name="kuantiti" value="" /></td>
                </tr>

                <tr>
                    <td>Status Ketersediaan</td>
                    <td>:</td>
                    <td><input type="text" name="status_sedia" value="" /></td>
                </tr>

                <tr>
                    <td>Image Buku</td>
                    <td>:</td>
                    <td>
						<input type="file" name="picture" id="picture" />
                    </td>
                </tr>


            </table>

            <input type="submit" value="SIMPAN"/>
        </form>

    </body>

</html>