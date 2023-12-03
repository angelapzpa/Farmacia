<?php
	/*== Almacenando datos ==*/
    $drug_id_del=limpiar_cadena($_GET['drug_id_del']);

    /*== Verificando producto ==*/
    $check_producto=conexion();
    $check_producto=$check_producto->query("SELECT * FROM medicamento WHERE id='$drug_id_del'");

    if($check_producto->rowCount()==1){

    	$datos=$check_producto->fetch();

    	$eliminar_producto=conexion();
    	$eliminar_producto=$eliminar_producto->prepare("DELETE FROM medicamento WHERE id=:id");

    	$eliminar_producto->execute([":id"=>$drug_id_del]);

    	if($eliminar_producto->rowCount()==1){
	        echo '
	            <div class="notification is-info is-light">
	                <strong>¡MEDICAMENTO ELIMINADO!</strong><br>
	                Los datos del medicamento se eliminaron con éxito
	            </div>
	        ';
	    }else{
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrió un error inesperado!</strong><br>
	                No se pudo eliminar el medicamento, por favor intente nuevamente
	            </div>
	        ';
	    }
	    $eliminar_producto=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El MEDICAMENTO que intenta eliminar no existe
            </div>
        ';
    }
    $check_producto=null;