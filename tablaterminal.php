<?php

require_once("funciones.php");
$con=conectarBD();
?>
<html>
<head> <link type="text/css" rel="stylesheet" href="css/estilo_terminales.css"> </head>
<body>

<table border="1">
  <caption>Terminales</caption>
  <tr>
    <th>Marca</th>
    <th>Modelo</th>
	<th>Pantalla</th>
	<th>Teclado</th>
	<th>MemInterna</th>
	<th>MemExterna</th>
	<th>GPU</th>
	<th>CPU</th>
	<th>Camara</th>
	<th>Cantidad</th>
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
  <div id="div_lateral">
			<ul>
				<li>
					<a href="Index.html">Inicio</a>
				</li>
				<li>
					<a href="Terminales.php">Terminales</a>
				</li>
				<li>
					<a href="Proveedores.php">Proveedores</a>
				</li>
						
					</ul>
			</ul>
		</div>
 
</table>

</body>
</html>