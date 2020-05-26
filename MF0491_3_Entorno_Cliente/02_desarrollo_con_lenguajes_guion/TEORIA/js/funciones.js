// FUNCIONES
// Bloques de código "paquetizados" para realizar una tarea especifica.

// 1. Como crear (declarar una función)
// 2. Como invocar esa función.

// 1. Como crear (declarar una función)
function indiceMasaCorporal(peso, altura, edad) {
	return ((peso / altura) * 0.25) / edad;
}

function evaluarPaciente(edad, nombre, peso, altura) {
	let resultado = indiceMasaCorporal(peso, altura, edad);

	if (resultado > 25) {
		return "El paciente " + nombre + " tiene que salir a correr.";
	} else {
		return "El paciente " + nombre + " esta sano.";
	}
}

function suma(x, y) {
	return x + y;
}

console.log("resultado", evaluarPaciente(50, "Kevin", 99, 182));

function miFuncion(parametro1, parametro2) {
	return parametro1 + parametro2;
}
