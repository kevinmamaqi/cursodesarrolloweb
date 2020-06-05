var y = [
	[13, 13, { nombre: "shallowCopy", definition: "¿Qué es eso?" }],
	[15, 15, { nombre: "shallowCopy", definition: "¿Qué es eso?" }],
	[19, 19, { nombre: "shallowCopy", definition: "¿Qué es eso?" }],
];

// Shallow copy -> Copia superficial, guarda referencias.
var x = y;

// Tenemos que hacer un DEEP COPY. Copia profunda, que no guarde referencias.
var z = JSON.parse(JSON.stringify(y));
// x[0][2].nombre = "Pedro";
z[0][2].nombre = "Pedro";

console.log("x", x);
console.log("y", y);
console.log("z", z);
