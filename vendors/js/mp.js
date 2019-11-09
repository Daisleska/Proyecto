function mas (X){

  $("#agregar").modal("show");
  $("#modal-agregar").attr("action","../inventario/materiaprima.php?ar="+X);

}


function menos (id){

  $("#retirar").modal("show");
  var stock;
  stock= $('#menos-'+id).attr("name"); 
  $("#modal-retirar").attr("action","../inventario/materiaprima.php?ar="+id);
  $(".retirar_stock").attr("id",stock);

}

function eliminar(id){
          
        swal({
            title: "¡Advertencia!",
            text: "¿Ésta seguro que deseas eliminar esta materia prima?",
            icon: "warning",
            buttons: ['Cancelar','Eliminar'],
            dangerMode: 'Eliminar',
          })
          .then((willDelete) => {
            if (willDelete) {
              
              window.location="materiaprima.php?borrar="+id;

            } else {
              


            }
      }); 

}


function ver(cod){
    $.ajax({
    type: "POST",
    url : "../inventario/ver_mp.php?inf=1",
    data: "cod="+cod,
     beforeSend: function(){
      $('#titulo').html('...');
    },
    success: function(respuesta){
      $('#titulo').html(respuesta);
    }

  });

  $.ajax({

    type: "POST",
    url : "../inventario/ver_mp.php?inf=2",
    data: "cod="+ cod,
     beforeSend: function(){
      $('#body').html('...');
    },
    success: function(respuesta){
      $('#body').html(respuesta);
    }

  });
    $('#ver-historial').attr('href','../inventario/ver-historial-mp.php?articulo='+cod);
    $('#ver_articulo').modal('show');
}

$('#btn-eliminar').click(function(e){
    var stock =0;
    stock= $(".retirar_stock").attr("id");
    var solicitud=0;
    solicitud = $('.retirar_stock').val();  
    
    if (parseInt(solicitud)>parseInt(stock)) {
      e.preventDefault();
      swal("Error", "No se cuenta con la cantidad requerida en el inventario para realizar esta operación" , "error");
    }else{
    }
});
