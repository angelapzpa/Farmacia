<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['producto_id']);


    /*== Verificando producto ==*/
	$check_producto=conexion();
	$check_producto=$check_producto->query("SELECT * FROM producto WHERE producto_id='$id'");

    if($check_producto->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                La vacuna no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_producto->fetch();
    }
    $check_producto=null;


    /*== Almacenando datos ==*/
    $vacuna=limpiar_cadena($_POST['vacuna']);
	$tipo=limpiar_cadena($_POST['tipo']);

	$cantidad=limpiar_cadena($_POST['cantidad']);
	$entrega=limpiar_cadena($_POST['entrega']);
	$aplicacion=limpiar_cadena($_POST['aplicacion']);


	/*== Verificando campos obligatorios ==*/
    if($vacuna=="" || $tipo=="" || $cantidad=="" || $entrega=="" || $aplicacion==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Actualizando datos ==*/
    $actualizar_producto=conexion();
    $actualizar_producto=$actualizar_producto->prepare("UPDATE producto SET vacuna=:vacuna,tipo=:tipo,cantidad=:cantidad,entrega=:entrega,aplicacion=:aplicacion WHERE producto_id=:id");

    $marcadores=[
        ":vacuna"=>$vacuna,
        ":tipo"=>$tipo,
        ":cantidad"=>$cantidad,
        ":entrega"=>$entrega,
        ":aplicacion"=>$aplicacion,
        ":id"=>$id
    ];


    if($actualizar_producto->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡VACUNA ACTUALIZADA!</strong><br>
                La vacuna se actualizo con éxito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo actualizar la vacuna, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_producto=null;