var enviarOtroSitio = document.getElementById("enviar-otro-sitio");
var otraDireccionFormulario = document.getElementById("otra-direccion");

enviarOtroSitio.addEventListener("change", function () {
	if (this.checked) {
		otraDireccionFormulario.style.display = "block";
	} else {
		otraDireccionFormulario.style.display = "none";
	}
});
