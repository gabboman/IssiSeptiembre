<?php
session_start();
$datos_formulario = $_SESSION["formulario_consulta_terminal"];

session_destroy();

require_once ("funciones.php");

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
			$stmt=consultabd("SELECT * FROM TERMINAL WHERE MARCA LIKE '".$datos_formulario["marca"]."' AND MODELO LIKE '".$datos_formulario["modelo"]."'",$con);
			foreach ($stmt as $fila) {
			echo "<h4>Terminal<br>";
			mostrarTerminal($fila);
			echo "</h4>";
			}
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
