<?php
session_start();
//$formulario = $_SESSION["modificaterminal"];
require_once("funciones.php");
if (!isset($formulario)) {
	$formulario["marca"] = $_REQUEST["marca"];
	$formulario["modelo"] = $_REQUEST["modelo"];
	$_SESSION["formulario"] = $formulario;
} else
	Header("Location:formularioModificaTerminal1.php");

$errores = validarConsultaTerminal($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioModificaTerminal1.php");
} else
	Header("Location:seleccionaTerminal.php");
	

	
?>