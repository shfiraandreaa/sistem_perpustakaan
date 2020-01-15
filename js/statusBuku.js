$(document).ready(function(){

    $('#btn-hilang').click(function(evt){
        evt.preventDefault();
        let wadahId = [];
        $(".check-buku:checked").each(function() {
            wadahId.push(this.value);
			//alert('a');
        });
       
        for(var nomor=0; nomor<wadahId.length; nomor++){
			
            var data = { id : wadahId[nomor] };
			
            var alamat = 'statusBukuHilang';

            $.post(alamat, data, function(respon){
				//alert(respon);
             });
        }

        location.reload();

    });
	

});