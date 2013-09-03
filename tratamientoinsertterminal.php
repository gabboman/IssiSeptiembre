<?php
session_start();
//$formulario = $_SESSION["formulario"];
require_once("funciones.php");
if (!isset($formulario)) {
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
	$_SESSION['formularioInsertaTerminal']=$formulario;
} else{
	Header("Location:formularioInsertaTerminal.php");
}
	$errores =validarInsertaTerminal($formulario);
	
if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioInsertaTerminal.php");
} else
	Header("Location:ExitoInsertaTerminal.php");
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