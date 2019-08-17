<?php
	
	require 'conexion.php';
    
    
    $cui = $_POST['cui'];
	$nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    //ESTOS SON LOS QUE ESTOY TRAYENDO DEL FORMULARIO
    $aldea = $_POST['aldea'];
    $municipio = $_POST['municipio'];
    //este lo ocupo como llave foranea para unir las tablas municipio y aldea
    $id_aldea = $_POST['aldea'];
    
    $taller="";
    if(isset($_POST['taller'])){
        $taller = $_POST['taller'];
    }else{
          $taller="";
    }
    $telefono = $_POST['telefono'];


	$sql = "INSERT INTO persona (cui, nombre, apellido, fecha, aldea, municipio, talleres, telefono, cod_lugar) VALUES ('$cui', '$nombre', '$apellido', '$fecha', '$aldea', '$municipio', '$taller', '$telefono', '$id_aldea')";
    
    $resultado = mysqli_query($conn, $sql);

    if(!$resultado){
        die("query failed");
    }
	


    
    // $_SESSION['message'] = 'tarea guardada correctamente';
    // $_SESSION['message_type'] = 'success';
    
    header("Location: nueva_persona.php");
?>