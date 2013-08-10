<?php
require_once("funciones.php");
session_start();
//$errores='';
if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
	
session_destroy();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Error</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_error.css">
	</head>
	<body>
		<p>
			Al parecer ha habido uno o varios problemas:
		</p>
		<?php
		mostrarerrores($errores);
		?>
		<p>
		Pulse <a href="index.html">aquí</a> para volver a la página principal.
		</p>
		
		
	</body>
</ht