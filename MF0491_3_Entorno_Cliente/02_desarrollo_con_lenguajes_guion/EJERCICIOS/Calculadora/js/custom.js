// Que necesito para que la calculadora sea funcional.
var x = "";
var y = "";
var operacion;
var display = document.getElementById("display");

// Boton de resultado
var botonResultado = document.getElementById("resultado");
botonResultado.addEventListener("click", function () {
	if (x !== "" && y !== "" && operacion !== undefined) {
		numeroX = parseInt(x);
		numeroY = parseInt(y);

		switch (operacion) {
			case "+":
				display.innerHTML = suma(numeroX, numeroY);
				devolverValorSuma(suma(numeroX, numeroY));
				break;
			case "-":
				display.innerHTML = resta(numeroX, numeroY);
				break;
			case "/":
				display.innerHTML = division(numeroX, numeroY);
				break;
			case "x":
				display.innerHTML = multiplicacion(numeroX, numeroY);
				break;
			default:
				break;
		}
		limpiarMemoria();
	}
});

// Limpiar después de mostrar resultados.
function limpiarMemoria() {
	x = "";
	y = "";
	operacion = undefined;
}

// Botones de números
var botonesNumeros = document.getElementsByClassName("numeros");
for (let i = 0; i < botonesNumeros.length; i++) {
	const boton = botonesNumeros[i];
	const valor = boton.innerHTML;
	boton.addEventListener("click", function () {
		if (operacion === undefined) {
			x = x + valor; // Pero se puede usar x += valor (shorthand).
			console.log("x", x);
		} else {
			y = y + valor;
			console.log("y", y);
		}
	});
}

// Botones de operaciones
var botonesOperaciones = document.getElementsByClassName("operaciones");
for (let i = 0; i < botonesOperaciones.length; i++) {
	const boton = botonesOperaciones[i];
	const valor = boton.innerHTML;
	boton.addEventListener("click", function () {
		operacion = valor;
		console.log(operacion);
	});
}

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
