<?php
	$nombre= (isset($_REQUEST['nombre']))? $_REQUEST['nombre'] : '';
	$cantidad= (isset($_REQUEST['cantidad']))? $_REQUEST['cantidad'] : '';

	if(trim($nombre)!="" && trim($cantidad)!="") {
		echo "ENTRO AQUI";
		header('Location: reconocimiento.php?nombre='.$nombre.'&cantidad='.$cantidad);
	} else {
		header('Location: index.php');
	}
	die();
?>