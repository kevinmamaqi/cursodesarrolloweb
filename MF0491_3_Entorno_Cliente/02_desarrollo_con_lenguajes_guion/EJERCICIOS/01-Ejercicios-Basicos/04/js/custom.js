//  los tres lados son 5, 6, 7

// 1. Declaro las variables que voy a utilizar.
// Inicialmente declaro los lados

// triangulo 18, 4, 9
function calcularTriangulo(a, b, c) {
	let s = (a + b + c) / 2;
	console.log(s);
	return Math.sqrt(s * (s - a) * (s - b) * (s - c));
}

var area = calcularTriangulo(12, 4, 9);
console.log("area", area);
