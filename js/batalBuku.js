$(document).ready(function(){

    $('#btn-batal').click(function(evt){
        evt.preventDefault();
        let wadahId = [];
        $(".keranjang:checked").each(function() {
            wadahId.push(this.value);
           // alert(this.value);
        });
       
        for(var nomor=0; nomor<wadahId.length; nomor++){

            //alert(wadahId[nomor]);

            var data = { id : wadahId[nomor] };

            //console.log(data);
            var alamat = 'hapusKeranjang';

            $.post(alamat, data, function(respon){
                // alert(respon);
             });
        }

        location.reload();

    });

});