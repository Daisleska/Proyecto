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
                   <ol class="breadcrumb text-right">

                            <li class="active">INVENTARIO GENERAL</li>
                            <li><a href="listado_inventario.php">Inventario Diario</a></li>
                        </ol>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">

                        <form>
                        <select class="form-control"  name="" onchange="location = this.value">

                            <option>Selecciona</option>

                            <option  value="listado_inventario_mp.php">INVENTARIO  SERVIFORM MATERIA PRIMA</option>

                        
                            <option value="inven_materialempaque.php">MATERIAL DE EMPAQUE  CON MAS  MOVIMIENTO SERVIFORM</option>

                            <option value="listado_inventario_granel.php">INVENTARIO GRANEL ALMACEN SERVIFORM</option>


                        </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Inventario</strong>
                            </div>


                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>CODIGO</th>
                                            <th>MATERIAL </th>
                                            <th>ALMACEN</th>
                                            <th>CANTIDAD</th>
                                            <th>UNIDAD</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>12001751</th>
                                            <th>BOBINA ATTILAN 1 KG </th>
                                            <th>AL09</th>
                                            <th>3376,61</th>
                                            <th>KGS</th>
                                        </tr>
                                        <tr>
                                            <td>12000096</td>
                                            <td>BOLSA ATTILAN 1 KG</td>
                                            <td>AL09</td>
                                            <td>96000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12003442</td>
                                            <td>CAJA 10X1 LITRO PET</td>
                                            <td>AL09</td>
                                            <td>875</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002556</td>
                                            <td>CAJA 12X1 LTS WEN </td>
                                            <td>AL09</td>
                                            <td>14475</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002178</td>
                                            <td>CAJA 24 ENV. X 500 CC  PET</td>
                                            <td>AL09</td>
                                            <td>1525</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002557</td>
                                            <td>CAJA 2X10 LTS WEN </td>
                                            <td>AL09</td>
                                            <td>2690</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000225</td>
                                            <td>CAJA POLVO </td>
                                            <td>AL09</td>
                                            <td>2760</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002474</td>
                                            <td>CURAZIN BOBINA IMPRESA LAMINADA 1/2 KG</td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>KGS</td>
                                        </tr>
                                        <tr>
                                            <td>12000101</td>
                                            <td>CURAZIN BOLSA IMPRESA 1/2 KG</td>
                                            <td>AL09</td>
                                            <td>145000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12001714</td>
                                            <td>DESIGNEE 40 ETIQUETA 500 CC PET </td>
                                            <td>AL09</td>
                                            <td>15086</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12001715</td>
                                            <td>DESIGNEE 40 ETIQUETA CAJA</td>
                                            <td>AL09</td>
                                            <td>5705</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12001712</td>
                                            <td>DESIGNEE 40 SC ETIQUETAS ENV 100 CC</td>
                                            <td>AL09</td>
                                            <td>163857</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002997</td>
                                            <td>ENVASES PET 500 CC</td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002918</td>
                                            <td>ENVASES PET X 1 LITRO BLANCO </td>
                                            <td>AL09</td>
                                            <td>2100</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002609</td>
                                            <td>ENVASES WEN 1 LTS </td>
                                            <td>AL09</td>
                                            <td>$385,750</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000330</td>
                                            <td>ETIQUETA CAJA ATTILAN </td>
                                            <td>AL09</td>
                                            <td>24727</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000364</td>
                                            <td>ETIQUETA CORSARIO CAJA</td>
                                            <td>AL09</td>
                                            <td>33000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002016</td>
                                            <td>ETIQUETA CORSARIO LITRO PET </td>
                                            <td>AL09</td>
                                            <td>72000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000363</td>
                                            <td>ETIQUETA CORSARIO LITRO WEN </td>
                                            <td>AL09</td>
                                            <td>151750</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000370</td>
                                            <td>ETIQUETA CURAZIN CAJA</td>
                                            <td>AL09</td>
                                            <td>41000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002016</td>
                                            <td>ETIQUETA CORSARO PET </td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000372</td>
                                            <td>ETIQUETA CYPER 1 L</td>
                                            <td>AL09</td>
                                            <td>125591</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000521</td>
                                            <td>ETIQUETA CYPER 10 LTS </td>
                                            <td>AL09</td>
                                            <td>37000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000373</td>
                                            <td>ETIQUETA CYPER CAJA </td>
                                            <td>AL09</td>
                                            <td>17000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12001715</td>
                                            <td>ETIQUETA DESIGNEE CAJA </td>
                                            <td>AL09</td>
                                            <td>47860</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>ETIQUETA MECARMIL 1 LITRO WEN </td>
                                            <td>AL09</td>
                                            <td>88242</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000405</td>
                                            <td>ETIQUETA MECARMIL 1 LITRO PET </td>
                                            <td>AL09</td>
                                            <td>168000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000305</td>
                                            <td>ETIQUETA MECARMIL CAJA</td>
                                            <td>AL09</td>
                                            <td>156230</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000533</td>
                                            <td>ETIQUETA MECARMIL X 10 LTS</td>
                                            <td>AL09</td>
                                            <td>155772</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002961</td>
                                            <td>ETIQUETA PROPIZOLE CAJA </td>
                                            <td>AL09</td>
                                            <td>998</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000484</td>
                                            <td>ETIQUETA PYRINEX 1 L WEN</td>
                                            <td>AL09</td>
                                            <td>100000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000485</td>
                                            <td>ETIQUETA PYRINEX CAJA</td>
                                            <td>AL09</td>
                                            <td>15080</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12001619</td>
                                            <td>ETIQUETA PYRINEX LITRO PET </td>
                                            <td>AL09</td>
                                            <td>337000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000574</td>
                                            <td>ETIQUETA RELEVO 500 CC</td>
                                            <td>AL09</td>
                                            <td>10000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000945</td>
                                            <td>ETIQUETA RELEVO CAJA </td>
                                            <td>AL09</td>
                                            <td>10000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002535</td>
                                            <td>ETIQUETA SUNFIRE 500 CC PET </td>
                                            <td>AL09</td>
                                            <td>35000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12004610</td>
                                            <td>ETIQUETA SUNFIRE CAJA </td>
                                            <td>AL09</td>
                                            <td>38000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000524</td>
                                            <td>ETIQUETA TORPEDO CAJA </td>
                                            <td>AL09</td>
                                            <td>10000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002060</td>
                                            <td>ETIQUETA TORPEDO LITRO PET</td>
                                            <td>AL09</td>
                                            <td>30000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000525</td>
                                            <td>ETIQUETA TORPEDO LITRO WEN</td>
                                            <td>AL09</td>
                                            <td>30000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002838</td>
                                            <td>ETIQUETAS PYRINEX 10 LTS </td>
                                            <td>AL09</td>
                                            <td>11164</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002626</td>
                                            <td>JARRAS 10 LTS EXTRA PESADAS </td>
                                            <td>AL09</td>
                                            <td>736</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002626</td>
                                            <td>JARRAS 10 LTS LIVIANAS </td>
                                            <td>AL09</td>
                                            <td>272</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>S/C</td>
                                            <td>PAPEL ENVOPLAST </td>
                                            <td>AL09</td>
                                            <td>3</td>
                                            <td>ROLLOS DE 5 KGS</td>
                                        </tr>
                                        <tr>
                                            <td>11000004</td>
                                            <td>ROLLO DE CINTA S/I</td>
                                            <td>AL09</td>
                                            <td>1615</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12003464</td>
                                            <td>SACOS BLANCOS POLIPROPILENO</td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12002560</td>
                                            <td>SEPARADORES 2X10</td>
                                            <td>AL09</td>
                                            <td>8000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12003279</td>
                                            <td>SEPARADORES 60 ENV X 125 CC</td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12000229</td>
                                            <td>SEPARADORES POLVO </td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12003279</td>
                                            <td>SEPARDORES 60X125 CC</td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>120000</td>
                                            <td>TAPAS 38 MM </td>
                                            <td>AL09</td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12001400</td>
                                            <td>TAPAS ENVASES  PET</td>
                                            <td>AL09</td>
                                            <td>36000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12003389</td>
                                            <td>TAPAS WEN  45 MM</td>
                                            <td>AL09</td>
                                            <td>68000</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>PALETAS</td>
                                            <td></td>
                                            <td>0</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td>12004225</td>
                                            <td>CAJA POLVO MANZATE 20PM X 1 K </td>
                                            <td>AL09</td>
                                            <td>2689</td>
                                            <td>PIEZAS</td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                            <td> SOLVENTE MEK</td>
                                            <td>AL09</td>
                                            <td>5</td>
                                            <td>LTS</td>
                                        </tr>
                                        <tr>
                                            <td>BOBINA PARA TERMO ENCOGIBLE 598X60</td>
                                            <td>Customer Support</td>
                                            <td>AL09</td>
                                            <td>2</td>
                                            <td>PIEZAS X 20 KGS</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>LAMINA TRANSPARENTE IMPRESA 1 COLOR 53 X 0.0050</td>
                                            <td>AL09</td>
                                            <td>54</td>
                                            <td>piezas de 28 kg</td>
                                        </tr>
                                        <tr>
                                            <td>12003985</td>
                                            <td>ETIQUETAS TEMEFHOS </td>
                                            <td>AL09</td>
                                            <td>6000</td>
                                            <td>PZAS</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>BOLSAS TRANSPARENTE 43X84</td>
                                            <td>AL09</td>
                                            <td>5000</td>
                                            <td>PZAS</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>SACOS MARRON MULTIPLIEGO</td>
                                            <td>AL09</td>
                                            <td>6767</td>
                                            <td>PZAS</td>
                                        </tr>
                                        <tr>
                                            <td>120002691</td>
                                            <td>CINTE DE REFUERZO PARA SACOS  </td>
                                            <td>AL09</td>
                                            <td>1818</td>
                                            <td>KGS</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>AMARRES 536 37MM X 140 MM4</td>
                                            <td>AL09</td>
                                            <td>500</td>
                                            <td>PAQUETES DE MIL</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->


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


</body>

</html>
