<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
<td><font face="verdana"><b>Marca</b></font></td>
<td><font face="verdana"><b>Modelo</b></font></td>
<td><font face="verdana"><b>Importe</b></font></td>
<td><font face="verdana"><b>Fecha</b></font></td>
</tr>

<?php  
  $link = @mysql_connect("localhost", "root","password")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("ajpdsoft", $link)
      or die ("Error al conectar a la base de datos.");

  $query = "SELECT f.codigo, c.nombre cliente, f.importetotal, f.fecha " .
      "FROM factura f, tercero c " .
	  "WHERE f.codigocliente = c.codigo";
  $result = mysql_query($query);
  $numero = 0;
  while($row = mysql_fetch_array($result))
  {
    echo "<tr><td width=\"25%\"><font face=\"verdana\">" . 
	    $row["codigo"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["cliente"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["importetotal"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["fecha"]. "</font></td></tr>";    
    $numero++;
  }
  echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Número: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);
  mysql_close($link);
?>
</table>