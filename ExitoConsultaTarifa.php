<?php
session_start();
$datos_formulario = $_SESSION["formulario"];

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
			<?php
				$con=conectarBD();
				$con2=conectarBD();
				$stmt2=$con2->query("SELECT * FROM OPERADOR WHERE IDOPERADOR LIKE '".datos_formulario["operador"]."'");
				$temp="a";
				foreach ($stmt2 as $fila2) {
				$temp=$fila2["IDOPERADOR"];
				}
				$stmt=$con->query("SELECT * FROM TARIFA WHERE IDOPERADOR LIKE '"$temp"'" );
				foreach ($stmt as $fila) {
				echo "Nombre tarifa: ".$fila["PRECIOMINUTO"]."<br>";
				
			}
			?>

			<h1>Lista de tarifas y operadores que coinciden con su criterio de búsqueda</h1>
			<div id="div_volver">
				Pulse <a href="Tarifas.php">aquí</a> para volver a Tarifas.
			</div>
		</div>
	</body>
</html>
<?php
CerrarConexionBD($conexion);
?>