<?php
session_start();


include("../../Modelos/conexion.php");

    $usuario= $_SESSION['correo'];
    
    $sql="SELECT * FROM usuarios WHERE correo='$usuario'";

    $resultado = $conectar->query($sql) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if ($f=$resultado->fetch_array()) {

            
       
            $d=" ";
            $_SESSION['id']=$f['id'];
            $_SESSION['user']=$f['nombre'];
            $_SESSION['tipo_usuario']=$f['tipo_usuario'];
            $cargo=$_SESSION['tipo_usuario'];
        
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es" dir="ltr">
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Serviform C.A</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../vendors/css/estilos.css">
    <link rel="stylesheet" href="../../vendors/bootstrap/gsdk-bootstrap-wizard.css" rel="stylesheet" />


    <link rel="../../apple-touch-icon" href="apple-icon.png">
    <link rel="../../shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendors/bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../../vendors/chosen/chosen.min.css">


    <link rel="stylesheet" href="../../assets/css/style.css">

  <link rel="stylesheet" href="../../vendors/plugins/datepicker/bootstrap-datepicker.css">
   <link rel="stylesheet" href="../../vendors/plugins/daterangepicker/daterangepicker.css">
   <link rel="stylesheet" href="../../vendors/css/iziToast.min.css">

    <link rel="stylesheet" href="../../vendors/plugins/sweetalert2.min.css">
    <link rel="stylesheet" href="../../vendors/animate.css/animate.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="icon" href="../../images/servi.png">

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><img src="../../images/ser.png" width="150" height="80" alt="Logo"></a>
               <!--  <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
               
                <ul class="nav navbar-nav">
            
                    <li>
                        <a href="../home/home.php"> <i class="menu-icon fa fa-home"></i>Inicio </a>
                    </li>



                <?php if ($_SESSION['tipo_usuario']=='Usuario 1' or $_SESSION['tipo_usuario']=='Admin' ){  ?>
                    <h3 class="menu-title">ALMACÉN</h3><!-- /.menu-title -->
                   

                    <li class="">
                        <a href="../menu/ControladorMenu.php?operacion=inventario" > <i class="menu-icon fa fa-archive"></i>Inventario</a>
                    </li>

                  <?php } ?>
                    
                   <?php if ($_SESSION['tipo_usuario']=='Usuario 2' or $_SESSION['tipo_usuario']=='Admin'){  ?>
                    <h3 class="menu-title">RECURSOS HUMANOS</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Empleados</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-edit"></i><a href="../../Controladores/ControladorEmpleado.php?operacion=registrar">Registro</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="../../Controladores/ControladorEmpleado.php?operacion=index">Listado</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="../asistencias/ControlA.php?operacion=index"> <i class="menu-icon fa fa-users"></i>Asistencia</a>
                       
                    </li>

                    

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Asig / Deducc</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="../../Controladores/ControladorAsigDeducc.php?operacion=registrar">Registrar</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="../../Controladores/ControladorAsigDeducc.php?operacion=index">Listado</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-stats-up"></i>Cargos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="../../Controladores/ControladorCargos.php?operacion=registrar">Registrar</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="../../Controladores/ControladorCargos.php?operacion=index">Listado</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-ticket"></i>Cestaticket</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="../../Controladores/ControladorCestaticket.php?operacion=registrar">Registrar</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="../../Controladores/ControladorCestaticket.php?operacion=index">Listado</a></li>
                        </ul>
                    </li>

                     <li class="">
                        <a href="../../Controladores/ControladorPreNomina.php?operacion=prenomina"> <i class="menu-icon fa fa-money"></i>Nómina</a>
                        
                    </li>

                <?php } ?>


                  
              <?php if ($_SESSION['tipo_usuario']=='Admin'){  ?>
                    <h3 class="menu-title">Ajustes</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Mantenimiento</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="menu-icon fa fa-desktop"></i><a href="../../Controladores/ControladorBitacora.php?operacion=bitacora">Bitacora</a></li>

                            <li><i class="menu-icon fa fa-desktop"></i><a href="../config/bitacora.php">Bitácora</a></li>

                            <li><i class="menu-icon fa fa-cloud"></i><a href="../config/respaldar.php">Respaldar BD</a></li>
                            <li><i class="menu-icon fa fa-cloud-upload"></i><a href="../config/restaurar.php">Restaurar BD</a></li>
                             <li><i class="menu-icon fa fa-cloud-upload"></i><a href="../../Controladores/controladorUsuario.php?operacion=index">Listado de usuarios</a></li>
                        </ul>
                    </li>
                <?php } ?>

                
                <h3 class="menu-title">AYUDA</h3>
                     <li class="">
                        <a href="../../Ayuda/Manual.pdf"> <i class="fa fa-book"></i> Manual de Usuario</a>
                        
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header  col-md-12">
            <div class="header-menu ">
                <div class="col-md-4">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-hand-o-left"></i></a>
                    <div class="header-left">
                        <img src="../../images/servi.png" width="100">
                    </div>
                    </div>
                    
                </div>
                
<div class="col-md-4" style="align-content: center;">
<script type="text/javascript">


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
<div  id="reloj" style="font-size:15px;" ></div>

</div>

                <div class="col-md-4">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../../images/admin.jpg" alt="User Avatar">

                         </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../Controladores/ControladorPerfil.php?operacion=verperfil"><i class="fa fa-user"></i> Mi perfil</a>
                         <?php if ($_SESSION['tipo_usuario']=='Admin' ){?>
                            <a class="nav-link" href="../../Controladores/controladorUsuario.php?operacion=registrar"><i class="fa fa-user"></i>Registrar usuario</a>
                        <?php }?>
                            <a class="nav-link" href="../../Controladores/controladorLogin.php?operacion=logout"><i class="fa fa-power-off" ></i> Salir</a>
                        </div>
                      
                      

                </div>

                <strong style="padding-left: 100px;" class="active"><?php echo $_SESSION['user'];?></strong><br>
                      <cite style="padding-left: 100px;"><?php echo $_SESSION['tipo_usuario']; ?></cite>
            </div>

        </header><!-- /header -->
        <!-- Header-->



                       
     

<!-- fin de hora y fecha-------------------------------------------------- -->

        


