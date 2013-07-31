<?php

session_start();

if (!isset($_SESSION['formulario'])) {
	$formulario['nombre'] = "Pepe";
	$formulario['apellidos'] = "Amador Garcia";
	$formulario['cif']='1256984';
	$formulario['dni']='263587419A';
	
	$_SESSION['formulario'] = $formulario;
} else
	$formulario = $_SESSION['formulario'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Añadir Proveedor</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioProveedor.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionInsertProveedor.js"></script>
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
		<h1>Añadir Proveedor</h1>
		<div id="cabecera"></div>
		<div id="div_formu">
			<form id="formulario" name="formulario"  action="tratamientoInsertProveedor.php" method="post">
				<div id="div_nombre">
					<label id="label_nombre" for="proveedor">Nombre</label>
					<input id="nombre" name="nombre"  type="text" required="required" value="<?php echo $formulario['nombre']?>" />
				</div>
				<div id="div_apellido">
					<label id="label_apellido" for="proveedor">Apellidos</label>
					<input id="apellidos" name="apellidos" type="text required="required" value="<?php echo $formulario['apellidos']?>" />
				</div>
				<div id="div_cif">
					<label id="label_cif" for="proveedor">Cif</label>
					<input id="cif" name="cif" type="text" required="required" value="<?php echo $formulario['cif']?>" />
				</div>
				<div id="div_dni">
					<label id="label_dni" for="proveedor">DNI</label>
					<input id="dni" name="dni" type="text" required="required" value="<?php echo $formulario['dni']?>" />
				</div>
				
				<div id="div_submit">
					<input name="submit" id="submit" type="submit" class="submit" value="Enviar formulario" />
				</div>
			</form>
		</div>
	</body>
</html>
