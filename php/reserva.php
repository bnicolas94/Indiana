<?php require('class.Conexion.php'); 

$time = $_POST['time'];
$fecha = $_POST['date'];
$cantidad = $_POST['count'];
$tel = $_POST['tel'];
$name = $_POST['name'];

$db = new Conexion();
$sql = $db->query("SELECT * FROM mesas WHERE disponible>='$cantidad' AND fecha='$fecha' AND hora='$time';");
$sql2 = $db->query("SELECT * FROM mesas WHERE fecha='$fecha' AND hora='$time';");
$rows = $db->rows($sql);
$rows2 = $db->rows($sql2);
if($rows>0){
$n = $db->recorrer($sql);
$db->liberar($sql);
$db->liberar($sql2);
$keyreg = md5(time());
$cod = substr($keyreg, 0,5);

if($db->query("INSERT INTO reservas (id_mesas,fecha,hora,cantidad,usuario,cod,tel) VALUES ('$n[0]','$fecha','$time','$cantidad','$name','$cod','$tel');")){


$new_a = $n[1] - $cantidad;
$db->query("UPDATE mesas SET disponible='$new_a' WHERE id='$n[0]';");

echo 'Su reserva de ',$cantidad,' personas fue exitosa!. Su código de reserva es: ', $cod,'. Comuniquese al ⁠⁠⁠4831-7266 para confirmar la reserva.';
$para      = 'reservas@indianabarandgrill.com.ar';
$titulo    = 'Nueva reserva';
$mensaje   = 'La siguiente persona ha registrado una reserva: ' . $name . ' el día ' . $fecha . ' a las ' . $time . '. Son un total de ' . $cantidad . ' personas. Su telefono es: ' . $tel;
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);

}else{
	echo 'reserva mala';
}

}elseif($rows2==0){
	$db->query("INSERT INTO mesas (fecha,hora) VALUES ('$fecha','$time');");
	$sql = $db->query("SELECT * FROM mesas WHERE fecha='$fecha' AND hora='$time';");
	$n2 = $db->recorrer($sql);
	$keyreg = md5(time());
	$cod = substr($keyreg, 0,5);

	if($db->query("INSERT INTO reservas (id_mesas,fecha,hora,cantidad,usuario,cod,tel) VALUES ('$n2[0]','$fecha','$time','$cantidad','$name','$cod','$tel');")){

	$new_b = $n2[1] - $cantidad;
	$db->liberar($sql);
	$db->query("UPDATE mesas SET disponible='$new_b' WHERE id='$n2[0]';");


echo 'Su reserva de ',$cantidad,' personas fue exitosa!. Su código de reserva es: ', $cod,'. Comuniquese al ⁠⁠⁠4831-7266 para confirmar la reserva.';
$para      = 'reservas@indianabarandgrill.com.ar';
$titulo    = 'Nueva reserva';
$mensaje   = 'La siguiente persona ha registrado una reserva: ' . $name . ' el día ' . $fecha . ' a las ' . $time . '. Son un total de ' . $cantidad . ' personas. Su telefono es: ' . $tel;
$cabeceras = 'From: reservas@indianabarandgrill.com.ar' . "\r\n" .
    'Reply-To: no@noreply.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
}else{
		echo 'reserva mala';
	}

}else{
	echo 'No hay mas lugares disponibles';
}




?>
