function validar() {

	var errores = "";

	var modelo = document.getElementById("modelo");
	var marca = document.getElementById("marca");
	
	

	if((modelo.value == "") || (marca.value == "")) {
		errores += "El 'modelo y la marca' no pueden ser nulos.\n";
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