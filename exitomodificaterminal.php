<?php
session_start();
$datos_formulario = $_SESSION["modificaterminal"];

//echo $datos_formulario["marca"];//Esta linea fue usada para probar que funcionaba el sacar datos del formulario anterior. Guardada para la proxima vez que reutilice este código :D
session_destroy();

if (count($datos_formulario) < 11) {
//	$errores='ERROR! alguno de los campos no ha sido rellenado, o has actualizado la página de exito.';//no se porque no consigo hacer que se muestre
//	$_SESSION["errores"] = $errores;
	Header("Location:formularioModificaTerminal2.php");
}


require_once ("funciones.php");

$conexion = conectarBD();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Éxito</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
	</head>
	<body>
		<div>

			<h1>Datos añadidos al servidor.</h1>
			<?php
			$con=conectarBD();			
			$update="UPDATE TERMINAL
			SET Marca='".$datos_formulario["marca"]."', Modelo='".$datos_formulario["modelo"]."' , Pantalla='".$datos_formulario["pantalla"]."' , Teclado='".$datos_formulario["teclado"]."', Meminterna=".$datos_formulario["meminterna"]." , Memexterna=".
				$datos_formulario["memoriaExterna"].", Gpu='".$datos_formulario["gpu"]."' , Cpu=".$datos_formulario["cpu"].", camara=".$datos_formulario["calidadcamara"]." , Cantidad=".$datos_formulario["cantidad"]."
			WHERE Idterminal=".$datos_formulario["idterminal"];
			
			$stmt=consultabd($update,$con);
						
			?>
			<div id="div_volver">
				Pulse <a href="Terminales.php">aquí</a> para volver a Terminales.
			</div>
		</div>
	</body>
</html>