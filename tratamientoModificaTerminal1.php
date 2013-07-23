<?php
require_once ("tratamientoConsultarTerminal.php");
session_start();
$formulario = $_SESSION["formulario"];
/*
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
*/
	?>