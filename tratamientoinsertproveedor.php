<?php
session_start();
$formulario = $_SESSION["formulario"];
require_once("funciones.php");
if (!isset($_SESSION['formulario'])) {
	$formulario['nombre'] = "Pepe";
	$formulario['apellidos'] = "Amador Garcia";
	$formulario['cif']='1256984';
	$formulario['dni']='263587419A';
	$_SESSION['formulario'] = $formulario;
	
} else
	Header("Location:formularioInsertaProveedor.php");

$errores =validacionInsertaProveedor($formulario);
if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioInsertaProveedor.php");
} else
	Header("Location:exitoinsertaproveedor.php");

?>