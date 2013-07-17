<?php
session_start();
$formulario = $_SESSION["formulario"];

if (isset($formulario)) {
	$formulario["marca"] = $_REQUEST["marca"];
	$formulario["modelo"] = $_REQUEST["modelo"];
	$_SESSION["formulario"] = $formulario;
} else
	Header("Location:formularioConsultaTerminal.php");

$errores = validar($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioConsultaTerminal.php");
} else
	Header("Location:ExitoConsultaTerminal.php");

function validar($formulario) {

	if (!(isset($formulario['marca']) && strlen($formulario['marca']) > 0))
		$errores[] = 'El campo <b>Marca</b> no puede ser vacío';
	if (!(isset($formulario['modelo']) && strlen($formulario['modelo']) > 0))
		$errores[] = 'El campo <b>modelo</b> no puede ser vacío';

	return $errores;

}
?>