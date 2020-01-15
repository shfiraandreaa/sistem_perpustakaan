$(document).ready(function(){

    $('#cekUser').keyup(function(){
		//alert('test');
        var isian = $(this).val();
        
        if(isian.length > 4){

            //alamat sesuai route
            // double .. itu up one folder
            var alamat = "validuser";
            var data = {
                'username' : isian
            };

            $.post(alamat, data, function(respon){
                //alert(respon);
                if(respon == "Duplikat"){
                    $('#img-error').css('display','block');
                    $('#btn-submit').prop('disabled',true);
                }else{
                    $('#img-error').css('display','none');
                    $('#btn-submit').prop('disabled',false);
                }
                //console.log('anda mengisi ' + isian + ' ' + respon);
            });
        }
		
	});

});