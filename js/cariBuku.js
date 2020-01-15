$(document).ready(function(){
	
	$('.search').keypress(function(){
		
		var data = {
			'judul_buku' : $(this).val()
		};
		var alamat = 'cari';
		//alert(data);
		
		$.post(alamat, data, function(respon){
			console.log(respon);
			var hasil = JSON.parse(respon);
			
			/* var data = "";
			
			var nomor = 0;
			
			for(nomor=0; nomor<hasil.length; nomor++){
				data = hasil.judul_buku+"<br>";
			} */
			
			//alert(hasil.length);
			
			$('.hasil-buku').html(hasil.judul_buku);
			$('.id').val(hasil.id_buku);
			
			
		});
		
	});
	
});