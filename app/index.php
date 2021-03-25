<?php
session_start();

if(!isset($_SESSION['admin'])){
	include('login.php');
}else if($_SESSION['admin']=='true'){
	require('php/class.Reservas.php');
	include('app.php');
}else if(($_SESSION['admin']=='local')){
	require('php/class.Reservas.php');
	include('app2.php');
}


?>
