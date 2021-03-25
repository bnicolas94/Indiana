<?php

		$db = new Conexion();

		$sql2 = $db->query("SELECT * FROM reservas ORDER BY fecha, hora ASC");

			
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de reservas | Index </title>
	<!-- Compiled and minified CSS -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	
	  <!-- Compiled and minified JavaScript -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

	  <link rel="stylesheet" href="css/app.css">
</head>
<body class=" blue-grey lighten-4">
	

	<div class="container-fluid">
		<div class="row">
			<div class="col s12 center-align">
				<img src="../images/logo1.png" class="responsive-img" alt="Indiana Bar & Grill">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col s6 frm center-align">

				<form action="#" method="post">
					<div class="col s12">
						<label for="cod">Codigo de reserva:</label>
						<input type="text" id="cod" class="white-text center-align" placeholder="Escriba el codigo...">
					</div>
					<div class="col s12">
						<a class="waves-effect waves-light btn" id="enviar">Buscar</a>
						<a class="waves-effect waves-light btn" id="show">Lista completa</a>
					</div>
					
				</form>

			</div>

			<div class="col s6"></div>

			<div class="col s12"><!-- LISTA COMPLETA -->
				<div class="tabla1">
					<h3>Lista de reservas completa</h3>
					<table class="stripped  bordered">
					<tr>
						<th>Codigo</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Cantidad</th>
						<th>Nombre</th>
						<th>Telefono</th>
						<th>Estado</th>
						
					</tr>
					<?php while($rows = $db->recorrer($sql2)){

							if($rows['fecha']>= date("Y-m-d")){

						?>
					<tr>
						<th id=""><?php echo $rows['cod']; ?></th>
						<th id=""><?php echo $rows['fecha']; ?></th>
						<th id=""><?php echo $rows['hora']; ?></th>
						<th id=""><?php echo $rows['cantidad']; ?></th>
						<th id=""><?php echo $rows['usuario']; ?></th>
						<th><?php echo $rows['tel']; ?></th>
						<th>
							
							<?php

								if($rows['ok']==0){
									echo 'No confirmado';
								}else{echo 'Confirmado';} ?>

						</th>
						
					</tr>
					<?php }
					} ?>
				</table>
				</div>

			</div>

			<div class="col s12"><!-- LISTA INDIVIDUAL -->
				<div class="tabla2" style="display: none;">
					<h3>Reserva de: <span id="user"></span></h3>
					<table border="1" class="stripped bordered">
					<tr>
						<th>Codigo</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Cantidad</th>
						<th>Nombre</th>
						<th>Telefono</th>
						<th>Estado</th>
						
					</tr>
					<tr>
						<th id="codigo"></th>
						<th id="fecha"></th>
						<th id="hora"></th>
						<th id="cantidad"></th>
						<th id="usuario"></th>
						<th id="telefono"></th>
						<th id="ok" class="">
							
						<?php

								if($rows['ok']==0){
									echo 'No confirmado';
								}else{echo 'Confirmado';} ?>
								

						</th>
						
					</tr>
	
				</table>
				</div>
			</div>

		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s3 center-text">
				<a href="php/logout.php">Cerrar Sesion</a>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</body>
</html>