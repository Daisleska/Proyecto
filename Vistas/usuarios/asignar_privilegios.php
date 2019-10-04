

<?php
extract($_REQUEST);
$usuarios=unserialize($usuarios);
$privilegios=unserialize($privilegios);
?>


<?php include_once "../includes/menu.php"; ?>
<div class="content mt-3">
            <div class="animated fadeIn">
             

           <div class="col-lg-12">
           	
                    <div class="card">
                      <div class="card-header">
                           <strong class="card-title"><i class="menu-icon fa fa-edit">
                                    </i> ASIGNACIÓN DE PRIVILEGIOS A USUARIOS REGISTRADOS</strong>
                                </div>
                                <div class="card-body card-block">

<form action="../../Controladores/ControladorUsuario.php?operacion=guardar_privilegios" name="form" method="POST">
	<table>
        <?php
        for ($i=0; $i < $row_use; $i++) { 
        ?>
        <input type="hidden" name="id" value="<?=$usuarios[$i][0]?>">
		<tr><td>Usuario: <?=$usuarios[$i][1]?> </td></tr>

        <?php } ?>
       
	</table>

	<label class=" form-control-label"><b>Privilegios</b></label>
	<table>
<?php 
	for ($i=0; $i < $row_priv; $i++) { 
		
			?>
			<tr><td>Módulo:<?=$privilegios[$i][1]?> | <?=$privilegios[$i][2]?></td><td><input type="checkbox" name="id_privilegio[]" value="<?=$privilegios[$i][0]?>" 
				<?php if ($privilegios[$i][0]=="Si") {
				?> checked="checked" <?php
				} ?>></td></tr>
			<?php
		
	}
?>
		

                            
	</table>
  </div>
	

          <div class="card-footer">
                    <input type="hidden" name="operacion" value="guardar_privilegios">
                    <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i>
                    </button>
                    <button  class="btn btn-danger btn-sm"><a href="../../Controladores/ControladorUsuario.php?operacion=index"><i class="fa fa-mail-reply"></i>&nbsp;</a></button>
               
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include_once "../includes/footer.php"; ?>
