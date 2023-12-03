<?php
		$id = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;
?>
<div class="container is-fluid mb-6">
	<h1 class="subtitle">Actualizar vacuna</h1>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM producto WHERE producto_id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><?php echo $datos['vacuna']; ?></h2>

	<form action="./php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>" required >

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>VACUNA</label>
				  	<input class="input" type="text" name="vacuna" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required value="<?php echo $datos['vacuna']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>TIPO</label>
				  	<input class="input" type="text" name="tipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required value="<?php echo $datos['tipo']; ?>" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>CANTIDAD</label>
				  	<input class="input" type="text" name="cantidad"  value="<?php echo $datos['cantidad']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>FECHA DE ENTREGA</label>
				  	<input class="input" type="text" name="entrega"  value="<?php echo $datos['entrega']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>FECHA DE APLICACION</label>
				  	<input class="input" type="text" name="aplicación"  value="<?php echo $datos['aplicacion']; ?>" >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded">Actualizar</button>
		</p>
	</form>
	<?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_producto=null;
	?>
</div>