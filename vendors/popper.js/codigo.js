$("#btn0").click(function(){
    alert("Mensaje con Alert");    
});


$("#btn2").click(function(){
    Swal.fire({        
        type: 'success',
        title: 'Registro Exitoso!',
        animation: false,
        customClass: {
        popup: 'animated tada'
    }
    });
});	


let timerInterval
$("#btn1").click(function(){
    Swal.fire({
      title: 'Cargando por favor espere...',
      html: 'tiempo: <strong></strong> segundos.',
      timer: 2000, //tiempo del timer
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          Swal.getContent().querySelector('strong')
            .textContent = Swal.getTimerLeft()
        }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    });    
});


$("#btn3").click(function(){
    /*Swal.fire({
        //error
        type: 'error',
        title: 'Error',
        text: '¡Algo salió mal!',        
    });*/
    Swal.fire({        
        type: 'success',
        title: 'Cambio de clave exitoso',
        text: '¡Perfecto!',        
    });
});	

$("#btn4").click(function(){
    /*Swal.fire({
        //error
        type: 'error',
        title: 'Error',
        text: '¡Algo salió mal!',        
    });*/
    Swal.fire({        
        type: 'success',
        title: 'Respuesta correcta',
        text: '¡Perfecto!',        
    });
});	
