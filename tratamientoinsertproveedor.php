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
	Header("Location:ExitoInsertaProveedor.php");
/*
function validar($formulario) {
	foreach ($formulario as $clave => $valor){
	if (!(isset($formulario[$clave]) && strlen($formulario[$clave]) > 0))
		$errores[] = 'El campo <b>'.$clave.'</b> no puede estar vacío';	
    
	}
	
	
	if (!(preg_match("/^[0-9]+x[0-9]+$/", $formulario["pantalla"]))) {
    $errores[]='La resolucion de pantalla debe ser del formato NxM siendo N y M números enteros';
}

	
	/*
	if (!(isset($formulario['marca']) && strlen($formulario['marca']) > 0))
		$errores[] = 'El campo <b>Marca</b> no puede ser vacío';
	if (!(isset($formulario['']) && strlen($formulario['']) > 0))
			$errores[] = 'El campo <b>Operador</b> no puede ser vacío';
	*//*
	return $errores;

}*/

?>