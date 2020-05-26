// Que son los operadores lógicos (o de comparación)

var x = 3;
var y = 3;

if (x == y) {
	console.log("Somos iguales");
}

// LISTA DE COMPARADORES
// ==   (iguadad suave). El programa hace un comparación sin typeof por ti.
// ===  (igualdad estricta). El programa comprueba el typeof (o no lo hace).
// !=   (desigualdad suave).
// !==  (desigualdad estricta).
// >    (mayor qué).
// >=   (igual o mayor qué).
// <    (menor qué).
// <=   (igual o menor qué).

var z = 5;
if (z == "5") {
	console.log("Igualdad suave");
}

if (z === "5") {
	console.log("Igualdad estricta");
}

// LISTA DE OPERADORES LÓGICOS
// &&   (operador lógico Y). Si x=3 Y y=3.
// ||   (operador lógico O). Si x=3 O y=3.
// !    (operador lógico NO (negación)). Si !x.

x = 3;
y = 3;

if (x === 3 && y === 4) {
	console.log("Son iguales!");
}

if (x === 3 || y === 4) {
	console.log("Son iguales?");
}
