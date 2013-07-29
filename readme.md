CAMBIOS OBLIGATORIOS
	1º Formulario Inserta Terminal, ahora es posible insertar datos en la tabla terminales. Se puede con javascript y html5. lo estoy intentando con html5//falta un poco de validacion HECHO!!
	2º Formulario para poder modificar datos de la tabla X
	3º Formulario para poder borrar datos de la BD
	4º Obteenr datos de base datos como tabla en hache te eme ele
	5º Que los insert sean compatibles con los triggers que tenemos!
	--DETALLES: PATRONES CON PHP, MYSQL Y JAVASCRIPT (y hasta html5 si me apuras!). Tirar de expresiones regulares
	
OPCIONAL PARA SUBIR NOTA
	1º Página de descripción 
	2º Javascript avanzado (Que?)
	3º Expresiones regulares en PHP (formulario insertaterminal, ahi hay una para la resolución de pantalla)
	4º Facilidad de navegación (no hagamos una pagina por la que perderse sea lo común, enseñarsela a un familiar o amigo para que pruebe)
	5º Usabilidad
	6º Modularidad de código tanto de cliente como de servidor (hm... puede ser chungo pero se supone que deberia haber sido asi siempre)
	7º Uso de Session con PHP (HECHO)
	8º Legibilidad de código (JAJAJAJAJAJA)
	9º Validación por el W3C (esto... aqui dice que pa subir nota no? XD)
	10º Se te ocurre algo chachi?
	
	
	
	
Changelog:
	En el css de formularioTerminal
		Modificado para poder ser utilizado con ambos formularios relacionados con terminales (podría usarse incluso para el edit)
	En el TratamientoInsertTerminal.php:
		Modificado el verificar qeu todos los campos están rellenos: ahora es un for extendido en lugar de ir probando los atributos uno a uno. SE DEBERIA APLICAR A TODOS!
	18/7/13
	Resolución de pantalla ahora es string tipo numeroxnumero usando html5 en formulario inserta terminal
	ARCHIVO SQL EN DIRECTORIO DE TRABAJO: MODIFICACIONES EN EL ARCHIVO: ahora tenemos preparada una secuencia para los insert de terminales. Porque no hacer una secuencia común para todos?
	22/7/13
		Uso de expresiones regulares en php, FUNCIONANDO!
		Preparación de modificar terminal. Será un formulario en el que buscas un terminal, luego en la lista hay que editarla para añadir enlace a edición. luego una pagina de edicion.
			Creado formularioModificaTerminal1: buscar un terminal //usar la misma funcion que el de validación de busqueda!
			luego mas!
	24/7
		Cambios de código para que sea algo mas reutilizable: sacar funciones a otro archivo php
Trabajando en:
	Poner bonita la página del insert, revisiones
	
	REORGANIZACIÓN MASIVA PARA REUTILIZACIÓN DE CÓDIGO MASIVAMENTE MASIVA!
	29/7/13: AHORA PREPARANDO PARA FORMULARIOS Y TODO!