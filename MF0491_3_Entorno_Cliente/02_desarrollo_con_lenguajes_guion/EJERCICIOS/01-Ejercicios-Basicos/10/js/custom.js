// 1. Obtener ultima letra de una frase.
// 2. Introducir ultima letra al comienzo.
// 3. Actualizar la frase.
// 4. Mostrar la frase.
// 5. Iterar. Controlando el tiempo.

function moverLetra(referencia) {
	// Texto de la frase
	var fraseCambiante = referencia.innerText;

	// Obtengo la ultima letra
	var ultimaLetra = fraseCambiante.slice(-1);

	// Obtengo la longitud de la frase
	var longitud = fraseCambiante.length;

	// Obtengo la frase sin la última letra
	var fraseRestante = fraseCambiante.substring(0, longitud - 1);

	// Creo una nueva frase
	var nuevaFrase = ultimaLetra + fraseRestante;

	// Introduzco la nueva frase;
	referencia.innerText = nuevaFrase;
}

var referenciaFraseCambiante = document.getElementById("frase-cambiante");

setInterval(function () {
	moverLetra(referenciaFraseCambiante);
}, 500);
