var nombre = document.getElementById("nombre");
var apellidos = document.getElementById("apellidos");
var altura = document.getElementById("altura");
var peso = document.getElementById("peso");
var formulario = document.getElementById("formulario");
var cajaResultado = document.getElementById("caja-resultado");

formulario.addEventListener("submit", function (e) {
	e.preventDefault();

	nombrePaciente = nombre.value;
	apellidosPaciente = apellidos.value;
	alturaPaciente = parseInt(altura.value);
	pesoPaciente = parseInt(peso.value);

	var IMC = calcularIMC(pesoPaciente, alturaPaciente);
	var color = "";
	var colorTexto = "";
	var comienzoMensaje = "";
	var finalMensaje = "";

	if (IMC < 20) {
		color = "#f9f9f9";
		comienzoMensaje = "Peligro, ";
		finalMensaje = " tu indice de masa corporal es menor que el 20%.";
	} else if (IMC >= 20 && IMC < 25) {
		color = "#f9f9f9";
		comienzoMensaje = "Enhorabuena, ";
		finalMensaje =
			" tu indice de masa corporal esta entre el 20% y el 25%.";
	} else if (IMC >= 25 && IMC < 30) {
		color = "#f9f9f9";
		comienzoMensaje = "Cuidado, ";
		finalMensaje =
			" tu indice de masa corporal esta entre el 25% y el 30%.";
	} else {
		color = "#f9f9f9";
		comienzoMensaje = "Peligro, ";
		finalMensaje = " tu indice de masa corporal es mayor que el 30%.";
	}

	cajaResultado.innerHTML =
		comienzoMensaje +
		nombrePaciente +
		" " +
		apellidosPaciente +
		finalMensaje;
	cajaResultado.style.backgroundColor = color;

	limpiarFormulario();
});

function calcularIMC(peso, altura) {
	return peso / Math.pow(altura / 100, 2);
}

function limpiarFormulario() {
	nombre.value = "";
	apellidos.value = "";
	altura.value = "";
	peso.value = "";
}
