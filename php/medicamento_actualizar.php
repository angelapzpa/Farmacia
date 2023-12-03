<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['id']);


    /*== Verificando producto ==*/
	$check_producto=conexion();
	$check_producto=$check_producto->query("SELECT * FROM medicamento WHERE id='$id'");

    if($check_producto->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El medicamento no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_producto->fetch();
    }
    $check_producto=null;


    /*== Almacenando datos ==*/
    $codigo=limpiar_cadena($_POST['codigo']);
	$nombre=limpiar_cadena($_POST['nombre']);

	$cantidad=limpiar_cadena($_POST['cantidad']);
	$descripcion=limpiar_cadena($_POST['descripcion']);


	/*== Verificando campos obligatorios ==*/
    if($codigo=="" || $nombre=="" || $cantidad=="" || $descripcion==""){
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
    $actualizar_producto=$actualizar_producto->prepare("UPDATE medicamento SET codigo=:codigo,Nombre=:nombre,Cantidad=:cantidad,Descripcion=:descripcion WHERE id=:id");

    $marcadores=[
        ":codigo"=>$codigo,
        ":nombre"=>$nombre,
        ":cantidad"=>$cantidad,
        ":descripcion"=>$descripcion,
        ":id"=>$id
    ];


    if($actualizar_producto->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡MEDICAMENTO ACTUALIZADO!</strong><br>
                El medicamento se actualizo con éxito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo actualizar el medicamento, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_producto=null;