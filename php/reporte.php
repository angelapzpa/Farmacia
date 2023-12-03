<?php
		function conexion(){
            $pdo = new PDO('mysql:host=localhost;dbname=vacunas(1)', 'root', '');
            return $pdo;
        }
        $conexion=conexion();

    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename="Reporte.csv"');

    $salida=fopen('php://output', 'w');

    fputcsv($salida, array('Id vacuna', 'Vacuna', 'Tipo', 'Cantidad', 'Fecha de entrega', 'Fecha de aplicacion'));

    $reporteCsv=$conexion->query("SELECT * FROM producto ORDER BY vacuna ASC");
    while($filaR=$reporteCsv->fetch(PDO::FETCH_ASSOC))
    fputcsv($salida, array($filaR['producto_id'],
    $filaR['vacuna'],
    $filaR['tipo'],
    $filaR['cantidad'],
    $filaR['entrega'],
    $filaR['aplicación']));
?>