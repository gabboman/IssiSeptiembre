<?php
session_start();
require_once("funciones.php");

 $con=conectarBD();
 
$consulta="insert into TERMINAL (idterminal,marca,modelo,pantalla,teclado,memInterna,memExterna,gpu,cpu,camara,cantidad) values (secterminal.nextval,'samsung','GalaxyS3','480x800','tactil',523,4,'Adreno300',800,8,8)";
 echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
//$test =consultabd($consulta,$con);
$err[]='warning: revisar consultaterminal. envio formulario sin informacion del modelo. detalles del navegador del usuario: '.$_SERVER['HTTP_USER_AGENT'] . "\n\n";
error(10,$err);
 
?>