<?php
require_once ("funciones.php");
session_start();

if (!isset($_SESSION['formulario_consulta_terminal'])) {
	$formulario['marca'] = "HTC";
	$formulario['modelo'] = "Galaxy S3";
	$_SESSION['formulario_consulta_terminal'] = $formulario;
} else
	$formulario = $_SESSION['formulario_consulta_terminal'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Consultar Terminal</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionesTerminal.js"></script>
	</head>
	<body>
		<?php
		if(isset($errores))
			mostrarerrores($errores);
		?>
		<h1>Consultar Terminal</h1>
		<div id="cabecera"></div>
		<?php
		generaformularioBusquedaTerminal("tratamientoConsultarTerminal.php",$formulario);
		?>
	</body>
</html>
