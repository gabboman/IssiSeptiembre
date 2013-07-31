<?php
session_start();
$formulario = $_SESSION["formulario"];
require_once("funciones.php");
if (isset($formulario)) {
	$formulario["idterminal"]=$_GET["idterminal"];
	$formulario["marca"] = $_REQUEST["marca"];
	$formulario["pantalla"] = $_REQUEST["pantalla"];
	$formulario["modelo"] = $_REQUEST["modelo"];
	$formulario["teclado"] = $_REQUEST["teclado"];
	$formulario["meminterna"] = $_REQUEST["meminterna"];
	$formulario["memoriaExterna"] = $_REQUEST["memoriaExterna"];
	$formulario["gpu"] = $_REQUEST["gpu"];
	$formulario["cpu"] = $_REQUEST["cpu"];
	$formulario["calidadcamara"] = $_REQUEST["calidadcamara"];
	$formulario["cantidad"] = $_REQUEST["cantidad"];
	$_SESSION["formulario"] = $formulario;
	
	
} else
	Header("Location:formularioModificaTerminal2.php");

$errores = validarInsertaTerminal($formulario);

if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioModificaTerminal2.php");
} else
	Header("Location:exitomodificaterminal.php");
	

?>