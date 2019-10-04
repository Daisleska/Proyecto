<?php 
extract($_REQUEST);
?>

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

    <link rel="stylesheet" href="../../assets/css/style.css">

     <link rel="stylesheet" href="../../vendors/plugins/sweetalert2.min.css">
    <link rel="stylesheet" href="../../vendors/animate.css/animate.css">
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
           <p align="center">Cambiar Contraseña</p>


                
                    <form action="../../Controladores/ControladorLogin.php" method="POST" name="form">
                        <input type="hidden" name="operacion" value="cambiar_clave">
                        <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">

                        
                        <label>Clave Nueva:</label>
                            <div class="input-group form-group">
                            <div class="input-group-addon"><i class="fa 
                                fa-key"></i></div>
                            <input required="required" maxlength="20" minlength="6" type="password" class="form-control"  title="Ingrese nueva clave" name="clave_nueva">
                        </div>

                    
                        <label>Confirmar Clave:</label>
                        <div class="input-group form-group">
                            <div class="input-group-addon"><i class="fa 
                                 fa-repeat"></i></div>
                            <input required="required" maxlength="20" minlength="6" type="password" class="form-control"  title="Confirme su nueva clave" name="clave_nueva_confirm">
                        </div>


                        <div class="register-link m-t-15 text-center">
                                        <p> ¿Desea regresar? <a href="login.php"> Volver</a></p>
                                    </div>

                            <button type="submit" value="enviar" name="enviar" class="btn btn-primary btn-flat m-b-15"><i class="fa fa-check"></i>&nbsp;Enviar</button>

                            


                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>

    
     <!--  plugins sweet alert 2 -->
   <script src="../../vendors/plugins/sweetalert2.all.min.js"></script>
   <script src="../../vendors/popper.js/codigo.js"></script>


</body>

</html>