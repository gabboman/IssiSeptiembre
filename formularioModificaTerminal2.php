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
			$con=conectarBD();
			$stmt=$con->query("SELECT * FROM TERMINAL WHERE IDTERMINAL LIKE '".$$datos_formulario['idelem']."'");
			foreach ($stmt as $fila) {
			
			echo '<form id="formulario" name="formulario" onsubmit="return validar()" action="tratamientoModificaTerminal2.php" method="post">';
			echo "<h4>Terminal numero ".$fila["IDTERMINAL"]."<br>";
			echo 'Marca: <input id="marca" name="marca" type="text" required="required" value="'.$fila["MARCA"].'" /><br>';
			echo 'Modelo: <input id= "modelo" name="modelo" type="text" required="required" value="'.$fila["MODELO"].'"/><br>';
			echo 'Pantalla: <input id= "pantalla" name="pantalla" type="text" required="required" value="'.$fila["PANTALLA"].'"/><br>';
			echo "Teclado: ".$fila["TECLADO"]."<br>";
			echo "MemInterna: ".$fila["MEMINTERNA"]."<br>";
			echo "MemExterna: ".$fila["MEMEXTERNA"]."<br>";
			echo "CPU: ".$fila["CPU"]."<br>";
			echo "GPU: ".$fila["GPU"]."<br>";
			echo "</h4>";
			echo '</form>';
			}
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
