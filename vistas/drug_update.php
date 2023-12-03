<div class="container is-fluid mb-6">
	<h1 class="title">Actualizar medicamento</h1>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./inc/btn_back.php";

		require_once "./php/main.php";

		$id = (isset($_GET['drug_id_up'])) ? $_GET['drug_id_up'] : 0;

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM medicamento WHERE id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><?php echo $datos['Nombre']; ?></h2>

	<form action="./php/medicamento_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

		<input type="hidden" name="id" value="<?php echo $datos['id']; ?>" required >

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Codigo</label>
				  	<input class="input" type="text" name="codigo" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required value="<?php echo $datos['codigo']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Nombre</label>
				  	<input class="input" type="text" name="nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required value="<?php echo $datos['Nombre']; ?>" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Cantidad</label>
				  	<input class="input" type="text" name="cantidad"  value="<?php echo $datos['Cantidad']; ?>" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Descripcion</label>
				  	<input class="input" type="text" name="descripcion"  value="<?php echo $datos['Descripcion']; ?>" >
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