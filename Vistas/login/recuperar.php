<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="../../apple-touch-icon" href="apple-icon.png">
    <link rel="../../shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">

     <link rel="stylesheet" href="../../vendors/plugins/sweetalert2.min.css">

    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='../../https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark fondo">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
             <div class="login-form">
                    <p class="text-center" style="font-size: 70px;">
            <i class="fa fa-key"></i>
        </p>
           <p align="center">Recuperar Contraseña</p>

             
              
                    <form action="../../Controladores/ControladorLogin.php" method="POST" name="form">
                        <input type="hidden" name="operacion" value="validar_correo">
                        <label>Correo</label>
                        <div class="input-group form-group">
                            <div class="input-group-addon"><i class="fa  fa-envelope"></i></div>
                            <input name="correo" required="required" minlength="15" maxlength="25" type="email" class="form-control" placeholder="Juan1234@gmail.com" title="Correo ingresado al registrarte">
                        </div>

                        <div class="register-link m-t-15 text-center">
                                        <p> ¿Desea regresar? <a href="login.php"> Volver</a></p>
                                    </div>
                            <button type="submit" name="enviar" value="enviar" class="btn btn-primary btn-flat m-b-15"><i class="fa fa-check"></i>&nbsp;Recuperar</button>

                    </form>
             
            </div>
        </div>
    </div>
</div>

<div style="margin: 0px 0px 16px; text-align: center; width: 100%;">

  <a href="#" style="color: rgb(255, 255, 255); font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;" > ServiForm C.A Todos los derechos reservados (c)copyright 2019-2020  </a> 
</div>



    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../vendors/js/sweetalert.min.js"></script>
   <script src="../../vendors/popper.js/codigo.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendors/js/feather.min.js"></script>
    <script>
      feather.replace();
        <?php
        error_reporting(0);
        extract($_REQUEST);
        if ($con==1) {

            echo '
                swal("Error", "Correo no registrado ", "error");

            ';
        }
        if ($con==2) {

            echo '
                swal("Lo Sentimos!", "La Respuesta no es correcta", "error");

            ';
        }

        if ($con==3) {

            echo '
                swal("Lo Sentimos!", "Fallo al cambiar clave, intente nuevamente", "error");

            ';
        }
         if ($con==4) {

            echo '
                swal("Lo sentimos", "Los campos no coinciden ", "warning");

            ';
        }
      ?>
    </script>



</body>

</html>