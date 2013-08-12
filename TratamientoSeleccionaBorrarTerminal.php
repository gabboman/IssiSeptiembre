<?php
session_start();
$formulario = $_SESSION["formulario"];
require_once("funciones.php");
if (isset($formulario)) {
	$formulario["idterminal"] = $_GET["idterminal"];
	$_SESSION["formulario"] = $formulario;
} else
	Header("Location:formularioSeleccionaTerminal1.php");

$errores = validarSelecciontaTerminal($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioBorradoTerminal.php");
} else
	Header("Location:exitoBorrarTerminal.php");
	

?>