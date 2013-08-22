<?php
session_start();


$datos_formulario = $_SESSION["formulario"];



require_once ("funciones.php");


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
			$consulta="DELETE FROM TERMINAL WHERE IDTERMINAL = ".$datos_formulario['idterminal'];
			$con=conectarBD();
			$stmt=consultabd($consulta,$con);
			echo 'terminal borrado'.'<br>';
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>

