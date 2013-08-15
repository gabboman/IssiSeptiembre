<?php
session_start();
$datos_formulario = $_SESSION["formulario_inserta_proveedor"];
//echo $datos_formulario["marca"];//Esta linea fue usada para probar que funcionaba el sacar datos del formulario anterior. Guardada para la proxima vez que reutilice este código :D
session_destroy();

//if (count($datos_formulario) < 10) {
//	$errores='ERROR! alguno de los campos no ha sido rellenado, o has actualizado la página de exito.';//no se porque no consigo hacer que se muestre
//	$_SESSION["errores"] = $errores;
//	Header("Location:formularioInsertaProveedor.php");
//}


require_once ("funciones.php");

$conexion = conectarBD();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Éxito</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioProveedor.css">
	</head>
	<body>
		<div>

			<h1>Datos añadidos al servidor.</h1>
			<?php
			$con=conectarBD();			
			$insert="INSERT into Proveedores 
			(nombre,apellidos,dni,cif)
			Values
			 ('".$datos_formulario["nombre"]."','".$datos_formulario["apellidos"]."','".$datos_formulario["dni"]."','".$datos_formulario["cif"]."')";
			

			//echo $insert;
			//$insert= utf8_encode($insert);//Innecesario, pense que tenia un error por esto. Era por un maldito ; que sobraba. No hacia falta ponerlo en el insert! razones historicas XD
			$stmt=consultabd($insert,$con);
			//echo $stmt;//Esta linea mostraria el numero de filas afectadas. Lo dejo aqui, algun dia te servira para algo. a mi, a ti, o a alguien que venga a robarme el trabajo :D
			
			?>
			<div id="div_volver">
				Pulse <a href="Proveedores.php">aquí</a> para volver a Proveedor.
			</div>
		</div>
	</body>
</html>
