			$(document).ready(function(){
				$("#estado_s").change(function () {

					$('#parroquia_s').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

					$("#estado_s option:selected").each(function () {
						id_estado = $(this).val();
						
						$.post("../getciudad.php", { estado: id_estado}, function(data){
							$("#ciudad_s").html(data);

						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#estado_s").change(function () {
					$("#estado_s option:selected").each(function () {
						id_estados = $(this).val();
						$.post("../getmunicipio.php", {estadod: id_estados }, function(dato){
							$("#municipio_s").html(dato);
						});            
					});
				});
				});
			$(document).ready(function(){
				$("#municipio_s").change(function () {
					
					$("#municipio_s option:selected").each(function () {
						id_parroquia = $(this).val();
						
						$.post("../getparroquia.php", { parroquia: id_parroquia}, function(datu){
							$("#parroquia_s").html(datu);

						});            
					});
				})
			});

 $(document).ready(function() {	
	$('#documento').blur(function(){
		

		var username = $("#documento").val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "validar-cedula.php",
            data: dataString,
            success: function(data) {
			$('#documento').html(data);
            }
        });
    });              
}); 
