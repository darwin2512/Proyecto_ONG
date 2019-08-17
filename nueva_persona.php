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
						<h3 style="text-align:center">Registro de Pescadores de Izabal</h3>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN HEADING -->

			<!-- FORMULARIO DE LLENAR DATOS -->
		<section class="forms">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<form name="guardar_persona"class="form-horizontal needs-validation" method="POST" action="guardar_persona.php" autocomplete="off">
						<!-- NOMBRES -->
							<div class="form-group">
								<label for="nombre" class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
									</div>
									<div class="invalid-feedback">Porfavor ingresa un nombre.</div>
							</div>
						<!-- APELLIDOS -->
							<div class="form-group">
								<label for="apellido" class="col-sm-2 control-label">Apellido</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
									</div>
							</div>
						<!-- CUI -->
							<div class="form-group">
								<label for="cui" class="col-sm-2 control-label">CUI</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="cui" name="cui" placeholder="ej: 2356-45678-2332"  required>
									</div>
							</div>
						
						<!-- TELEFONO -->
							<div class="form-group">
								<label for="telefono" class="col-sm-2 control-label">Telefono</label>
									<div class="col-sm-10">
										<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="ej: 56784565"  >
									</div>
							</div>
						<!-- FECHA -->
							<div class="form-group">
								<label for="fecha" class="col-sm-2 control-label">Fecha de Nacimiento</label>
									<div class="col-sm-10">
									<input type="date" name="fecha" id="fecha" placeholder="" required>
									</div>
							</div>
							<!--MUNICIPIO -->
							<div class="form-group">
								<label for="municipio" class="col-sm-2 control-label">Municipio</label>
									<div class="col-sm-10">
										<select class="form-control" id="municipio" name="municipio">
											 <option value="0">Selecciona un Municipio:</option>
											<?php while($row = $resultado->fetch_assoc()) { ?>
												<option     value="<?php echo $row['id_municipio']; ?>"   >  <?php echo $row['municipio']; ?></option>
											<?php } ?>
										</select>
									</div>
							</div>
						<!-- comunidad -->
							<div class="form-group">
								<label for="aldea" class="col-sm-2 control-label">Aldea</label>
									<div class="col-sm-10">
										<select class="form-control" id="aldea" name="aldea"></select>
									</div>
							</div>
						
					<!-- CAPACITACIONES -->
					<div class="form-group">
						<div class="col-sm-10">
					<label for="">Ha participado en talleres?</label>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="taller" id="taller1" value="si" checked>
						<label class="form-check-label" for="taller1">
							SI
						</label>
						</div>
						<div class="form-check">
						<input class="form-check-input" type="radio" name="taller" id="taller2" value="no">
						<label class="form-check-label" for="taller2">
							NO
						</label>
						</div>
						</div>
					</div>			
						<!-- fin capacitaciones -->
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<!-- <a href="index.php" class="btn btn-default">Regresar</a> -->				<button name ="guardar" type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
</section>
<!-- FIN FORMS -->
</div>
</div>
<!-- FIN MAIN -->

<!-- sidebar -->
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
                    <li><a href="lista_taller.phps">Ver lista</a></li>
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
			<!--  -->			
        </div>
	</div>
	<!-- fin sidebar -->
 </div>
<!-- fin wrape --> 


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
