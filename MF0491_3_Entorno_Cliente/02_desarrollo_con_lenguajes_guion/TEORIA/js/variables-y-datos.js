console.log("Hola mundo.");

// Las variables son contenedores (lugar en la memoria)
// que se utiliza para almacenar datos.
// Declarar variables
var variable;

// Variables númericas
var x = 3;
var y = 5;
var z = x + y;
console.log(z);

// Tipos de números
var decimales = 0.003;
console.log(decimales);

var exponencial = 100e3;
console.log(exponencial);

// Cadenas (frases, caracteres)
var dia = "Buenos días ";
var noche = "Buenas noches ";
// var nombre = "Kevin";
// console.log(dia + nombre); // Concatenación de frases
// console.log(noche + nombre); // Concatenación de frases

// Probar a unir números y frases
console.log(dia + x);

// Sobreescribir variables
console.log(x);
x = 5;
console.log(x);

// Let y Const
// VARIABLE CONSTANTE no puedo reasignarle un valor
const nombre = "Kevin";

// VARIABLE NO-CONSTANTE (LET) puedo reasignar valores.
let apellido = "Mamaqi";
apellido = "Kapllani";
console.log(apellido);

// Array (lista, o matriz)
// El índice de los ARRAYs comienza en 0.
var listaDeClase = [
	["Raul", "Pedro"],
	"Guillermo",
	"Madalina",
	"Laura",
	"Albert",
];
console.log(listaDeClase);

// Objetos
// Los objetos son listas con propiedades
var listaClase = {
	nombre: "Raul",
	apellidos: "Mendoza",
};
console.log(listaClase.nombre);

// Variables undefined
// Son variables que declaramos para poder asignarles un valor más adelante.
var indefinida;

// Variable NULL o NADA
var datosUsuario = null;
