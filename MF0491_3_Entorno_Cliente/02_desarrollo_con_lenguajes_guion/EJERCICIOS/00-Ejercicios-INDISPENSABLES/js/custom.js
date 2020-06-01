// Ejercicio 1
// Crea una variable y asignale tu nombre.
// Muestra la variable en la consola.
var nombre = "Kevin";
console.log("Ejercicio 1: ", nombre);

// Ejercicio 2
// Identifica cual es el error de la siguiente expresión y corrigelo.
var precioProducto = 3.45;
console.log("Ejercicio 2: ", precioProducto);

// Ejercicio 3
// Asigna el resultado de una suma, una resta, una multiplicación y una división
// a distintas variables y muestralas en la consola.
var suma = 3 + 2;
var resta = 3 - 2;
var mult = 3 * 2;
var div = 6 / 2;
console.log("Ejercicio 3 suma: ", suma);
console.log("Ejercicio 3 resta: ", resta);
console.log("Ejercicio 3 mult: ", mult);
console.log("Ejercicio 3 div: ", div);

// Ejercicio 4
// ¿Qué resultado sera nuevoNumero en la siguiente expresión?
// Razona y escribe porque sucede.
var numero = 4;
var nuevoNumero = numero++;
console.log("Ejercicio 4 nuevoNumero: ", nuevoNumero);
console.log("Ejercicio 4 numero: ", numero);

// Ejercicio 5
// Crea una variable y asigna en una sola linea el resultado de primero sumar
// 4 y 3, 5 y 8 y después multiplicarlos.
var sumaMult = (4 + 3) * (5 + 8);
console.log("Ejercicio 5: ", sumaMult);

// Ejercicio 6
// Crea un botón que al pinchar escriba en la consola "Hola mundo"
var botonHolaMundo = document.getElementById("holaMundo");
botonHolaMundo.addEventListener("click", function () {
	console.log("Ejercicio 6: Hola mundo!");
});

// Ejercicio 7
// Crea un botón que al pinchar muestre un dialogo "Hola mundo"
var botonHolaMundoDialogo = document.getElementById("holaMundoDialogo");
botonHolaMundoDialogo.addEventListener("click", function () {
	alert("Ejercicio 7: Hola mundo!");
});

// Ejercicio 8
// Escribe un condicional para comprobar si la edad de los usuarios es mayor de 18 años.
// Muestra el resultado en la consola.
var edadUsuario = 18;
if (edadUsuario >= 18) {
	console.log("Ejercicio 8: Eres mayor de edad.");
} else {
	console.log("Ejercicio 8: Eres menor de edad.");
}

// Ejercicio 9
// Escribe una lista de operadores comparitivos y su significado en la consola, de manera ordenada.

// Ejercicio 10
// Escribe el operador que significa Y, y muestralo en la consola.
console.log("Ejercicio 10: &&.");

// Ejercicio 11
// Escribe un condicional que compruebe si la edad de los ususarios es Mayor de 18 y menor de 67.
var edadUsuario2 = 18;
if (edadUsuario2 >= 18 && edadUsuario2 < 67) {
	console.log(
		"Ejercicio 11: Eres mayor de edad y estas en edad de trabajar."
	);
} else {
	console.log("Ejercicio 11: Eres menor de edad.");
}

// Ejercicio 12
// Escribe cada palabra de tu nombre y apellidos en un Array.
var arrayNombreApellidos = ["Kevin", "Mamaqi", "Kapllani"];

// Ejercicio 13
// Escribe cada palabra de tu nombre y apellidos en un Objeto.
var objetoNombreApellidos = {
	nombre: "Kevin",
	primerApellido: "Mamaqi",
	segundoApellido: "Kapllani",
};

// Ejericio 14
// Transforma el array en una frase que muestre tu nombre y apellidos.
var nombreApellidosDeArray = "";
console.log("Ejercicio 14: ", arrayNombreApellidos.join(" "));

// Ejercicio 15
// Transforma el objeto en una frase que muestre tu nombre y apellidos.
var nombreApellidosDeObjeto =
	objetoNombreApellidos.nombre +
	" " +
	objetoNombreApellidos.primerApellido +
	" " +
	objetoNombreApellidos.segundoApellido;
console.log("Ejercicio 15, método 1: ", nombreApellidosDeObjeto); // El más correcto.
console.log(
	"Ejercicio 15, método 2: ",
	Object.values(objetoNombreApellidos).join(" ")
);

// Método 3
for (const key in objetoNombreApellidos) {
	if (objetoNombreApellidos.hasOwnProperty(key)) {
		const element = key + ": " + objetoNombreApellidos[key];
		console.log(element);
	}
}

// Ejericicio 16
// Elimina el nombre del array.
var nuevoArrSinNombre = ["Kevin", "Mamaqi", "Kapllani"];

// Método 1 (SHIFT)
// nuevoArrSinNombre.shift();
// console.log("Ejercicio 16 método 1: ", nuevoArrSinNombre);

// Método 2 (SPLICE)
nuevoArrSinNombre.splice(0, 1);
console.log("Ejercicio 16 método 2: ", nuevoArrSinNombre);

// Ejercicio 17
// Elimina el segundo apellido del array
var nuevoArrSinApellido2 = ["Kevin", "Mamaqi", "Kapllani"];

// Método 1 (POP)
// nuevoArrSinApellido2.pop();
// console.log("Ejercicio 17 método 1: ", nuevoArrSinApellido2);

// Método 2 (SPLICE)
nuevoArrSinApellido2.splice(2, 1);
console.log("Ejercicio 17 método 2: ", nuevoArrSinApellido2);

// Ejercicio 18
// Escribe los caracteres que faltan de la siguiente expresión
for (var i = 0; i <= 4; i++) {
	console.log("Ejercicio 18: " + i);
}

// Ejercicio 19
// Transforma la siguiente frase a minusculas con JS.
var frase = "Hola Me LLAMO Kevin";
console.log("Ejercicio 19: ", frase.toLowerCase());

// Ejercicio 20
// Extrae la palabra Hola de la frase "Hola mundo"
var holaMundoFrase = "Hola mundo";
console.log("Ejercicio 20, método 1: ", holaMundoFrase.substring(0, 4));
console.log("Ejercicio 20, método 2: ", holaMundoFrase.slice(0, 4));

// Ejercicio 21
// Encuentra la posición de la letra m en la frase "Hola mundo"
var encuentraLetraM = "Hola mundo";
console.log("Ejercicio 21: ", encuentraLetraM.indexOf("m"));

// Ejercicio 22
// Devuelve la letra u de la frase "Hola mundo";
// Asignalo a una variable y muestarlo en la consola.
var encuentraLetraU = "Hola mundo";
var indiceLetraU = encuentraLetraU.indexOf("u");
console.log("indiceLetraU", indiceLetraU);
console.log("encuentraLetraU", encuentraLetraU);
console.log(
	"Ejercicio 22: ",
	encuentraLetraU.slice(indiceLetraU, indiceLetraU + 1)
);

// Ejercicio 23
// Cambia la palabra mundo por clase en la frase "Hola mundo"
var cambiaPalabraMundo = "Hola mundo";
// Metodo 1. Replace
console.log(
	"Ejercicio 23, método 1: ",
	cambiaPalabraMundo.replace("mundo", "clase")
);

// Ejercicio 24
// Busca el número entero más cercano a 4.83723
console.log("Ejercicio 24: ", Math.round(4.83723));

// Ejercicio 25
// Crea un numero aleatorio
console.log("Ejercicio 25: ", Math.random());

// Ejercicio 26
// Convierte el número 13.4 a 13
console.log("Ejercicio 26, método 1: ", Math.round(13.4));
console.log("Ejercicio 26, método 2: ", Math.trunc(13.4));

// Ejercicio 27
// Convierte con la misma función la frase "33" y "33.3" a su correspondiente número entero y fraccioal.
console.log(
	"Ejercicio 27: ",
	"Numbero enter: " + Number(33) + ", número fraccional: " + Number(33.3)
);

// Ejercicio 28
// Que día de la semana era el 20 de Abril de 1982
var fecha = new Date(1982, 3, 20);
var dia = fecha.getDay();
console.log("Ejercicio 28: ", fecha.getDay());

// Ejercicio 29
// Declara una función con los parametros a, b y c.
function miFuncion(a, b, c) {}

// Ejercicio 30
// Declara una función con el parametro mensaje
// haz que la funciona devuelva la frase "Hola mundo"
function devolverHolaMundo(mensaje) {
	return mensaje;
}
console.log("Ejercicio 30: ", devolverHolaMundo("Hola mundo"));

// Ejercicio 31
// Escribe un condicional que devuelva verdadero si el usuario se llama
// Kevin, Jorge, Maria, Pedro, Lucas, Javier
// Falso si se llama: Joel, Marcos, Ana Maria, Jose Maria, Arturo
var listaVerdaderos = ["Kevin", "Jorge", "Maria", "Pedro", "Lucas", "Javier"];
var listaFalsos = [
	"Joel",
	"Marcos",
	"Ana Maria",
	"Jose Maria",
	"Arturo",
	"Matusalen",
];

var resultadosVarios = "";
function comprobarNombres(nombre) {
	// Tengo que ver si es verdadero
	if (listaVerdaderos.includes(nombre)) {
		resultadosVarios = "El nombre esta en la lista de verdaderos.";
	}

	// Tengo que ver si es falso
	if (listaFalsos.includes(nombre)) {
		resultadosVarios = "El nombre esta en la lista de falsos.";
	}

	if (!listaFalsos.includes(nombre) && !listaVerdaderos.includes(nombre)) {
		resultadosVarios = "No esta en ninguna lista.";
	}
}
comprobarNombres("Kevin");
console.log("Ejercicio 31: ", resultadosVarios);

// Ejercicio 32
// Escribe un while do, que cuente de 10 a 0 y diga el resultado en cada iteración.
var numeroContador = 10;

while (numeroContador > -1) {
	console.log("Ejercicio 32: ", numeroContador);
	numeroContador = numeroContador - 1;
}

// Ejercicio 33
// Escribe una función Javascript en el HTML de un botón que diga "hola mundo" al pinchar sobre el mismo.

// Ejercicio 34
// Crea una caja de 200px por 200px en HTML
// Identifica con JS cuando el usuario pasa el ratón por encima muestre el
// mensaje ESTOY ENCIMA en la consola.
var cajaEncima = document.getElementById("caja-encima");
cajaEncima.addEventListener("mouseover", function () {
	console.log("Ejercicio 34: ESTOY ENCIMA");
});

// Ejercicio 35
// Crea un input email y detecta cuando el usuario pincha
// dentro del input con Javascript.

// Ejericicio 36
// Crea un formulario de contacto en HTML con nombre, email y mensaje.
// Cuando el usuario envia el mensaje:
//  1. Paraliza el envio.
//  2. Muestra un mensaje de: El usuario ha enviado el mensaje.

// Ejericico 37
// Busca dos imágenes de un perro.
// Guardalas en la carpeta /img/
// Introduce una en el HTML y crea un botón.
// Haz que al pinchar sobre el botón se cambie una imagen por la otra.
var botonCambiarImagen = document.getElementById("cambiar-imagen");
// console.log(botonCambiarImagen);
var imagenACambiar = document.getElementById("imagen-a-cambiar");
imagenACambiar.alt = "PERRRRROOOOOOOO";
console.log(imagenACambiar.alt);
console.log(imagenACambiar.src);

botonCambiarImagen.addEventListener("click", function () {
	if (imagenACambiar.alt === "Perro 1") {
		imagenACambiar.src =
			"http://127.0.0.1:5500/MF0491_3_Entorno_Cliente/02_desarrollo_con_lenguajes_guion/EJERCICIOS/00-Ejercicios-INDISPENSABLES/img/2.jpg";

		imagenACambiar.alt = "Perro 2";
	} else {
		imagenACambiar.src =
			"http://127.0.0.1:5500/MF0491_3_Entorno_Cliente/02_desarrollo_con_lenguajes_guion/EJERCICIOS/00-Ejercicios-INDISPENSABLES/img/1.jpg";

		imagenACambiar.alt = "Perro 1";
	}
});

// Ejericicio 38
// Crea un parrafo con la clase: "parrafo-negro"
// Crea un botón que al pinchar sobre el mismo se cambie la clase del parrafo a: "parrafo-rojo"

// Ejercicio 39
// Crea un objeto con dos propiedades: nombre y apellidos.
// Muestra en la consola la llave (key) apellidos.

// Ejercicio 40
// Crea una frase que contenga de 0 a 999 números, separados por comas.
// Imprimelo en la consola.
