// Controlar dirección de envio
var enviarOtroSitio = document.getElementById("enviar-otro-sitio");
var otraDireccionFormulario = document.getElementById("otra-direccion");

enviarOtroSitio.addEventListener("change", function () {
	if (this.checked) {
		otraDireccionFormulario.style.display = "block";
	} else {
		otraDireccionFormulario.style.display = "none";
	}
});

// Controlar método de pago
var selectorMetodoPago = document.getElementsByName("metodo-de-pago");
var formularioTarjeta = document.getElementById("datos-tarjeta");
var formularioTransferencia = document.getElementById("datos-transferencia");
var botonContinuarCompra = document.getElementById("continuar-compra");

for (let i = 0; i < selectorMetodoPago.length; i++) {
	selectorMetodoPago[i].addEventListener("change", function () {
		if (this.checked) {
			console.log(this.value);
			if (this.value === "tarjeta") {
				formularioTarjeta.style.display = "block";
				formularioTransferencia.style.display = "none";
				botonContinuarCompra.innerText = "Continuar con la compra";
			} else if (this.value === "transferencia") {
				formularioTarjeta.style.display = "none";
				formularioTransferencia.style.display = "block";
				botonContinuarCompra.innerText = "Continuar con la compra";
			} else {
				formularioTarjeta.style.display = "none";
				formularioTransferencia.style.display = "none";
				botonContinuarCompra.innerText =
					"Continuar con la compra con Paypal";
			}
		}
	});
}

// Precio total inicial
var precioTotalAMostrar = document.querySelector("#total > .precio");
var precios = document.querySelectorAll(".caja-producto > .precio");
var precioTotal = 0;
for (let i = 0; i < precios.length; i++) {
	precioTotal += parseInt(precios[i].innerText);
}
precioTotalAMostrar.innerText = precioTotal + "€";

// Gestión de descuentos
var descuentosValidos = ["DES10", "DES20", "DES30"];
var inputDescuentos = document.querySelector("#formulario-descuentos > input");
var formularioDescuento = document.getElementById("formulario-descuentos");

formularioDescuento.addEventListener("submit", function (e) {
	e.preventDefault();
	var valorInput = inputDescuentos.value;

	if (descuentosValidos.includes(valorInput)) {
		if (valorInput === "DES10") {
		}
	} else {
		alert("tu descuento no es valido");
	}
});
