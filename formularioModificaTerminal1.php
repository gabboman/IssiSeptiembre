<?php
session_start();
require_once("funciones.php");
if (!isset($_SESSION['formulario'])) {
	$formulario['marca'] = "HTC";
	$formulario['modelo'] = "Galaxy S3";
	$_SESSION['formulario'] = $formulario;
} else
	$formulario = $_SESSION['modificaterminal'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Selección de terminal a modificar</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionesTerminal.js"></script>
	</head>
	<body>
		<?php
		if(isset($errores))
			mostrarerrores($errores);
		?>
		<h1>Selección de terminal</h1>
		<?php
		generaformularioBusquedaTerminal("tratamientoModificaTerminal1.php",$formulario);
		?>
		
	</body>
</html>

