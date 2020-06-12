var formulario = $("#formulario");
var cajaResultado = $("#caja-resultado");

formulario.on("submit", function (e) {
	e.preventDefault();
	var datosFormulario = $(this).serializeArray();

	var nombrePaciente = devolverValor(datosFormulario, "nombre");
	var apellidosPaciente = devolverValor(datosFormulario, "apellidos");
	var alturaPaciente = parseInt(devolverValor(datosFormulario, "altura"));
	var pesoPaciente = parseInt(devolverValor(datosFormulario, "peso"));

	var IMC = calcularIMC(pesoPaciente, alturaPaciente);
	var color = "";
	var comienzoMensaje = "";
	var finalMensaje = "";

	if (IMC < 20) {
		color = "red";
		comienzoMensaje = "Peligro, ";
		finalMensaje = " tu indice de masa corporal es menor que el 20%.";
	} else if (IMC >= 20 && IMC < 25) {
		color = "green";
		comienzoMensaje = "Enhorabuena, ";
		finalMensaje =
			" tu indice de masa corporal esta entre el 20% y el 25%.";
	} else if (IMC >= 25 && IMC < 30) {
		color = "yellow";
		comienzoMensaje = "Cuidado, ";
		finalMensaje =
			" tu indice de masa corporal esta entre el 25% y el 30%.";
	} else {
		color = "red";
		comienzoMensaje = "Peligro, ";
		finalMensaje = " tu indice de masa corporal es mayor que el 30%.";
	}

	cajaResultado.html(
		comienzoMensaje +
			nombrePaciente +
			" " +
			apellidosPaciente +
			finalMensaje
	);
	cajaResultado.css("backgroundColor", color);
	// limpiarFormulario();
});

function calcularIMC(peso, altura) {
	return peso / Math.pow(altura / 100, 2);
}

function devolverValor(datos, key) {
	for (let i = 0; i < datos.length; i++) {
		if (datos[i].name === key) {
			limpiarValor(key);
			comprobarValorVacio(datos[i].value, key);
			mmiFuncionalidad();
			return datos[i].value;
		}
	}
}

function limpiarValor(key) {
	$(`input[name="${key}"`).val("");
}

function comprobarValorVacio(value, key) {
	if (value === "") {
		$(`input[name="${key}"`).css("borderColor", "red");
	}
}
