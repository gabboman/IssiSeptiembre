<?php
require_once("funciones.php");


	$formulario['marca'] = "HTC";
	$formulario['modelo'] = "Galaxy S3";
	$formulario['pantalla']='500x200';
	$formulario['teclado']='QWERTY';
	$formulario['memoriaExterna']='512';
	$formulario['meminterna']='256';
	$formulario['gpu']='adreno 24';
	$formulario['cpu']='500';
	$formulario['calidadcamara']='9';
	$formulario['cantidad']='5';

generaformularioInsertaTerminal('destino.php',$formulario);




?>