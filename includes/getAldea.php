<?php
    require ('../conexion.php');

    $id_municipio = $_POST['id_municipio'];
	
	$queryA = "SELECT id_aldea, aldea FROM t_aldea WHERE id_municipio = '$id_municipio' ORDER BY aldea ASC";

	$resultadoA = $conn->query($queryA);
	
	$html= "<option value='0'>Seleccionar Aldea</option>";
	
	while($rowA = $resultadoA->fetch_assoc())
	{
		$html.= "<option value='".$rowA['id_aldea']."'>".$rowA['aldea']."</option>";
	}
	
	echo $html;

?>
