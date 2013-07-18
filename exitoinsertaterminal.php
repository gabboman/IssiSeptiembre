<?php
session_start();
$form = $_SESSION["formulario"];

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
			$insert="Insert Into Terminal (Idterminal,Marca,Modelo,Pantalla,Teclado,Meminterna,Memexterna,Gpu,Cpu,Camara,Cantidad) Values (Terminales.Nextval,'".$form['marca']."','".$form['modelo']."','".$form['pantalla']."','".$form['teclado']."',".$form['meminterna'].",".$form['memoriaExterna'].",'".$form['gpu']."',".$form['cpu'].",".$form['calidadcamara'].",".$form['cantidad'].");";
			echo $insert;
			$stmt=$con->query("Insert Into Terminal (Idterminal,Marca,Modelo,Pantalla,Teclado,Meminterna,Memexterna,Gpu,Cpu,Camara,Cantidad) Values (Terminales.Nextval,'".$form['marca']."','".$form['modelo']."','".$form['pantalla']."','".$form['teclado']."',".$form['meminterna'].",".$form['memoriaExterna'].",'".$form['gpu']."',".$form['cpu'].",".$form['calidadcamara'].",".$form['cantidad'].");");

			
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>
