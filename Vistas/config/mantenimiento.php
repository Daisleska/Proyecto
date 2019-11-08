<?php include_once "../includes/menu.php"; ?>

	<center>

<h1> Ajustes <span class="badge badge-info">Mantenimiento <i class="menu-icon fa fa-cogs"></i> </span></h1>
<br><br><br>

<div class="container">

<!-- ////////////      Aquí va la parte de Usuarios /////////// -->

<section class="main row">
		<div class="col-md-6"> <ul class="nav flex-column">	
			<li class="nav-item"><a href="../menu/ControladorMenu.php?operacion=bitacora" class="btn btn-primary nav-link">Bitacora <i class="menu-icon fa fa-desktop"></i>  </a> </li><br>

		</ul></div>
	
	<br>
<!-- ////////////      Aquí va la parte de Usuarios /////////// -->

<!-- ////////////      Aquí va la parte de Libros /////////// -->

	<div class="col-md-6"> <ul class="nav flex-column">
		<li><a href="../../Controladores/controladorUsuario.php?operacion=index" class="btn btn-primary nav-link">Usuarios Registrados <i class="menu-icon fa fa-cloud-upload"></i> </a> </li><br>
	
	</ul> </div>
</section>
	<br>
<!-- ////////////      Aquí va la parte de Libros /////////// -->

<!-- ////////////      Aquí va Respaldar la BD /////////// -->
<section class="main row">
	<div class="col-md-6"> <ul class="nav flex-column">
		
		<li class="nav-item"><a href="../config/respaldar.php" class="btn btn-primary nav-link">Respaldar Base de datos <i class="menu-icon fa fa-cloud"></i></a> </li><br>
	
		</ul> </div>
	<br>
<!-- ////////////      Aquí va respaldar BD/////////// -->

<!-- ////////////      Aquí va Restablecer BD /////////// -->

	<div class="col-md-6"> <ul class="nav flex-column">
		<li class="nav-item"><a href="restaurar.php" class="btn btn-primary nav-link">Restablecer Base de Datos<i class="menu-icon fa fa-cloud-upload"></i></a> </li><br>

	</ul> </div>

</section>

<!-- ////////////      Aquí va Restablecer BD /////////// -->
</center>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include_once "../includes/footer.php"; ?>