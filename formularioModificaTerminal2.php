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
		<?php
		if (isset($errores) && count($errores) > 0) {
			echo "<div id=\"div_errores\" class=\"error\">";
			foreach ($errores as $error) {
				echo $error . "<br/>";
			}
			echo "</div>";
		}
		?>
		<div>

			<h1>Lista de terminales que coinciden con su criterio de búsqueda</h1>
			<?php
			$consulta="SELECT * FROM TERMINAL WHERE IDTERMINAL = ".$datos_formulario['idterminal'];
			$con=conectarBD();
			$stmt=$con->query($consulta);
			
			foreach ($stmt as $fila) {
			$datos["marca"]=$fila["MARCA"];
			$datos["pantalla"]=$fila["PANTALLA"];
			$datos["modelo"]=$fila["MODELO"];
			$datos["teclado"]=$fila["TECLADO"];
			$datos["meminterna"]=$fila["MEMINTERNA"];
			$datos["memoriaExterna"]=$fila["MEMEXTERNA"];
			$datos["gpu"]=$fila["GPU"];
			$datos["cpu"]=$fila["CPU"];
			$datos["calidadcamara"]=$fila["CAMARA"];
			$datos["cantidad"]=$fila["CANTIDAD"];
			
			generaformularioInsertaTerminal('test.php',$datos);
			$fila["IDTERMINAL"]."<br>";
		/*	echo 'Marca: <input id="marca" name="marca" type="text" required="required" value="'.$fila["MARCA"].'" /><br>';
			echo 'Modelo: <input id= "modelo" name="modelo" type="text" required="required" value="'.$fila["MODELO"].'"/><br>';
			echo 'Pantalla: <input id= "pantalla" name="pantalla" type="text" required="required" value="'.$fila["PANTALLA"].'"/><br>';
			echo 'Teclado: <input id="teclado" name="teclado" type="text" required="required" value="'.$fila["TECLADO"].'"/><br>';
			echo 'MemInterna: <input id="MemInterna" name="MemInterna type="number"'.$fila["MEMINTERNA"].'<br>';
			echo "MemExterna: ".$fila["MEMEXTERNA"]."<br>";
			echo "CPU: ".$fila["CPU"]."<br>";
			echo "GPU: ".$fila["GPU"]."<br>";
			echo "</h4>";
			echo '</form>';
			*/}
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
