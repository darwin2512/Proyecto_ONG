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
    <link href="/parcialOne/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/parcialOne/cmapas/estilosm.css">
    <!-- archivos adicionales de css -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

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
						<h3 style="text-align:center">Agenda de talleres</h3>
					</div>
				</div>
      </div>
  </div>
			
			<!-- FORMULARIO DE LLENAR DATOS -->
		<section class="forms">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
					<form class="form-horizontal needs-validation" method="POST" action="guardar_taller.php" autocomplete="off">
                <!-- Tarea -->

                
                <!-- NOmbre taller -->
					<div class="form-group">
						<label for="taller" class="col-sm-2 control-label">Nombre taller</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="taller" name="taller" placeholder="" required >
							</div>
          </div>
          <!-- INICIO DESCRIPCION -->
         <div class="form-group">
						<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" required >
							</div>
          </div>
              <!-- INICIO FECHA -->
          <div class="form-group">
						<label for="fecha" class="col-sm-2 control-label">Fecha</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="fecha" name="fecha" min="2019-08-10" max="2020-08-10" placeholder="" required >
              </div>
            </div>
            <!-- inicio hora y FIN FECHA -->
           <div class="form-group">
						<label for="fecha" class="col-sm-2 control-label">Hora</label>
							<div class="col-sm-10">
								<input type="time" class="form-control" id="hora" name="hora" placeholder="18:00" required >
              </div>
            </div>
            <!-- fin hora, INICIO MUNICIPIO-->
						<div class="form-group">
							<label for="municipio" class="col-sm-2 control-label">Municipio</label>
								<div class="col-sm-10">


                  <select class="form-control" id="municipio" name="municipio">
                   <option value="0">Selecciona un Municipio:</option>
                  <?php foreach($resultado AS $municipio){ ?>
                   
                    <option value="<?= $municipio['id_municipio'];?>"><?=$municipio['municipio']; ?></option>
                  <?php } ?>
                  </select>
								</div>
					    </div>            
					<!-- comunidad -->
						<div class="form-group">
							<label for="aldea" class="col-sm-2 control-label">Aldea</label>
								<div class="col-sm-10">
									<select class="form-control" id="aldea" name="aldea">

                  </select>
								</div>
					    </div>
           <!-- GUARDAR DATOS-->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<!-- <a href="index.php" class="btn btn-default">Regresar</a> -->
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			</div>	
		</div>
	</div>
</section>
<!-- fin FORMULARIO -->
	
</div>
</div>
<!-- FIN MAIN -->
<!-- </div> -->

<!-- MENU LATERAL -->
<div id="sidebar">
          <div class="inner">
            <!-- Search Box -->
            <section id="search" class="alt">
              <form method="get" action="#">
                <input type="text" name="search" id="search" placeholder="Search..." />
              </form>
            </section>
              
            <!-- Menu -->
            <nav id="menu">
              <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="reporte.php">Reportes</a></li>
                <li>
                  <span class="opener">Talleres</span>
                  <ul>
                    <li><a href="nuevo_taller.php">Nuevo</a></li>
                    <li><a href="lista_taller.php">Ver lista</a></li>
                  </ul>
                </li>
                <li>
                  <span class="opener">Pescadores</span>
                  <ul>
                    <li><a href="nueva_persona.php">Nuevo</a></li>
                    <li><a href="lista_persona.php">Ver lista</a></li>
                  </ul>
                </li>
                <li>
                  <span class="opener">Lugares</span>
                  <ul>
                    <li><a href="nuevo_lugar.php">Nuevo</a></li>
                    <li><a href="lista_mapa.php">Ver mapa</a></li>
                  </ul>
                </li>
                <li><a href="https://www.google.com">Busqueda</a></li>
              </ul>
            </nav>
          
        </div>
        </div>
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
