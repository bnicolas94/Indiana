<?php 
	require('class.Conexion.php');
	if(isset($_POST['cod'])){
		$cod = $_POST['cod'];
		$db = new Conexion();
		if($sql = $db->query("DELETE FROM reservas WHERE cod='$cod';")){
			echo 1;
		}

	}

	

 ?>