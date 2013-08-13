<?php

require_once("funciones.php");
$con=conectarBD();
?>
<html>
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
	echo '<tr>
    <td>'.$fila["NOMBRETARIFA"].'</td>
    <td>'.$fila["IDOPERADOR"].'</td>
	<td>'.$fila["CUOTABASE"].'</td>
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