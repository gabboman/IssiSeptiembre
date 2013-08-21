<?php
require_once ("funciones.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>MobileNation</title>
		<link rel="shortcut icon" href="IMG/MobileNation.jpg">
		<link rel="stylesheet" type="text/css"  href="css/estilo_tarifas.css">
	</head>
	<body >
		
		<?php
			$con=conectarBD();
			$stmt=$con->query("SELECT * FROM TARIFAS");
			foreach ($stmt as $fila) {
			echo "<h4>Tarifa
			<br>";
			echo "PrecioMinuto: ".$fila["PRECIOMINUTO"]."<br>";
			echo "ConsumoMinimo: ".$fila["CONSUMOMINIMO"]."<br>";
			echo "CuotaBase: ".$fila["CUOTABASE"]."<br>";
			echo "NminutosGratuito: ".$fila["NMINUTOSGRATUITO"]."<br>";
			echo "CuotaInternet: ".$fila["CUOTAINTERNET"]."<br>";
			echo "NombreTarifa: ".$fila["NOMBRETARIFA"]."<br>";
			$con2=conectarBD();
			$stmt2=$con2->query("SELECT * FROM OPERADORES WHERE IDOPERADOR LIKE '".$fila["IDOPERADOR"]."'");			
			foreach ($stmt2 as $fila2) {
			echo "Operador: ".$fila2["NOMBRE"];
			}
			echo "</h4>";
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
		
			
	</body>
		