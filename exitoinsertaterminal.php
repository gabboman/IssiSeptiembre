<?php
session_start();
$datos_formulario = $_SESSION["formulario"];

session_destroy();

require_once ("test.php");

$conexion = conectarBD();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Éxito</title>
	</head>
	<body>
		<div>

			<h1>Lista de terminales que coinciden con su criterio de búsqueda</h1>
			<?php
			$con=conectarBD();
			$stmt=$con->query("INSERT INTO TERMINAL (idterminal,marca,modelo,pantalla,teclado,memInterna,memExterna,gpu,cpu,camara,cantidad)'".$datos_formulario["marca"]."' AND MODELO LIKE '".$datos_formulario["modelo"]."'");

			}
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
