<?php
session_start();
$datos_formulario = $_SESSION["formulario_consulta_tarifa"];

//session_destroy();

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
		<h1>Lista de tarifas y operadores que coinciden con su criterio de búsqueda</h1>
			<?php
				$con=conectarBD();
				$con2=conectarBD();
				$stmt2=consultabd("SELECT * FROM OPERADORES WHERE NOMBRE LIKE '".$datos_formulario["operador"]."'",$con);
				//$temp="a";
				echo $datos_formulario["operador"];
				foreach ($stmt2 as $fila2) {
				$temp=$fila2["IDOPERADOR"];
				echo $temp.'PATATAS<br>';
				$stmt=consultabd("SELECT * FROM TARIFAS WHERE IDOPERADOR LIKE ".$temp,$con2 );
				foreach ($stmt as $fila) {
				echo "Nombre tarifa: ".$fila["NOMBRETARIFA"]."<br>";
				}
				}
				$con=desconectar();
				$con2=desconectar();
			
			
			?>

			
			<div id="div_volver">
				Pulse <a href="Tarifas.php">aquí</a> para volver a Tarifas.
			</div>
		</div>
	</body>
</html>

<?php session_destroy(); ?>
