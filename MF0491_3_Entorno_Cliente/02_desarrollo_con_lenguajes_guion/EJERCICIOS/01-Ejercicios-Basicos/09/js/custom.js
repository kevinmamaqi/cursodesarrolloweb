// Obtener formulas
function fahrenheitACelsius(fahrenheit) {
	alert((fahrenheit - 32) / 1.8);
}

function celsiusAFahrenheit(celsius) {
	alert(celsius * 1.8 + 32);
}

// Obtener valores de la interfaz
// La interfaz tendra un input para celsius y convertir a Fahrenheit
// Otro input para fahrenheit a Celsius.

// Coger celsius y pasarlos a faherenheit
var celsius = document.getElementById("celsius");
var botonCelsius = document.getElementById("botonCelsius");
botonCelsius.addEventListener("click", function () {
	celsiusAFahrenheit(celsius.value);
});

// Coger faherenheit y pasarlos a celsius
var faherenheit = document.getElementById("fahrenheit");
var botonFahrenheit = document.getElementById("botonFahrenheit");
botonFahrenheit.addEventListener("click", function () {
	fahrenheitACelsius(faherenheit.value);
});
