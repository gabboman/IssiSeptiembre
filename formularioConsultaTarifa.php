<?php
session_start();

if (!isset($_SESSION['formulario'])) {

	$formulario['operador'] = "Movistar";
	$_SESSION['formulario'] = $formulario;
} else
	$formulario = $_SESSION['formulario'];

if (isset($_SESSION['errores']))
	$errores = $_SESSION['errores'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Consultar Tarifas</title>
		<link type="text/css" rel="stylesheet" href="css/estilo_formularioTarifa.css">
		<script type= "text/javascript" language="JavaScript" src="js/validacionTarifas.js"></script>
	</head>
	<body>
		<?php
		if(isset($errores))
			mostrarerrores($errores);
		?>
		<h1>Consultar Tarifas</h1>
		<div id="cabecera"></div>
		<div id="div_formu">
			<form id="formulario" name="formulario" onsubmit="return validar()" action="tratamientoConsultarTarifa.php" method="post">

				<div id="div_operador">
					<label id="label_operador" for="terminal">Operador</label>
					<input id="operador" name="operador" type="text" value="<?php echo $formulario['operador']?>" />
				</div>
				<div id="div_submit">
					<input name="submit" id="submit" type="submit" class="submit" value="Enviar formulario" />
				</div>
			</form>
		</div>
	</body>
</html>
