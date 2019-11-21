<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de sesion</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="../../apple-touch-icon" href="apple-icon.png">
    <link rel="../../shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../../vendors/animate.css/animate.css">


    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../vendors/plugins/sweetalert2.min.css">

    
    <link href='../../https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark fondo">

    <?php

         if (extract($_REQUEST)) {?>
         <script type="text/javascript">
         var ress= '<?php echo $con;?>';

        if (ress==1) {
                swal("Hecho", "Se modifico su contraseña exitosamente", "success");
          } else if (ress==0) {
                swal("Lo sentimos", "No se pudo modificar su Contraseña ", "error");
          }else if (ress==4) {
                swal("Lo sentimos", "El usuario no existe ", "error");
          } 
          </script>
      <?php
    }
    ?>


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <div class="login-form">

          <!--   <h3 align="center" style="color: rgb(51, 51, 51); font-size: 32px; font-weight: bold; -webkit-font-smoothing: antialiased; letter-spacing: -1.2px;">Te damos la bienvenida</h3> -->

                    <p class="text-center" style="font-size: 50px;">
            <i class="fa fa-user"></i>
        </p>
           <p align="center">Iniciar Sesión</p>

                    <form action="../../Controladores/ControladorLogin.php?operacion=login" name="form" method="POST">
                        <input type="hidden" name="operacion" value="login">
                        <div class="form-group">
                            <div class="input-group ">
                          <div class="input-group-addon"><i class="fa  fa-envelope"></i></div>
                            <input required="required" name="correo" maxlength="25" minlength="15" type="email" class="form-control" placeholder="Correo">
                        </div>
                        </div>
                            <div class=" input-group form-group">
                                <div class="input-group-addon"><i class="fa 
                                fa-key"></i></div>
                                <input required="required" name="clave" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
                                <a style="color: blue;" href="../../Controladores/controladorLogin.php?operacion=olvido">¿Olvidó su contraseña?</a>
                            </label>

                                </div>

                                <button id="btn1" type="submit" value="Iniciar" class="btn btn-primary  btn-flat m-b-30 m-t-30"><i class="fa fa-check"></i>&nbsp;Entrar</button>
                                
                                
                    </form>
                </div>
            </div>
        </div>
    </div>
 <!-- footer del login -->
 <br><br><br><br><br>
 <div style="margin: 0px 0px 16px; text-align: center; width: 100%;">

  <a href="#" style="color: rgb(255, 255, 255); font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;" > ServiForm C.A Todos los derechos reservados (c)copyright 2019-2020  </a> 
</div>

    <script src="../../bootstrap/js/jquery.js"></script>
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
        if ($con==2) {

            echo '
                swal("Lo sentimos", "Usuario y/o Contraseña incorrectos ", "warning");

            ';
        }
        if ($con==1) {

            echo '
                swal("Completado", "Cambio de clave exitoso!", "success");

            ';
        }
      ?>
    </script>

     <!--  plugins sweet alert 2 -->
<!--    <script src="../../vendors/plugins/sweetalert2.all.min.js"></script>
   <script src="../../vendors/popper.js/codigo.js"></script>
 -->

</body>

</html>
