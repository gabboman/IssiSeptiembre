<?php
session_start();

if (!isset($_SESSION['formulario'])) {
	$formulario['marca'] = "HTC";
	$formulario['modelo'] = "Galaxy S3";
	$_SESSION['formulario'] = $formulario;
} else
	$formulario = $_SESSION['formulario'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Consultar Terminal</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTerminal.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionesTerminal.js"></script>
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
		<h1>Consultar Terminal</h1>
		<div id="cabecera"></div>
		<div id="div_formu">
			<form id="formulario" name="formulario" onsubmit="return validar()" action="tratamientoConsultarTerminal.php" method="post">
				<div id="div_marca">
					<label id="label_marca" for="terminal">Marca</label>
					<input id="marca" name="marca" type="text" value="<?php echo $formulario['marca']?>" />
				</div>
				<div id="div_modelo">
					<label id="label_modelo" for="terminal">Modelo</label>
					<input id="modelo" name="modelo" type="text" value="<?php echo $formulario['modelo']?>" />
				</div>
				<div id="div_submit">
					<input name="submit" id="submit" type="submit" class="submit" value="Enviar formulario" />
				</div>
			</form>
		</div>
	</body>
</html>