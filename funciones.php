<?php
//conexión con BD

function conectarBD(){

$host = 'oci:name=localhost/XE';
$username = 'server';
$password = 'password';

try{

$conexion = new PDO($host, $username, $password);
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo "ERROR DE CONEXION:".$e->GetMessage();

}

return $conexion;

}

function desconectar(){
return null;
}


//verificación de formulariosg


function validarConsultaTerminal($formulario) {

	if (!(isset($formulario['marca']) && strlen($formulario['marca']) > 0))
		$errores[] = 'El campo <b>Marca</b> no puede ser vacío';
	if (!(isset($formulario['modelo']) && strlen($formulario['modelo']) > 0))
		$errores[] = 'El campo <b>modelo</b> no puede ser vacío';

	return $errores;

}

function validarConsultaTarifa($formulario) {


	if (!(isset($formulario['operador']) && strlen($formulario['operador']) > 0))
		$errores[] = 'El campo <b>Operador</b> no puede estar vacío';

	return $errores;

}

function validarInsertaTerminal($formulario) {
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
	*/
	return $errores;

}


 function validarSelecciontaTerminal($formulario){
	if ($formulario["idterminal"]<0){
	$errores[]='Algo raro ha pasado, ha tocado usted algo donde no debía? Contacte con un administrador dandole este error: ERROR: ID NEGATIVA';
	}
 }







?>