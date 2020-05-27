var botonImprimir = document.getElementById("imprimir");

function imprimir() {
	console.log("He pinchado en IMPRIMIR");
	window.print();
}

botonImprimir.addEventListener("click", imprimir);
