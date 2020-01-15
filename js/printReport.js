$(document).ready(function(){
	
	$('#print-report').click(function(){
		
		var hasilUsername = $("#option-username").val();
		//alert(hasilUsername);
		var alamatTujuan = "/print/report?username="+hasilUsername;
		window.location = alamatTujuan;
		
	});
	
});