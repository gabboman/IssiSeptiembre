<?php

require_once("funciones.php");
$con=conectarBD();
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/estilo_tarifas.css">
</head>
<body>

<table border="1">
  <caption>Tarifas</caption>
  <tr>
    <th>Nombre Tarifa</th>
    <th>Operador</th>
	<th>Cuota Base</th>
	<th>Precio Minuto</th>
	<th>Consumo Minimo</th>
	<th>Cuota Internet</th>
	<th>Num Minutos Gratuitos</th>
	
  </tr>
  <?php
  
  $consulta='SELECT * FROM TARIFAS';
  $terminales=consultabd($consulta,$con);
  foreach ($terminales as $fila) {
  	$con2=conectarBD();
	$stmt2=$con2->query("SELECT * FROM OPERADORES WHERE IDOPERADOR LIKE '".$fila["IDOPERADOR"]."'");			
  
	echo '<tr>
    <td>'.$fila["NOMBRETARIFA"].'</td>';
	foreach ($stmt2 as $fila2) {
    echo '<td>'.$fila2["NOMBRE"].'</td>';
	}
	echo '<td>'.$fila["CUOTABASE"].'</td>
	<td>'.$fila["PRECIOMINUTO"].'</td>
	<td>'.$fila["CONSUMOMINIMO"].'</td>
	<td>'.$fila["CUOTAINTERNET"].'</td>
	<td>'.$fila["NMINUTOSGRATUITO"].'</td>
   </tr>';
  }
  ?>
 
</table>

</body>
</html>