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
echo' <tr>
    <td>'.$fila["MARCA"].'</td>
    <td>S3</td>
  </tr>';
  }
  ?>
  <tr>
    <td>Asereje</td>
    <td>Ja de Je</td>
  </tr>
</table>

</body>
</html>