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
		session_destroy();
		session_start();
		$errores[]="Error conectando a la base de datos";
		$errorlog[]="Error conectando a la base de datos: ".$consulta."\r\nDETALLES: ".$e->GetMessage();
		error(0,$errorlog);
		$_SESSION['errores'] = $errores;
		header('Location: error.php');
}

return $conexion;

}

function desconectar(){
return null;
}


function consultabd($consulta,$con){//hm... tambien sirve para hacer inserts! pues a remodelar!
$stmt='NULL';
try{
			$stmt=$con->query($consulta);
}catch(PDOException $e){
		session_destroy();
		session_start();
		$errores[]="Ha habido un error! Pero tranquilo, ha quedado registrado para que nuestros técnicos lo arreglen";
		$errorlog[]="Error realizando el siguiente comando sql: ".$consulta."\r\nDETALLES: ".$e->GetMessage();
		error(1,$errorlog);
		$_SESSION['errores'] = $errores;
		header('Location: error.php');
}
//$stmt=$con->query($consulta);
return $stmt;
}




//verificación de formulariosg


function validarConsultaTerminal($formulario) {

	if (!(isset($formulario['marca']) && strlen($formulario['marca']) > 0))
		$errores[] = 'El campo <b>Marca</b> no puede ser vacío';
		$log='warning: revisar consultaterminal. envio formulario sin informacion de la marca. detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);
	if (!(isset($formulario['modelo']) && strlen($formulario['modelo']) > 0))
		$errores[] = 'El campo <b>modelo</b> no puede ser vacío';
		$log='warning: revisar consultaterminal. envio formulario sin informacion del modelo. detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);

	return $errores;

}

function validarConsultaTarifa($formulario) {


	if (!(isset($formulario['operador']) && strlen($formulario['operador']) > 0)){
		$errores[] = 'El campo <b>Operador</b> no puede estar vacío';
		$log='warning: revisar consultatarifa. envio formulario sin informacion del operador. detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);}
	return $errores;

}

function validarInsertaTerminal($formulario) {
	foreach ($formulario as $clave => $valor){
	if (!(isset($formulario[$clave]) && strlen($formulario[$clave]) > 0)){
		$errores[] = 'El campo <b>'.$clave.'</b> no puede estar vacío';	
		$log='warning: revisar insertaterminal. envio formulario sin informacion valida de '.$clave.'. detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);}
    
	}
	if($formulario["cantidad"]<5){
		$errores[]= 'La cantidad ha de ser mayor que 5';
		$log='warning: revisar insertaterminal. envio formulario sin informacion valida de "cantidad". detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,log);
	}
	
	if (!(preg_match("/^[0-9]+x[0-9]+$/", $formulario["pantalla"]))) {
		$errores[]='La resolucion de pantalla debe ser del formato NxM siendo N y M números enteros';
		$log='warning: revisar insertaterminal. El formato de la pantalla no es válido!: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);
	
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

function generaformularioBusquedaTerminal($accion, $formulario){
echo '		<div id="div_formu">
			<form id="formulario" name="formulario"  action="'.$accion.'" method="post">
				<div id="div_marca">
					<label id="label_marca" for="terminal">Marca</label>
					<input id="marca" name="marca" type="text" required="required" value="'.$formulario['marca'].'" />
				</div>
				<div id="div_modelo">
					<label id="label_modelo" for="terminal">Modelo</label>
					<input id="modelo" name="modelo" type="text" required="required" value="'.$formulario['modelo'].'" />
				</div>
				<div id="div_submit">
					<input name="submit" id="submit" type="submit" class="submit" value="Enviar formulario" />
				</div>
			</form>';
}
 
 function generaformularioInsertaTerminal($accion,$fuente){
 
 //funcion de pruebas, actualmente es algo que estoy pensando y esta muy verde
echo ' 			<form id="formulario" name="formulario" action="'.$accion.'" method="post">
				<div id="div_marca">
					<label id="label_marca" for="terminal">Marca</label>
					<input id="marca" name="marca" required="required" type="text" value="'.$fuente["marca"].'" />
				</div>
				<div id="div_pantalla">
					<label id="label_pantalla" for="terminal">pantalla</label>
					<input id="pantalla" name="pantalla" type="text" title="Debe ser con este formato: 240x380" pattern="[0-9]+x[0-9]+" required="required"value="'.$fuente['pantalla'].'" />
				</div>
				<div id="div_modelo">
					<label id="label_modelo" for="terminal">modelo</label>
					<input id="modelo" name="modelo" type="text" required="required" value="'.$fuente["modelo"].'" />
				</div>
				<div id="div_teclado">
					<label id="label_teclado" for="terminal">teclado</label>
					<input id="teclado" name="teclado" type="text" required="required" value="'.$fuente["teclado"].'" />
				</div>
				<div id="div_meminterna">
					<label id="label_meminterna" for="terminal">meminterna</label>
					<input id="meminterna" name="meminterna" type="number" min="0" required="required"value="'.$fuente["meminterna"].'" />
				</div>
				<div id="div_memoriaExterna">
					<label id="label_memoriaExterna" for="terminal">memoriaExterna</label>
					<input id="memoriaExterna" name="memoriaExterna" type="number" min="1" required="required"value="'.$fuente["memoriaExterna"].'"/>
				</div>
				<div id="div_gpu">
					<label id="label_gpu" for="terminal">gpu</label>
					<input id="gpu" name="gpu" type="text" required="required"value="'.$fuente["gpu"].'"/>
				</div>
				<div id="div_cpu">
					<label id="label_cpu" for="terminal">cpu</label>
					<input id="cpu" name="cpu" type="text" required="required"value="'.$fuente["cpu"].'"/>
				</div>
				<div id="div_calidadcamara">
					<label id="label_calidadcamara" for="terminal">calidadcamara</label>
					<input id="calidadcamara" name="calidadcamara" type="number" required="required"value="'.$fuente["calidadcamara"].'"/>
				</div>
				<div id="div_cantidad">
					<label id="label_cantidad" for="terminal">cantidad</label>
					<input id="cantidad" name="cantidad" type="number" required="required" min = "5" value="'.$fuente["cantidad"].'"/>
				</div>
				<div id="div_submit">
					<input name="submit" id="submit" type="submit" class="submit" value="Enviar formulario" />
				</div>
			</form>';
 
 
 
 }


function validarSeleccionProveedor($formulario){
foreach ($formulario as $clave => $valor){
	if (!(isset($formulario[$clave]) && strlen($formulario[$clave]) > 0)){
		$errores[] = 'El campo <b>'.$clave.'</b> no puede estar vacío';	
		$log='warning: revisar insertaproveedor. envio formulario sin informacion valida de '.$clave.'. detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);}
    
	}
	return $errores;
}
	
	
	
function validacionInsertaProveedor($formulario) {
	foreach ($formulario as $clave => $valor){
	if (!(isset($formulario[$clave]) && strlen($formulario[$clave]) > 0)){
		$errores[] = 'El campo <b>'.$clave.'</b> no puede estar vacío';	
		$log='warning: revisar insertaproveedor, el campo '.$clave.' esta vacio: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
		error(3,$log);
	}
	}

	$sql = "SELECT count(*) FROM PROVEEDORES WHERE CIF like '".$formulario['cif']."'";
	$con=conectarBD();
	$res=consultabd($sql,$con);
	$number_of_rows = $res->fetchColumn();
	if($number_of_rows!=0){
	$errores[]='Ya hay un proveedor con ese CIF, por favor, revise los datos';
 }
	return $errores;
 }
 
 
 function mostrarTerminal($term){
 
			echo "Modelo: ".$term["MODELO"]."<br>";
			echo "Marca: ".$term["MARCA"]."<br>";
			echo "Pantalla: ".$term["PANTALLA"]."<br>";
			echo "Teclado: ".$term["TECLADO"]."<br>";
			echo "MemInterna: ".$term["MEMINTERNA"]."<br>";
			echo "MemExterna: ".$term["MEMEXTERNA"]."<br>";
			echo "CPU: ".$term["CPU"]."<br>";
			echo "GPU: ".$term["GPU"]."<br>";
			echo "Calidad de la cámara: ".$term["CAMARA"]."<br>";
			echo "Cantidad disponible: ".$term["CANTIDAD"]."<br>";
 
 }
 
 
 
 
 function error($numero,$texto){

	$ddf = fopen('logs/error.log','a');// ruta al archivo, append (poner al final)
	foreach($texto as $linea){
	fwrite($ddf,"[".date("r")."] Error $numero: $linea\r\n");
	}
	fclose($ddf);
}

function mostrarerrores($errores){
	echo "<div id=\"div_errores\" class=\"error\">";
	foreach ($errores as $error) {
		echo $error . "<br/>";
	}
	echo "</div>";
}

function mostrarproveedor($prov){
			echo "Nombre: ".$prov["NOMBRE"]."<br>";
			echo "Apellidos: ".$prov["APELLIDOS"]."<br>";
}
?>