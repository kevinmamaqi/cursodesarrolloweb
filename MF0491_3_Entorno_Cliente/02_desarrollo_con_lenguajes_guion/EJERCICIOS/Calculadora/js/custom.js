// Que necesito para que la calculadora sea funcional.

var botones;
var operaciones;
var ejecutarOperaciones;
var resultado;

var botonResultado = document.getElementById("resultado");
botonResultado.addEventListener("click", function () {
	console.log("Hola he pinchado en el botón resultado.");
});

var botonesNumeros = document.getElementsByClassName("numeros");

for (let i = 0; i < botonesNumeros.length; i++) {
	const boton = botonesNumeros[i];
	const valor = boton.innerHTML;
	boton.addEventListener("click", function () {
		console.log("Hola he pinchado un numero " + valor);
	});
}

// botonesNumeros.addEventListener("click", function () {
// 	console.log("Hola he pinchado un numero");
// });
console.log(botonesNumeros);

function suma(x, y) {
	return x + y;
}

function resta(x, y) {
	return x - y;
}

function multiplicacion(x, y) {
	return x * y;
}

function division(x, y) {
	return x / y;
}
