<?php
include 'conexion.php';
  $result = mysqli_query($conn, "SELECT municipio, aldea FROM localizacion");

  // Agregamos el nombre y dirección a la ventana de información de cada marcador, puedes agregar la información que desees, nosotros agregaremos 'nombre' y 'direccion' 
  if($result->$num_rows > 0){
    
    while($row = $result->fetch_assoc()){ ?>
    
    ['<div class="info_content">' + '<h3><?php echo $row['municipio']; ?></h3>' + '<p><?php echo $row['aldea']; ?></p>' + '</div>'], 

    <?php }
  }
?>