<?php


require_once ("funciones.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>MobileNation</title>
		<link rel="shortcut icon" href="IMG/MobileNation.jpg">
		<link rel="stylesheet" type="text/css"  href="css/estilo_terminales.css">
	</head>
	<body >
			<?php
			$con=conectarBD();
			$stmt=$con->query("SELECT * FROM TERMINAL");
			foreach ($stmt as $fila) {
			echo "<h4>Terminal<br>";
			mostrarTerminal($fila);
			echo "</h4>";
			}
			?>
			
		</body>
		</html>