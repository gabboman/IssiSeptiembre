<?php

session_start();
require_once("funciones.php");
$formulario;
if (!isset($_SESSION['formularioInsertaTerminal'])) {


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
	$_SESSION['formularioInsertaTerminal'] = $formulario;
} else
	$formulario = $_SESSION['formularioInsertaTerminal'];

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
			$formulario=$_SESSION['formularioInsertaTerminal'];
			generaformularioInsertaTerminal('tratamientoInsertterminal.php',$formulario);
			//$_SESSION["errores"]=null;
			?>
			<div id="div_lateral">
			<ul>
				<li>
					<a href="Index.html">Inicio</a>
				</li>
				<li>
					<a href="Terminales.php">Terminales</a>
				</li>
				<li>
					<a href="Proveedores.php">Proveedores</a>
				</li>
						
					</ul>
			</ul>
		</div>
	
	</body>
</html>
