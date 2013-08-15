<?php
session_start();
$formulario = $_SESSION["modificaterminal"];
require_once("funciones.php");
if (isset($_GET["idterminal"])) {
	$formulario["idterminal"] = $_GET["idterminal"];
	$_SESSION["modificaterminal"] = $formulario;
} else
	Header("Location:formularioSeleccionaTerminal1.php");

$errores = validarSelecciontaTerminal($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioModificaTerminal1.php");
} else
	Header("Location:formularioModificaTerminal2.php");
	

?>