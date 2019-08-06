<?php
 /* date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');*/ /*Hacemos la Conexión a la Base de Datos*/

  /*$id=$_SESSION['id'];
  $sql="SELECT * FROM usuario where id='$id'";
  $query = mysqli_query($conectar,$sql);*/
?>




<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Serviform C.A</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="../apple-touch-icon" href="apple-icon.png">
    <link rel="../shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='../../https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><img src="../images/serviform.jpg" width="100" height="70" alt="Logo"></a>
               <!--  <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Vistas/home.php"> <i class="menu-icon fa fa-home"></i>Inicio </a>
                    </li>
                    <h3 class="menu-title">ALMACEN</h3><!-- /.menu-title -->
                   

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Proveedores</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-edit"></i><a href="../registros/registro_proveedor.php">Registrar</a></li>
                            <li><i class="menu-icon fa fa-book"></i><a href="../listado/listado_proveedor.php">Listado</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-barcode"></i>Materia Prima</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-edit"></i><a href="../registros/registrar_materiaprima.php">Registrar</a></li>
                            <li><i class="fa fa-table"></i><a href="../listado/listado_mp.php">Listado</a></li>
                        </ul>
                    </li>

                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-archive"></i>Inventario</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-edit"></i><a href="../registros/registrar_inventario.php">Registrar</a></li>
                            <li><i class="fa fa-list"></i><a href="../listado_inventario.php">Listado</a></li>
                        </ul>
                    </li>
                    

                    <h3 class="menu-title">RECURSOS HUMANOS</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Empleados</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-edit"></i><a href="../registros/registro_empleados.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="../listado/listados_empleados.php">Listado</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Asistencia</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-edit"></i><a href="../registros/asistencia.php">Registro</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="../listado/listados_empleados.php">Listado</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Asig / deducc</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="../registros/registro_asig.php">Registrar</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="../listado/listados_asig.php">Listado</a></li>
                        </ul>
                    </li>

                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Nomina</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="#">Asignar</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="#">Listado</a></li>
                        </ul>
                    </li>

                  

                    <h3 class="menu-title">Ajustes</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Mantenimiento</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-desktop"></i><a href="../config/bitacora.php">Bitacora</a></li>
                            <li><i class="menu-icon fa fa-cloud"></i><a href="../config/respaldar.php">Respaldar BD</a></li>
                            <li><i class="menu-icon fa fa-cloud-upload"></i><a href="../config/restaurar.php">Restaurar BD</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


                        <!--  -->
                    </div>
                </div>


                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="config/perfil.php"><i class="fa fa-user"></i> Mi perfil</a>

                            <a class="nav-link" onclick="return confirm('Seguro desea ir a registrar un nuevo usuario? debe salir del sistema')" href="../registrar.php"><i class="fa fa-user"></i>Registrar usuario</a>

                           
                        </div>
                    </div>
                     <div  onclick="return confirm('desea salir del sistema?')">
                    <a  class="nav-link" style="float: right;" href="Login.php"><i class="fa fa-power-off" ></i> Salir</a>
                </div>

                    <!-- cambio -->
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">

         <!--    membrete------------------------------------------------- -->

            <div class="col-md-9">

                <div class="col-md-3" >
                    <a class="navbar-brand" href="#"><img style="float: left;" width="70" src="../images/upta.png" width="100" height="70" alt="Logo"></a>
                    </div>

                <div class="page-tittle" class="col-md-6">
                    <cite>UPT Aragua "Federico Brito Figueroa"
                    <br>
                     LaVictoria .Edo. Aragua</cite>
                    
                </div>
            </div>

            <!-- fin del membrete-------------------------------------------- -->


       <!--  Hora y fecha------------------------------------------------- -->
            
            <div class="col-sm-3">
                <!--   <header style="text-align: right; margin-right: 20px;">
                    <p style="margin-bottom: 1px;">Fecha Y Hora:</p> -->

<script type="text/javascript">
//<![CDATA[

function makeArray() {
for (i = 0; i<makeArray.arguments.length; i++)
this[i + 1] = makeArray.arguments[i];}
var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.write("" + day + " de " + months[month] + " del " + year);
//]]>

</script>   
 <script type="text/javascript">

function startTime(){
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
m=checkTime(m);
s=checkTime(s);
document.getElementById('reloj').innerHTML= h+":"+m+":"+s;
t=setTimeout('startTime()',500);}
function checkTime(i)
{if (i<10) {i="0" + i;}return i;}
window.onload=function(){startTime();}
</script>
<div id="reloj" style="font-size:20px;"></div>
 
</header> 
            </div>
        </div>

<!-- fin de hora y fecha-------------------------------------------------- -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Mi Perfil<small>Datos Personales</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mi Perfil</a></li>
        <li class="active">Datos Personales</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <?php while($row=mysqli_fetch_assoc($query)){
            $registro = str_replace('-', '/', date("d-m-Y", strtotime($row['registro'])));
            $ruta_img = $row['profile'];
            $sexo = $row['sexo'];
            $pregunta = $row['pregunta'];
            $usuario = $row['usuario'];
          ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form action="index.php?llave=cambiar_imagen" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php
                  $profile = $row['profile'];
                  if ($profile == "male.png") {
                    echo "<img class='profile-user-img img-responsive img-circle' src='../img/male.png'>";
                  } else if ($profile == "female.png") {
                    echo "<img class='profile-user-img img-responsive img-circle' src='../img/female.png'>";
                  } else if ($profile == "$ruta_img") { ?>
                    <img class="profile-user-img img-responsive img-circle" src="../img/<?=$_SESSION['usuario'];?>/<?php echo $ruta_img;?>" alt="Foto de Perfil">
                 <?php } ?>
                <h3 class="profile-username text-center"><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></h3>
                <p class="text-muted text-center"><?php $row['tipocuenta'];?></p>
                <div class="form-group col-xs-12">
                  <center><input id="imagen" type="file" name="profile" multiple=true class="file" required></center>      
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
              <li><a href="#cambiarClave" data-toggle="tab">Cambiar Contraseña</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=guardar_perfil" method="POST" id="cambiar-perfil">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-0 control-label"></label>
                    <div class="col-sm-4">
                      <label for="inputName" class="control-label">Tipo de Cuenta</label>
                      <input type="text" class="form-control" name="tipocuenta" id="tipocuenta" placeholder="Tipo de Cuenta" value="<?php echo $row['tipocuenta']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Usuario</label>
                      <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $row['usuario']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $row['apellido']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Cédula</label>
                      <input type="number" class="form-control" id="" name="" placeholder="Cédula" value="<?php echo $row['cedula']; ?>" maxlength="8" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Sexo</label><br>
                        <p>
                          <input name="sexo" type="radio" id="Masculino" value="M"<?php if ($sexo=="M") { ?> checked="checked" <?php } ?> class="minimal"/>
                          <label for="Masculino">Masculino</label>
                          <input name="sexo" type="radio" id="Femenino" value="F"<?php if ($sexo=="F") { ?> checked="checked" <?php } ?> class="minimal"/>
                          <label for="Femenino">Femenino</label>
                        </p>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Ocupación</label>
                      <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ocupación" value="<?php echo $row['ocupacion']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Telefono</label>
                      <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" maxlength="11" min="1">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                    <label for="inputExperience" class="control-label">Dirección</label>
                      <textarea class="form-control" name="direccion" id="direccion" placeholder="Dirección"><?php echo $row['direccion']; ?></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="pregunta-Seguridad" class="control-label">Pregunta de Seguridad</label>
                      <select class="form-control" name="pregunta">
                        <option value="1" <?php if ($pregunta=="1") {?> selected="selected" <?php } ?> >¿Nombre de tu mascota?</option>
                        <option value="2" <?php if ($pregunta=="2") {?> selected="selected" <?php } ?> >¿Segundo apellido de tu madre?</option>
                        <option value="3" <?php if ($pregunta=="3") {?> selected="selected" <?php } ?> >¿Heroe Favorito?</option>
                        <option value="4" <?php if ($pregunta=="4") {?> selected="selected" <?php } ?> >¿Equipo Favorito?</option>
                        <option value="5" <?php if ($pregunta=="5") {?> selected="selected" <?php } ?> >¿Nombre de su mejor amigo?</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Respuesta de Seguridad</label>
                      <input type="text" class="form-control" name="respuesta" id="respuesta" value="<?php echo $row['respuesta']; ?>" placeholder="Respuesta de Seguridad">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Registrado Desde:</label>
                      <input type="text" class="form-control" name="registro" id="registro" value="<?php echo $registro;?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Modificar Datos</button>
                    </div>
                  </div>
                </form> <?php } ?>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="cambiarClave">
                <form action="index.php?llave=cambiar_clave" id="cambiar-clave" method="post" class="form-horizontal myaccount" role="form">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Contraseña Actual</label>
                    <div class="col-sm-10">
                      <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Contraseña Actual">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" name="clave" id="clave" class="col-sm-2 control-label">Nueva Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Confirmar Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar Contraseña ">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando contraseña....">Cambiar Contraseña</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->   
      </div>
    </section>



 <!--  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
    
 <footer id="footer-main" style="background: #006699; color: #fff;">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-4">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p style="">
                            SERVIFORM C.A empresa maquiladora, encargada de formular productos de insecticidas... </p>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="all-tittles">Desarrolladores</h4>
                        <br>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-facebook-square"></i>&nbsp; Hector Hernandez<!--  <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-instagram zmdi-hc-fw footer-social"></i> --></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-facebook-square"></i> &nbsp; Daisleska Vilera <!-- <i  class="fa fa-facebook-square"></i><i class="fa fa-instagram"></i> --></li>
                        </ul>
                         <ul class="list-unstyled">
                            <li><i class="fa fa-facebook-square"></i> &nbsp; Genessi Escobar <!-- <i  class="fa fa-facebook-square"></i><i class="fa fa-instagram"></i> --></li>
                        </ul>
                    </div>

                     <div class=" col-sm-4">
                        <h4 class="all-tittles">Extras</h4>
                        <br>
                        <ul class="list-unstyled">
                            <li><a href="">Inicio</a></li>
                            <li><a href="">Correo</a></li>
                            <li><a href="">Telefono</a></li>
                            <li><a href="">Redes Sociales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>


    

    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="../assets/js/validationMessage.js"></script>

    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
   <!--  <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> -->

</body>

</html>