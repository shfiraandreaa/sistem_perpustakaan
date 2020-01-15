$(document).ready(function(){
	
	var konfigTable = {
		
		defaultColumnIdStyle: 'camelCase'
	};
	
	var konfigFitur = {
		
		paginate: true,
		search: false,
		recordCount: false,
		perPageSelect: false
		
	};
	
	var pokok = {table: konfigTable, features: konfigFitur};
	
	$('#data-laporan').dynatable(pokok);
	
	
});