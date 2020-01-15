$(document).ready(function(){
	
	var konfigTable = {
		
		defaultColumnIdStyle: 'camelCase'
	};
	
	var konfigFitur = {
		
		paginate: true,
		search: true,
		recordCount: false,
		perPageSelect: false
		
	};
	
	var pokok = {table: konfigTable, features: konfigFitur};
	
	$('#daftar-buku').dynatable(pokok);
	
	
});