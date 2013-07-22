<?php

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

?>
