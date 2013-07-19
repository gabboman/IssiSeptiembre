<?php
session_start();
$datos_formulario = $_SESSION["formulario"];
echo $datos_formulario["marca"];
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
			$insert="INSERT into TERMINAL (Idterminal,Marca,Modelo,Pantalla,Teclado,Meminterna,Memexterna,Gpu,Cpu,Camara,Cantidad) Values (Terminales.Nextval,'".$datos_formulario["marca"]."','".$datos_formulario["modelo"]."','".$datos_formulario["pantalla"]."','".$datos_formulario["teclado"]."',".$datos_formulario["meminterna"].",".$datos_formulario["memoriaExterna"].",'".$datos_formulario["gpu"]."',".$datos_formulario["cpu"].",".$datos_formulario["calidadcamara"].",".$datos_formulario["cantidad"].");";
			echo $insert;
			$stmt=$con->exec($insert);
			echo $stmt;
			
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
