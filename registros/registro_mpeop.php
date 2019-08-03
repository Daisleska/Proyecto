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


       <div class="breadcrumbs">
           <div class="col-sm-5">
                <div class="page-header float-left">
                  <div class="page-title">
                    <h4>Registrar</h4>
                  </div>
                   
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inventario General</a></li>
                            <li class="active">Inventario Diario</li>
                        </ol>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                     <select class="form-control">
                            <option><a href="">INVENTARIO  SERVIFORM MATERIA PRIMA</a></option>

                            <option><a href="">ENVIADO A OTRA PLANTA O AGROTIENDA</a></option>

                            <option><a href="registro_materialempaque.php">MATERIAL DE EMPAQUE  CON MAS  MOVIMIENTO SERVIFORM</a></option>

                            <option><a href="">INVENTARIO GRANEL ALMACEN SERVIFORM</a></option>

                            <option><a href="registro_despachop.php">Despachado a produccion</a></option>

                            <option><a href="">Recibido de produccion  P.Terminado</a></option>

                            <option><a href="">Materia Prima Enviada a otra planta</a></option>

                            <option><a href="">Producto Terminado disponible en el almacen</a></option>

                            <option><a href="">ENVIADO A INICA CAGUA PRODUCTO TERMINADO</a></option>

                        </select>
                 </div>
                </div>
            </div>
            
        </div>


        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                           <strong>Registro de Materia Prima Enviada a otra Planta</strong> 
                                </div>
                                   <div class="card-body card-block">
                                    <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-fecha_mpeop" class=" form-control-label">Fecha</label></div>
                                    <div class="col-12 col-md-6"><input type="date" id="hf-fecha_mpeop" name="fecha_mpeop" placeholder="Ingrese la fecha" class="form-control"><span class="help-block"></span></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-producto_mpeop" class=" form-control-label">Producto</label></div>
                                    <div class="col-12 col-md-6"><input maxlength="20" type="text" id="hf-producto_mpeop" name="producto_mpeop" placeholder="Ingrese el Producto" class="form-control"><span class="help-block"></span></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-presentacion_mpeop" class=" form-control-label">Presentación </label></div>
                                    <div class="col-12 col-md-6"><input 20 type="text" id="hf-presentacion_mpeop" name="presentacion_mpeop" placeholder="Ingrese la presentacion" class="form-control"><span class="help-block"></span></div>
                                    </div>


                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-cantidad_mpeop" class=" form-control-label">Cantidad</label></div>
                                    <div class="col-12 col-md-6"><input maxlength="20" type="text" id="hf-cantidad_mpeop" name="cantidad_mpeop" placeholder="Ingrese la cantidad" class="form-control"><span class="help-block"></span></div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col col-md-3"><label for="hf-filial_mpeop" class=" form-control-label">Filial</label></div>
                                    <div class="col-12 col-md-6"><input maxlength="20" type="text" id="hf-filial_mpeop" name="filial_mpeop" placeholder="Ingrese la filial" class="form-control"><span class="help-block"></span></div>
                                    </div>
                                     
            
                                </div>
                          
                        </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-send"></i> Guardar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Limpiar
                </button>
                          </form>            
                                          </div>
                                                </div>
                                                
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
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


</body>

</html>