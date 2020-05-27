var fecha = new Date();
console.log(fecha);
console.log(typeof fecha);
var diaSemana = document.getElementById("diasemana");
var horaAmostrar = document.getElementById("horaactual");

// funcion añadir ceros si faltan
function numeroACorregir(numero) {
	if (numero < 10) {
		return "0" + numero;
	} else {
		return numero;
	}
}

// Horas
var horas = fecha.getHours();
horas = numeroACorregir(horas);

// Minutos
var minutos = fecha.getMinutes();
minutos = numeroACorregir(minutos);

// Segundos
var segundos = fecha.getSeconds();
segundos = numeroACorregir(segundos);

var horaActual = horas + ":" + minutos + ":" + segundos;
horaAmostrar.innerHTML = horaActual;
console.log("hora actual", horaActual);

switch (fecha.getDay()) {
	case 1:
		diaSemana.innerHTML = "Lunes";
		break;

	case 2:
		break;

	case 3:
		diaSemana.innerHTML = "Miércoles";
		break;

	case 4:
		break;

	case 5:
		break;

	default:
		break;
}
