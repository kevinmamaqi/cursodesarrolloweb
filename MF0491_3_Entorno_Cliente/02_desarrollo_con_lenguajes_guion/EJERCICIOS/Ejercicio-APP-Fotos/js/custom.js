var IMAGENES = ["1.jpg", "2.jpg", "3.jpg"];
var FRASES = ["Frase 1", "Frase 2", "Frase 3"];
var iAleatoria = numeroAleatorioEntre(1, IMAGENES.length);
var fAleatoria = numeroAleatorioEntre(1, FRASES.length);
var IMAGEN_ALEATORIA = IMAGENES[iAleatoria - 1];
var FRASE_ALEATORIA = FRASES[fAleatoria - 1];

function numeroAleatorioEntre(min, max) {
	return Math.round(Math.random() * (max - min) + min);
}

// IMPLEMENTAR IMAGEN EN EL FONDO
var ESCRITORIO = document.getElementById("escritorio");
ESCRITORIO.style.backgroundImage = "url('./img/" + IMAGEN_ALEATORIA + "')";

// IMPLEMENTAR LA FRASE
var FRASE = document.getElementById("frase");
FRASE.innerText = FRASE_ALEATORIA;
