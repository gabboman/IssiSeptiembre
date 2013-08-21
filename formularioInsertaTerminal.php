<?php

session_start();
require_once("funciones.php");
if (!isset($_SESSION['formulario'])) {


	$formulario["marca"] = "HTC";
	$formulario["modelo"] = "Galaxy S3";
	$formulario["pantalla"]='500x200';
	$formulario["teclado"]='QWERTY';
	$formulario["memoriaExterna"]='512';
	$formulario["meminterna"]='256';
	$formulario["gpu"]='adreno 24';
	$formulario["cpu"]='500';
	$formulario["calidadcamara"]='9';
	$formulario["cantidad"]='5';
	$_SESSION['formulario'] = $formulario;
} else
	$formulario = $_SESSION['formulario'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Añadir Terminal</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionInsertTerminal.js"></script>
	</head>
	<body>
		<?php
		if(isset($errores))
			mostrarerrores($errores);
		?>
		<h1>Añadir Terminal</h1>
		

			<?php
			generaformularioInsertaTerminal('tratamientoInsertterminal.php',$formulario);
			?>
	
	</body>
</html>
