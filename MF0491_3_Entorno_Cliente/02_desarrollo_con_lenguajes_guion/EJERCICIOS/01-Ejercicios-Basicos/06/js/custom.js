//
//
//

// Primer paso: Crear ese año dado
var anioDado = document.getElementById("aniodado");
var boton = document.getElementById("iniciarComprobacion");

boton.addEventListener("click", function () {
	var fecha = new Date(anioDado.value, 1, 29);

	if (fecha.getDate() === 1) {
		console.log("No es bisiesto");
	} else {
		console.log("Año bisiesto");
	}
});

// Segundo paso:
// Los años bisiestos tienen 29 de Febrero.

// Tercer paso
// ¿Como compruebo si mi año dado es un año bisiesto?
// var fecha = new Date(anioDado, 1, 29);

// if (fecha.getDate() === 1) {
// 	console.log("No es bisiesto");
// } else {
// 	console.log("Año bisiesto");
// }
