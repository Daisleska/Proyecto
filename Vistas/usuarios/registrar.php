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

    <link href='../../https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark fondo">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <p class="text-center" style="font-size: 50px;">
            <i class="fa fa-user"></i>
        </p>
           <p align="center">Registro de usuario</p>
                <div class="login-form">
                     </div>

                    <form action="../../Controladores/controladorUsuario.php" method="POST" name="form">

             <div class="form-group" >
                <select name="tipo_usuario" title="Seleccione un nivel" required="required" class="form-control">
                    <option>* Tipo de usuario</option>

                    <option value="Usuario l">Usuario 1</option>
                    <option value="Usuario 2">Usuario 2</option>
                </select>
            </div>

                        <div class="form-group">
                            <label>* Nombre</label>
                            <input name="nombre" maxlength="30" type="text" class="form-control" placeholder="nombre">
                        </div>

                        


                            <div class="form-group">
                                <label>* Correo</label>
                                <input name="correo" required="required" maxlength="30" type="email" class="form-control" placeholder="Correo">
                        </div>
                                <div class="form-group">
                                    <label>* Contraseña</label>
                                    <input name="clave" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña">
                        </div>

                         
                                <div class="form-group">
                                    <label>* Repetir Contraseña</label>
                                    <input name="clave_repetir" required="required" minlength="6" maxlength="20" type="password" class="form-control" placeholder="Contraseña">
                        </div>

                        <div class="form-group">
                                    <label>* Pregunta de Seguridad</label>
                                    <input name="pregunta" required="required" minlength="2" maxlength="90" type="text" class="form-control" placeholder="color favorito?">
                        </div>

                        <div class="form-group">
                                    <label>* Respuesta</label>
                                    <input name="respuesta" required="required" minlength="2" maxlength="90" type="text" class="form-control" placeholder="Azul">
                        </div>


                                  <!--   <div class="checkbox">
                                        <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                                    </div> -->
                                <p>(*) Campos obligatorios</p>

                                <input type="hidden" name="operacion" value="guardar">

                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"> Registrar</button>
                            
                                    <div class="register-link m-t-15 text-center">
                                        <p> Ya posee una cuenta ? <a href="../../login.php"> Volver</a></p>
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
