<?php

	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if($user == 'admin' && $pass == 'ibiza2017'){
			session_start();
			$_SESSION['admin'] = 'true';
			echo 'ok';
		}else if($user == 'local' && $pass == 'cocina2017'){
			session_start();
			$_SESSION['admin'] = 'local';
			echo 'ok';
		}else{
			echo 'Usuario o contraseña incorrecta.';
		}

	}else{
		header('Location: ../index.php');
	}





?>