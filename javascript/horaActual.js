var objFecha = new Date();
var minutos = objFecha.getMinutes();
if(minutos < 10) {
	minutos = "0" + minutos.toString();
}
var hora = objFecha.getHours();
if(hora < 10) {
	hora = "0" + hora.toString();
}
var salida = hora + ":" + minutos;
document.writeln("<br/><br/>Hora actual: " + salida);
