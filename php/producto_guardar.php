<?php
	require_once "../inc/session_start.php";

	require_once "main.php";

	/*== Almacenando datos ==*/
	$vacuna=limpiar_cadena($_POST['vacuna']);
	$tipo=limpiar_cadena($_POST['tipo']);

	$stock=limpiar_cadena($_POST['cantidad']);
	$fentrega=limpiar_cadena($_POST['entrega']);
	$faplicacion=limpiar_cadena($_POST['aplicación']);


	/*== Verificando campos obligatorios ==*/
    if($vacuna=="" || $tipo=="" || $stock=="" || $fentrega=="" || $faplicacion==""){
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
    $guardar_producto=$guardar_producto->prepare("INSERT INTO producto(vacuna,tipo,cantidad,entrega,aplicacion) VALUES(:codigo,:nombre,:precio,:stock,:aplicacion)");

    $marcadores=[
        ":codigo"=>$vacuna,
        ":nombre"=>$tipo,
        ":precio"=>$stock,
        ":stock"=>$fentrega,
        ":aplicacion"=>$faplicacion    
    ];

    $guardar_producto->execute($marcadores);

    if($guardar_producto->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡VACUNA REGISTRADA!</strong><br>
                La vacuna se registro con éxito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No se pudo registrar la vacuna, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_producto=null;