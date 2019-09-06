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

<link rel="stylesheet" href="../../vendors/plugins/sweetalert2.min.css">
    <link rel="stylesheet" href="../../vendors/animate.css/animate.css">


    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../../assets/css/style.css">

    
    <link href='../../https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark fondo">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <div class="login-form">
                    <p class="text-center" style="font-size: 70px;">
            <i class="fa fa-user"></i>
        </p>
           <p align="center">Iniciar Sesión</p>

                    <form action="../../Controladores/ControladorLogin.php?operacion=login" name="form" method="POST">
                        <input type="hidden" name="operacion" value="login">
                        <div class="form-group">
                            <div class="input-group ">
                          <div class="input-group-addon"><i class="fa  fa-envelope"></i></div>
                            <input required="required" name="correo" maxlength="30" type="email" class="form-control" placeholder="Correo">
                        </div>
                        </div>
                            <div class=" input-group form-group">
                                <div class="input-group-addon"><i class="fa 
                                fa-key"></i></div>
                                <input required="required" name="clave" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
                                <a style="color: blue;" href="../../Controladores/controladorLogin.php?operacion=olvido">Olvidó su contraseña?</a>
                            </label>

                                </div>

                                <button id="btn1" type="submit" value="Iniciar" class="btn btn-primary  btn-flat m-b-30 m-t-30"><i class="fa fa-check"></i>&nbsp;Entrar</button>
                                
                                
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>

     <!--  plugins sweet alert 2 -->
   <script src="../../vendors/plugins/sweetalert2.all.min.js"></script>
   <script src="../../vendors/popper.js/codigo.js"></script>


</body>

</html>
