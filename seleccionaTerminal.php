<?php
session_start();
$datos_formulario = $_SESSION["formulario"];



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
			$stmt=$con->query("SELECT * FROM TERMINAL WHERE MARCA LIKE '".$datos_formulario["marca"]."' AND MODELO LIKE '".$datos_formulario["modelo"]."'");
			foreach ($stmt as $fila) {
			echo "<h4>Terminal numero".$fila["IDTERMINAL"]."
			<br>";
			echo '<a href="Index.html">Inicio</a>';
			echo "Modelo: ".$fila["MODELO"]."<br>";
			echo "Marca: ".$fila["MARCA"]."<br>";
			echo "Pantalla: ".$fila["PANTALLA"]."<br>";
			echo "Teclado: ".$fila["TECLADO"]."<br>";
			echo "MemInterna: ".$fila["MEMINTERNA"]."<br>";
			echo "MemExterna: ".$fila["MEMEXTERNA"]."<br>";
			echo "CPU: ".$fila["CPU"]."<br>";
			echo "GPU: ".$fila["GPU"]."<br>";
			echo "</h4>";
			}
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
