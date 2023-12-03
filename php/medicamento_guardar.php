<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

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

	/*== Guardando datos ==*/
    $guardar_producto=conexion();
    $guardar_producto=$guardar_producto->prepare("INSERT INTO medicamento(codigo,Nombre,Cantidad,Descripcion) VALUES(:codigo,:nombre,:cantidad,:descripcion)");

    $marcadores=[
        ":codigo"=>$codigo,
        ":nombre"=>$nombre,
        ":cantidad"=>$cantidad,
        ":descripcion"=>$descripcion   
    ];

    $guardar_producto->execute($marcadores);

    if($guardar_producto->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡MEDICAMENTO REGISTRADO!</strong><br>
                El medicamento se registro con éxito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo registrar el medicamento, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_producto=null;