function validar() {


	
	var modelo = document.getElementById("modelo");
	var marca = document.getElementById("marca");
	var pantalla= document.getElementById("pantalla");
	var teclado=document.getElementById("teclado");
	var memoriaExterna=document.getElementById("memoriaExterna");
	var memoriaInterna=document.getElementById("memoriaInterna");
	var gpu=document.getElementById("gpu");
	var cpu=document.getElementById("cpu");
	var calidadCamara=document.getElementById("calidadCamara");
	var cantidad=document.getElementById("cantidad");
	

	if((modelo.value == "") || (marca.value == "")||(pantalla.value == "")||(teclado.value == "")||(memoriaExterna.value == "")||(memoriaInterna.value == "")||(gpu.value == "")||(gpu.value == "")||(cpu.value == "")||(calidadCamara.value == "")||(cantidad.value == "")||) {
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