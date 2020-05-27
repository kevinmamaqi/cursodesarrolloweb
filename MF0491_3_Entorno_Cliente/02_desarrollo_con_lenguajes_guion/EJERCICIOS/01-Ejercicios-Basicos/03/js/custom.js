var fecha = new Date();

function corregirMes(mes) {
	let mesCorregido = mes + 1;
	if (mesCorregido < 10) {
		return "0" + mesCorregido;
	} else {
		return mesCorregido;
	}
}

function corregirDia(dia) {
	if (dia < 10) {
		return "0" + dia;
	} else {
		return dia;
	}
}

// Mis fechas corregidas

// 1. Cojo con javascript Date.getFullYear el año actual.
var fecha = new Date();
var anio = fecha.getFullYear();

// 2. Cojo todos los años (todos los elementos) que tienen la clase anio en el HTML
var anios = document.getElementsByClassName("anio");

// 1. Cojo con javascript date.getMonth() el mes actual.
var mes = corregirMes(fecha.getMonth());

// 2. Cojo con javascript todos los elementos mes de la pantalla.
var meses = document.getElementsByClassName("mes");

function sustituirFechas(LISTA, VALOR) {
	for (let i = 0; i < LISTA.length; i++) {
		LISTA[i].innerHTML = VALOR;
	}
}

// Sustituir fechas años
sustituirFechas(anios, anio);

// Sustituir fechas mes
sustituirFechas(meses, mes);
