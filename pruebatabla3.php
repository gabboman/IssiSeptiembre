<html>
<body>
<?php

/* Abrimos la base de datos */
	session_start();
	require_once("funciones.php");
/* Realizamos la consulta SQL */
$sql="select * from TERMINAL";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table border=1 cellpadding=4 cellspacing=0>";

/*Primero los encabezados*/
 echo "<tr>
         <th colspan=5> Tabla de Terminales </th>
       <tr>
         <th> Marca </th><th> Modelo </th><th> Pantalla </th>
         <th> GPU </th><th> CPU </th>
      </tr>";

/*Y ahora todos los registros */
while($row=mysql_fetch_array($result))
{
 echo "<tr>
         <td align='right'> $row[id] </td>
         <td> $row[marca] </td>
         <td> $row[modelo] </td>
         <td> $row[pantalla] </td>
         <td> $row[gpu] </td>
		 <td> $row[cpu] </td>
      </tr>";
}
echo "</table>";

?>
</body>
</html>