// Que son los bucles
// Los bucles permiten ejecutar un bloque de código
// (el bloque puede ser funciones, condicionales, asignaciones...)
// varias veces.

// Las veces que se ejecuta el bucle
// viene determinado por la condición que imponemos.
// RESPONSABILIDAD: No podemos utilizar condiciones
// que permitan que se ejecute infinitamente.

// Que significa ++
// Incrementa en una unidad por cada ciclo.

// for (condicionInicial = 0; condicionInicial < 5; condicionInicial++) {
// console.log("Hola " + condicionInicial + " veces.");
// }

var listaDeClase = [
	"Raul",
	"Cristina",
	["Kevin", "Maria"],
	["Marcos", "Pedro"],
];

// Length nos devuelve el número de elementos del ARRAY.
// for (i = 0; i < listaDeClase.length; i++) {
// 	var nombre = listaDeClase[i];

// 	if (typeof listaDeClase[i] === "object") {
// 		var subLista = listaDeClase[i];

// 		for (a = 0; a < subLista.length; a++) {
// 			nombre = subLista[a];
// 			console.log(nombre);
// 		}
// 	} else {
// 		console.log(nombre);
// 	}
// }

// BUCLE WHILE (MIENTRAS)
var i = 0;
while (i < 10) {
	console.log("Hola " + i + " veces");
	i++;
}

// DO WHILE (HAZ MIENTRAS)
var x = 0;
do {
	console.log("Hola " + x + " veces");
	x++;
} while (x < 10);

var x = 0;
console.log("Hola " + x + " veces");
x++;
while (x < 10) {
	console.log("Hola " + x + " veces");
	x++;
}
