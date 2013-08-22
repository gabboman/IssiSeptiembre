<?php
require_once ("funciones.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>MobileNation</title>
		<link rel="shortcut icon" href="IMG/MobileNation.jpg">
		<link rel="stylesheet" type="text/css"  href="css/estilo_proveedores.css">
	</head>
	<body >
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
		</div>
		<div id="div_proveedor">
		<?php
			$con=conectarBD();
			$stmt=consultabd("SELECT * FROM PROVEEDORES",$con);
			foreach ($stmt as $fila) {
			echo "<h4>Proveedor
			<br>";
			mostrarproveedor($fila);
			
			echo "</h4>";
			}
		?>
		</div>
		
			
	</body>