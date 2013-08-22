<?php
session_start();
//$formulario = $_SESSION["formulario"];
require_once("funciones.php");
//if (isset($_SESSION["formulario_inserta_proveedor"])) {
	$formulario['nombre'] = $_REQUEST["nombre"];
	$formulario['apellidos'] = $_REQUEST["apellidos"];;
	$formulario['cif']=$_REQUEST["cif"];;
	$formulario['dni']=$_REQUEST["dni"];
	$_SESSION['formulario_inserta_proveedor'] = $formulario;
	
/*}
 else
	Header("Location:formularioInsertaProveedor.php");
*/
$errores =validacionInsertaProveedor($formulario);
if (count($errores) > 0) {
	$_SESSION["errores"] = $errores;
	Header("Location:formularioInsertaProveedor.php");
} else
	//$sql = "SELECT count(*) FROM PROVEEDORES WHERE CIF like '".$formulario['cif']."';";
	//$con=conectarBD();
	
	Header("Location:exitoinsertaproveedor.php");

?>