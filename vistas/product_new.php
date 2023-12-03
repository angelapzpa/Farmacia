<div class="container is-fluid mb-6">
	<h1 class="title">Registro de vacuna</h1>
</div>

<div class="container pb-6 pt-6">
	<?php
		require_once "./php/main.php";
	?>

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/producto_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Nombre de vacuna</label>
				  	<input class="input" type="text" name="vacuna" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Tipo de vacuna</label>
				  	<input class="input" type="text" name="tipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Cantidad</label>
				  	<input class="input" type="text" name="cantidad" pattern="[0-9.]{1,25}" maxlength="25" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Fecha de entrega</label>
				  	<input class="input" type="date" name="entrega"   >
				</div>
		  	</div>
			  <div class="column">
		    	<div class="control">
					<label>Fecha de aplicación</label>
				  	<input class="input" type="date" name="aplicación"  >
				</div>
		  	</div>	  	
		</div>
		
		<p class="has-text-centered">
			<button type="submit" class="button is-info is-rounded">Guardar</button>
		</p>
	</form>
</div>