function validar() {


	
	var nombre = document.getElementById("nombre");
	var apellidos = document.getElementById("apellidos");
	var cif= document.getElementById("cif");
	var dni=document.getElementById("dni");
	
	

	if((nombre.value == "") || (apellidos.value == "")||(cif.value == "")||(dni.value == "")) {
		errores += "No puede haber campos nulos\n";
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