

$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });


});

/* /*Salir del sistema*/
 /*   $('.btn-exit').on('click', function(){
    	swal({
		  	title: '¿Estas seguro que quieres Salir?',
		 	text: "Si cierra sesión se finalizara totalmente el sistema",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonText: 'Si',
		  	closeOnConfirm: false
		},
		function(isConfirm) {
		  	if (isConfirm) {
		    	window.location='login.php'; 
		  	}
		});
    });*/ 

$(buscar_datos()); 

function buscar_datos(consulta){
	$.ajax({
		url: '../../buscar/buscar.php',
		type:'POST',
		datatype:'html',
		data:{consulta: consulta},

	} )
	.done(function(respuesta){ 
		$("#datos").html(respuesta);
	
	})
	.fail(function(){
		console.log("error");
	})
}

$(document).on('keyup', '#caja_busqueda', function(){
	var valor= $(this).val();
	if (valor !="") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});




