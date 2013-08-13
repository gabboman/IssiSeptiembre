<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
<td><font face="verdana"><b>Marca</b></font></td>
<td><font face="verdana"><b>Modelo</b></font></td>
<td><font face="verdana"><b>Pantalla</b></font></td>
<td><font face="verdana"><b>GPU</b></font></td>
</tr>

<?php  
  $con = mysql_connect("oci:dbname=localhost/XE","server","password");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	$sql = "SELECT * FROM TERMINAL";
	mysql_query($sql,$con);

  $result = mysql_query($sql);
  $numero = 0;
  while($row = mysql_fetch_array($result))
  {
    echo "<tr><td width=\"25%\"><font face=\"verdana\">" . 
	    $row["marca"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["modelo"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["pantalla"] . "</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">" . 
	    $row["gpu"]. "</font></td></tr>";    
    $numero++;
  }
  echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Número: " . $numero . 
      "</b></font></td></tr>";
  
  //mysql_free_result($result);
  mysql_close($con);
  
?>
</table>