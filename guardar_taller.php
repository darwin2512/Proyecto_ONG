<?php
	
	require 'conexion.php';
	
    $nombre = $_POST['taller'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $municipio =$_POST['municipio'];
    $aldea = $_POST['aldea'];

/*mysql: id, municipio, lat, lng: int, varchar, float */
	
	$query_guardar = "INSERT INTO taller (nombre, descripcion, fecha, hora, municipio, aldea) VALUES ('$nombre', '$descripcion', '$fecha', '$hora', '$municipio', '$aldea')";

    $resultado = mysqli_query($conn, $query_guardar);

    if(!$resultado){
        die("query failed");
    }

    
    header("Location: nuevo_taller.php");
?>
