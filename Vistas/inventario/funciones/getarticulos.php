<?php
	require("../conectar.php");
	$id_art = $_POST['art'];

	$html= "<option value='0'>Seleccionar Articulo</option>";

		if ($id_art=="Interno") {

			$querym="SELECT * FROM articulos WHERE borrado='N'";

	$resultadom= $mysqli->query($querym);

	while($rowm = $resultadom->fetch_assoc())
	{
		$html.= "<option value='".$rowm['id']."'>".$rowm['articulo']."</option>";
	}
		} elseif ($id_art=="Externo") {
			
			$querym="SELECT * FROM art_subcategorias WHERE borrado='N'";

	$resultadom= $mysqli->query($querym);

	while($rowm = $resultadom->fetch_assoc())
	{
		$html.= "<option value='".$rowm['id']."'>".$rowm['subcategoria']."</option>";
	}
		}
	
	
	echo $html;
	?>