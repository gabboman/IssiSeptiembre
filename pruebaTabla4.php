<?php

require_once("funciones.php");
$con=conectarBD();
?>
<html>
<body>

<table border="1">
  <caption>Terminales</caption>
  <tr>
    <th>Marca</th>
    <th>Modelo</th>
  </tr>
  <?php
  
  $consulta='SELECT * FROM TERMINAL';
  $terminales=consultabd($consulta,$con);
  foreach ($terminales as $fila) {
	echo '<tr>
    <td>'.$fila["MARCA"].'</td>
    <td>'.$fila["MODELO"].'</td>
	<td>'.$fila["PANTALLA"].'</td>
	<td>'.$fila["TECLADO"].'</td>
	<td>'.$fila["MEMINTERNA"].'</td>
	<td>'.$fila["MEMEXTERNA"].'</td>
	<td>'.$fila["GPU"].'</td>
	<td>'.$fila["CPU"].'</td>
	<td>'.$fila["CAMARA"].'</td>
	<td>'.$fila["CANTIDAD"].'</td>
   </tr>';
  }
  ?>
 
</table>

</body>
</html>