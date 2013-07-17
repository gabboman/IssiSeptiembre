<?php
session_start();
$formulario = $_SESSION["formulario"];

if (isset($formulario)) {
	$formulario["tarifa"] = $_REQUEST["tarifa"];
	$formulario["operador"] = $_REQUEST["operador"];
	$_SESSION["formulario"] = $formulario;
} else
	Header("Location:formularioConsultaTarifa.php");

$errores = validar($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioConsultaTarifa.php");
} else
	Header("Location:ExitoConsultaTarifa.php");

function validar($formulario) {

	if (!(isset($formulario['tarifa']) && strlen($formulario['tarifa']) > 0))
		$errores[] = 'El campo <b>Tarifa</b> no puede ser vacío';
	if (!(isset($formulario['operador']) && strlen($formulario['operador']) > 0))
		$errores[] = 'El campo <b>Operador</b> no puede ser vacío';

	return $errores;

}
?>