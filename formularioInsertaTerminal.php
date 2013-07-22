<?php

session_start();

if (!isset($_SESSION['formulario'])) {
	$formulario['marca'] = "HTC";
	$formulario['modelo'] = "Galaxy S3";
	$formulario['pantalla']='500x200';
	$formulario['teclado']='QWERTY';
	$formulario['memoriaExterna']='512';
	$formulario['meminterna']='256';
	$formulario['gpu']='adreno 24';
	$formulario['cpu']='500';
	$formulario['calidadcamara']='9';
	$formulario['cantidad']='5';
	$_SESSION['formulario'] = $formulario;
} else
	$formulario = $_SESSION['formulario'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Añadir Terminal</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionInsertTerminal.js"></script>
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
		<h1>Añadir Terminal</h1>
		<div id="cabecera"></div>
		<div id="div_formu">
			<form id="formulario" name="formulario" onsubmit="return validar()" action="tratamientoInsertTerminal.php" method="post">
				<div id="div_marca">
					<label id="label_marca" for="terminal">Marca</label>
					<input id="marca" name="marca" type="text" value="<?php echo $formulario['marca']?>" />
				</div>
				<div id="div_pantalla">
					<label id="label_pantalla" for="terminal">pantalla</label>
					<input id="pantalla" name="pantalla" type="text"  required="required"value="<?php echo $formulario['pantalla']?>" />
				</div>title="Debe ser con este formato: 240x380" pattern="[0-9]+x[0-9]+"
				<div id="div_modelo">
					<label id="label_modelo" for="terminal">modelo</label>
					<input id="modelo" name="modelo" type="text" required="required" value="<?php echo $formulario['modelo']?>" />
				</div>
				<div id="div_teclado">
					<label id="label_teclado" for="terminal">teclado</label>
					<input id="teclado" name="teclado" type="text" required="required" value="<?php echo $formulario['teclado']?>" />
				</div>
				<div id="div_meminterna">
					<label id="label_meminterna" for="terminal">meminterna</label>
					<input id="meminterna" name="meminterna" type="number" min="0" required="required"value="<?php echo $formulario['meminterna']?>" />
				</div>
				<div id="div_memoriaExterna">
					<label id="label_memoriaExterna" for="terminal">memoriaExterna</label>
					<input id="memoriaExterna" name="memoriaExterna" type="number" min="1" required="required"value="<?php echo $formulario['memoriaExterna']?>" />
				</div>
				<div id="div_gpu">
					<label id="label_gpu" for="terminal">gpu</label>
					<input id="gpu" name="gpu" type="text" required="required"value="<?php echo $formulario['gpu']?>" />
				</div>
				<div id="div_cpu">
					<label id="label_cpu" for="terminal">cpu</label>
					<input id="cpu" name="cpu" type="text" required="required"value="<?php echo $formulario['cpu']?>" />
				</div>
				<div id="div_calidadcamara">
					<label id="label_calidadcamara" for="terminal">calidadcamara</label>
					<input id="calidadcamara" name="calidadcamara" type="number" required="required"value="<?php echo $formulario['calidadcamara']?>" />
				</div>
				<div id="div_cantidad">
					<label id="label_cantidad" for="terminal">cantidad</label>
					<input id="cantidad" name="cantidad" type="number" required="required" min = "5" "value="<?php echo $formulario['cantidad']?>" />
				</div>
				<div id="div_submit">
					<input name="submit" id="submit" type="submit" class="submit" value="Enviar formulario" />
				</div>
			</form>
		</div>
	</body>
</html>
