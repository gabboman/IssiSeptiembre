<?php
session_start();
//$formulario = $_SESSION["formulario"];
require_once("funciones.php");
if (!isset($formulario)) {
	$formulario["operador"] = $_REQUEST["operador"];
	$_SESSION["formulario_consulta_tarifa"] = $formulario;
} else
	Header("Location:formularioConsulta.php");

$errores = validarConsultaTarifa($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioConsultaTarifa.php");
} else
	Header("Location:ExitoConsultaTarifa.php");
/*
function validar($formulario) {

	if (!(isset($formulario['tarifa']) && strlen($formulario['tarifa']) > 0))
		$errores[] = 'El campo <b>Tarifa</b> no puede ser vacío';
	if (!(isset($formulario['operador']) && strlen($formulario['operador']) > 0))
		$errores[] = 'El campo <b>Operador</b> no puede ser vacío';

	return $errores;

}
*/
?>