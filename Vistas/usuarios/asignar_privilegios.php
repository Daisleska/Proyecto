

<?php
extract($_REQUEST);
$usuarios=unserialize($usuarios);
$privilegios=unserialize($privilegios);
?>


<?php include_once "../includes/menu.php"; ?>

           <div class="col-lg-12">
           	<p>Administrador</p>
                    <div class="card">
                      <div class="card-header">
                           <strong>Asignacion de Privilegios a usuarios registrados</strong> 
                                </div>
                                <div class="card-body card-block">

<form action="" name="" method="POST">
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
</form>
</div>
</div>
</div>

<?php include_once "../includes/footer.php"; ?>
