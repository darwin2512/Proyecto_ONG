<?php
  // Archivo de Conexión a la Base de Datos 
  include('conexion.php');
  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $result = mysqli_query($conn, "SELECT municipio, aldea, lat, lng FROM localizacion");
  // Creamos una tabla para listar los datos 
  echo "<div class='table-responsive'>";
  echo "<table class='table'>
          <thead class='thead-dark'>
            <tr>
              <th scope='col'>Municipio</th>
              <th scope='col'>Aldea</th>
              <th scope='col'>Latitud</th>
              <th scope='col'>Longitud</th>
            </tr>
            </thead>
            <tbody>";
  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td scope='col'>" . $row['municipio'] . "</td>";
      echo "<td scope='col'>" . preg_replace('/\\\\u([\da-fA-F]{4})/', '&#x\1;', $row['aldea']) . "</td>";
      echo "<td scope='col'>" . $row['lat'] . "</td>";
      echo "<td scope='col'>" . $row['lng'] . "</td>";
      echo "</tr>";
  }
  echo "</tbody></table>";
  echo "</div>";
  mysqli_close($conn);
?> 