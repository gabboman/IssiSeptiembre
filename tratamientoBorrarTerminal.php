<?php
session_start();
$formulario = $_SESSION["formulario_borrado_terminal"];//what
require_once("funciones.php");
if (!isset($formulario)) {
	$formulario["marca"] = $_REQUEST["marca"];
	$formulario["modelo"] = $_REQUEST["modelo"];
	$_SESSION["formulario_borrado_terminal"] = $formulario;
} else
	Header("Location:formularioConsultaTerminal.php");

$errores = validarConsultaTerminal($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioborradoTerminal.php");
} else
	Header("Location:seleccionaterminalborrado.php");
/* Codigo ahora en funciones.php
function validar($formulario) {

	if (!(isset($formulario['marca']) && strlen($formulario['marca']) > 0))
		$errores[] = 'El campo <b>Marca</b> no puede ser vacío';
	if (!(isset($formulario['modelo']) && strlen($formulario['modelo']) > 0))
		$errores[] = 'El campo <b>modelo</b> no puede ser vacío';

	return $errores;

}
*/
?>