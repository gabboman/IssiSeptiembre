<?php
session_start();
require_once("funciones.php");

 $con=conectarBD();
 

 
$test =consultabd("insert into DINAMITA(IDREPARACION,FECHAENTRADA,FECHASALIDA,IDTERMINAL,REPARACIONESREALIZADAS,IDLINEAFACTURACOMP,IDFACTURACOMPRA) values(secrep.nextval,to_date('2008/05/03 11:03:44', 'yyyy/mm/dd hh:mi:ss'),to_date('2008/05/9 2:00:00','yyyy/mm/dd hh:mi:ss'),1,'testvalue',1,1)",$con);

 
?>