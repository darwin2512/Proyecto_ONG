<?php
	
    require 'conexion.php';


	
    $municipio = $_POST['municipio'];
    $aldea = $_POST['aldea'];
    $longitud = $_POST['longitud'];
    $latitud = $_POST['latitud'];

/*mysql: id, municipio, lat, lng: int, varchar, float */
	
	$query_guardar = "INSERT INTO localizacion (municipio, aldea, lat, lng) VALUES ('$municipio', '$aldea', '$latitud', '$longitud')";

    $resultado = mysqli_query($conn, $query_guardar);
    
    if(!$resultado){
        die("query failed");
    }

    
    // $_SESSION['message'] = 'tarea guardada correctamente';
    // $_SESSION['message_type'] = 'success';
    
    header("Location: nuevo_lugar.php");
?>