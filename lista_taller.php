<?php
  require 'conexion.php';
	
	$query = "SELECT id_municipio, municipio FROM t_municipio ORDER BY municipio";
	$resultado=$conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title></title>
    <!-- REALIZAR BUSQUEDAS -->
        <script src="vendor/jquery/jquery.min.js"></script>

    		<script language="javascript">
			$(document).ready(function(){
				$("#municipio").change(function () {
 
          // $('#aldea').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
          /*ID_MUNICIPIO VERIFICAR DESPUES */
					$("#municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getAldea.php", { id_municipio: id_municipio }, function(data){
							$("#aldea").html(data);
						});            
					});
				})
      });
		</script>

    <!-- Estilos de Bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/parcialOne/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- ESTILO PARA EL MAPA -->
  <link rel="stylesheet" href="/parcialOne/cmapas/estilosm.css">
    <!-- archivos adicionales de css -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <!-- Iconos -->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  </head>
    <body class="is-preload">
      
    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

              <!-- INICIO HEADER -->
		      	<header id="header">
              <div class="logo">
                <a href="index.php">Home</a>
              </div>
            </header>

          <!-- INICIO HEADING -->
	<div class="page-heading">
			<div class="container-fluid">
				<div class="row ">
					<div class="col-md-12">
						<h3 style="text-align:center">Lugares Registrados</h3>
					</div>
				</div>
       </div>
    </div>
	<!--INICIO FORMULARIO TRABAJO  -->
     <!-- inicio tabla -->

					<div class="col-md-8">

          <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Municipio</th>
                        <th>ALdea</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM taller";
                        $resul_tarea = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($resul_tarea)) { ?>
                            <tr>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['fecha']?></td>
                                <td><?php echo $row['hora']?></td>
                                <td><?php echo $row['municipio']?></td>
                                <td><?php echo $row['aldea']?></td>
                                <td class= "inline">
                                    <a href="editar_persona.php?id=<?php echo $row['cui'] ?>"class="" >
                                      <i class="material-icons">edit</i>
                                     </a>
                                    <a href="borrar_persona.php?id=<?php echo $row['cui'] ?>" class="">
                                     <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                       <?php } ?> 
                </tbody>
            </table>  
          </div>

<!-- fin FORMULARIO -->
	
</div>
</div>
<!-- FIN MAIN -->
<!-- </div> -->

<!-- MENU LATERAL -->

        <!-- FIN SIDEBAR -->
	</div>
    <!-- FIN WRAPE -->

    

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/custom.js"></script>

    
</body>
</html>
