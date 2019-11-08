$(document).ready(function(){


	
	// funciones para los submenu, si da click se abre o se cierra el submenu
	$(".menu li:has(ul)").click(function(e){
		e.preventDefault();

		if($(this).hasClass('activado')){
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();

		}else{

			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}
	}); //fin de submenu

	// .iconav (icono que aparece solamente cuando el usuario esta en modo tableta o telefono):
	// si da click en .iconav desliza el menu hacia abajo o hacia arriba


	$('.iconav').click(function(){
		$('.contenedor').slideToggle();
	});

	// funcion para el diseño responsive

	// si hay un cambio en la dimencion de pantalla, por ejemplo, en una table que pasa de modo a horizontal a vertical.
	// y la pantalla es mayor a 600 se muestra el menu en la parte izquierda, sino el menu se ocultará.
		$(window).resize(function(){

			if ($(document).width()>600){

				$('.contenedor').css({'display' : 'block'});
			}

			if ($(document).width()<600){

				$('.contenedor').css({'display' : 'none'});
				$('.menu li ul').slideUp();
				$('.menu li').removeClass('activado');
			}
		}); //fin del diseño responsive


		// funcion para obtener y abrir el link solicitado
		
		$('.menu li ul li a').click(function(){
			window.location.href = $(this).attr("href");
		}); //fin


		// si esta en modo telefono/tableta y selecciona un enlace, hacer que el menu se despliegue hacia arriba

		$('.menu .a').click(function(){

			if ($(document).width()<600){

				$('.contenedor').slideUp();
				
			}
		});

		$('.menu .sa').click(function(){ // si selecciona un enlace dentro de un submenu, hacer lo ya mencionado

			if ($(document).width()<600){

				$('.contenedor').slideUp();
				
			}
		});

		//fin

		// animaciones del nav

		if (X==1){

			$('.btn-inicio').addClass('active');
		}
		if (X==2){

			$('.btn-vehiculos').addClass('active');
		}

		if (X==3){

			$('.btn-inventario').addClass('active');
		}

		if (X==41){

			$('.btn-reportes').addClass('active');
			$('.btn-r-mantenimiento').addClass('active');
		}

		if (X==42){

			$('.btn-reportes').addClass('active');
			$('.btn-r-eventualidades').addClass('active');
		}

		if (X==43){

			$('.btn-reportes').addClass('active');
			$('.btn-r-compras').addClass('active');
		}

		if (X==44){

			$('.btn-reportes').addClass('active');
			$('.btn-r-almacen').addClass('active');
		}
		
	
		if (X==45){

			$('.btn-reportes').addClass('active');
			$('.btn-r-estadistico').addClass('active');
		}


		if (X==51){
			$('.btn-solicitudes').addClass('active');
			$('.btn-mantenimiento').addClass('active');

		}
		if (X==52){
			$('.btn-solicitudes').addClass('active');
			$('.btn-almacen').addClass('active');

		}

		if (X==53){
			$('.btn-solicitudes').addClass('active');
			$('.btn-compras').addClass('active');

		}

		if (X==6){

			$('.btn-historial').addClass('active');
		}

		if(X==7){

			$('.btn-usuario').addClass('active');
		}

		if (X==8){

			$('.btn-ajuste').addClass('active');

		}

		if (X==9){

			$('.btn-mantenimiento').addClass('active');

		}

		if ($('.btn-mantenimiento').hasClass('active')){

			$('#icon_mante2').attr('src','img/mantenimiento-active.svg');
			$('#icon_mante2').css({'display' : 'inline-block'});
		}else{
			$('#icon_mante2').attr('src','img/mantenimiento.svg');
			$('#icon_mante2').css({'display' : 'inline-block'});
		}


		$('#user-nav').click(function(e){

			e.preventDefault();

			if ($('.div-modal-1').hasClass('v-activada')) {
					
				$('.div-modal-1').css({'display':'none'});
				$('.div-modal-1').removeClass('v-activada');
			}else{

				$('.div-modal-2').css({'display':'none'});
				$('.div-modal-2').removeClass('v-activada');

				$('.div-modal-1').css({'display':'block'});
				$('.div-modal-1').addClass('v-activada');
			}


		});

		$('#bell-nav').click(function(e){


			e.preventDefault();

			if ($('.div-modal-2').hasClass('v-activada')) {
				$('.div-modal-2').css({'display':'none'});
				$('.div-modal-2').removeClass('v-activada');

			}else{

				$('.div-modal-1').css({'display':'none'});
				$('.div-modal-1').removeClass('v-activada');
				$('.div-modal-2').css({'display':'block'});
				$('.div-modal-2').addClass('v-activada');
				var id= $('.n_notifi').prop('id');

				if (parseInt(id)>0) {

					var user = $('.n_notifi').attr('name');
					 $.ajax({
						type: "POST",
						url : "funciones/ver_notificaciones.php",
						data: "user="+user,
						 beforeSend: function(){
						 
						},
						success: function(respuesta){
					   	
					   	 if (respuesta==1) {

					   	 	$('.n_notifi').css({'display':'none'});
					   	 	$('.n_notifi').removeAttr('name');
					   	 }
					 }

					});
				}
			}

		});

});
