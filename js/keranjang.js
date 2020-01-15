$(document).ready(function(){

    $('.dataBuku').click(function(){

        $(this).find('.kuantiti').css('display','inline-block');
        $(this).find('.submit').css('display','block');

        // munculin kuantity dan button ok (simpan ke keranjang)

    });

    $('.submit').click(function(){



        var id_buku = $(this).prev().val();
            //alert(id_buku);
        var kuantiti = $(this).prev().prev().prev().val();
            //alert(kuantiti);
        var alamat = 'simpanKeranjang';

        var data = {
            'id_buku' : id_buku,
            'kuantiti' : kuantiti
        };

          $.post(alamat, data, function(respon){
             // alert(respon);
				location.reload();
         });

    });
	

});