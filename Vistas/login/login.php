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
    <title>Inicio de sesion</title>
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

                    <form action="../../Controladores/controladorLogin.php?operacion=login" name="form" method="POST">
                        <input type="hidden" name="operacion" value="login">
                        <div class="form-group">
                            <label>Correo</label>
                            <input required="required" name="correo" maxlength="30" type="email" class="form-control" placeholder="Correo">
                        </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input required="required" name="clave" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Recordar Clave
                            </label>
                                    <label class="pull-right">
                                <a href="../../Controladores/controladorLogin.php?operacion=olvido">Olvidó su contraseña?</a>
                            </label>

                                </div>
                                <button type="submit" value="Iniciar" class="btn btn-success   btn-flat m-b-30 m-t-30">Entrar</button>
                                
                                <div>
                                    <button class="btn btn secondary">
                                    <a href="../../Controladores/controladorUsuario.php?operacion=registrar"> Registrarte</a>
                                    </button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/main.js"></script>


</body>

</html>
