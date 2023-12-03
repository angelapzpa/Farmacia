<?php
	/*== Almacenando datos ==*/
    $product_id_del=limpiar_cadena($_GET['product_id_del']);

    /*== Verificando producto ==*/
    $check_producto=conexion();
    $check_producto=$check_producto->query("SELECT * FROM producto WHERE producto_id='$product_id_del'");

    if($check_producto->rowCount()==1){

    	$datos=$check_producto->fetch();

    	$eliminar_producto=conexion();
    	$eliminar_producto=$eliminar_producto->prepare("DELETE FROM producto WHERE producto_id=:id");

    	$eliminar_producto->execute([":id"=>$product_id_del]);

    	if($eliminar_producto->rowCount()==1){
	        echo '
	            <div class="notification is-info is-light">
	                <strong>¡VACUNA ELIMINADA!</strong><br>
	                Los datos de la vacuna se eliminaron con éxito
	            </div>
	        ';
	    }else{
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrió un error inesperado!</strong><br>
	                No se pudo eliminar la vacuna, por favor intente nuevamente
	            </div>
	        ';
	    }
	    $eliminar_producto=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                LA VACUNA que intenta eliminar no existe
            </div>
        ';
    }
    $check_producto=null;