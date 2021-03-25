<?php 
	require('class.Conexion.php');
	if(isset($_POST['cod'])){
		$cod = $_POST['cod'];
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM reservas WHERE cod='$cod';");
		
		while($rows = $db->recorrer($sql)){

			$fecha = $rows['fecha'];
			$hora = $rows['hora'];
			$codigo = $rows['cod'];
			$usuario = $rows['usuario'];
			$cantidad = $rows['cantidad'];
			
			$datos = array($fecha,$hora,$codigo,$usuario,$cantidad);
			echo json_encode($datos);
		}


	
	}

	

 ?>