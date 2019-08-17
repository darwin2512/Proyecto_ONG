<?php
	
	require 'conexion.php';
	
	$cui = $_POST['cui'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $aldea = $_POST['aldea'];
    $municipio = $_POST['municipio'];

    $id_aldea=$_POST['aldea'];

    $taller="";
    if(isset($_POST['taller'])){
        $taller = $_POST['taller'];
    }else{
        $taller ="";
    }
    
    $telefono = $_POST['telefono'];

	
	$sql = "UPDATE persona SET nombre='$nombre', apellido='$apellido', fecha='$fecha', aldea='$aldea', municipio='$municipio', talleres='$taller', telefono='$telefono' cod_lugar='$id_aldea' WHERE cui = '$cui'";
    
    $resultado = mysqli_query($conn, $sql);
    

        if($resultado){
            echo "Error al eliminar";
        
          }else{
        die("query failed");
         }


    header("Location: lista_persona.php");
    
	
?>