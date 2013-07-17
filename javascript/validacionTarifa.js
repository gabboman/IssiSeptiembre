function validar() {

	var errores = "";

	var operador = document.getElementById("operador");
	
	

	if (operador.value == "") {
		errores += "El operador no puede ser nulo.";
	}
		

	// Comprobamos si ha habido errores

	if(errores != "") {
		window.alert(errores);
		return false;
	} else {
		window.alert("Perfecto!!");
		return true;
	}
}