<?php
session_start();
$excepcion = $_SESSION['excepcion'];
if (isset($excepcion))
	unset($_SESSION['excepcion']);
else
	header("Location:index.html");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Error</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
	</head>
	<body>
		<p>
			Ocurrió un problema durante el procesado de los datos. Pulse <a href="index.html">aquí</a> para volver.
		</p>
		<?php

		echo $excepcion;
		?>
	</body>
</ht