
<?php
  // Archivo de Conexión a la Base de Datos 
  include 'conexion.php';
  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $result = mysqli_query($conn, "SELECT municipio, aldea, lat, lng FROM localizacion");
  // Seleccionamos los datos para crear los marcadores en el Mapa de Google serian direccion, lat y lng 
  while ($row = mysqli_fetch_array($result)) {
      echo '["' . $row['aldea'] . '", ' . $row['lat'] . ', ' . $row['lng'] . '],';
  }
?>