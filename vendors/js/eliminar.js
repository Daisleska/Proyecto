$(document).ready(function(){

	$('.x').click(function(e){
		e.preventDefault();
		$('#eliminar').modal('show');
	});

	$('.ver').click(function(e){
		e.preventDefault();
		$('#ver').modal('show');

	});


});