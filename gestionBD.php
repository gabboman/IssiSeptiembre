<?php

function CrearConexionBD() {
	$host = "oci:dbname=localhost/XE";
	$usuario = "GRUPOFUTBOL1";
	$password = "GRUPOFUTBOL1";
	$conexion;

	try {
		$conexion = new PDO($host, $usuario, $password);

		$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
		$_SESSION['excepcion'] = $e;
		header("Location:error.php");
	}
	return $conexion;
}

function CerrarConexionBD($conexion) {
	$conexion = null;
}
?>