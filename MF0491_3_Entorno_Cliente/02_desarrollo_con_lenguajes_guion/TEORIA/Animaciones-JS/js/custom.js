// var box = document.getElementById("box");
// setTimeout(() => {
// 	box.classList.add("move");
// }, 1500);

// box.addEventListener("transitionend", onTransitionEnd, false);

// function onTransitionEnd() {
// 	// console.log("HOLAAAA");
// 	if (box.classList.contains("move")) {
// 		box.classList.remove("move");
// 		console.log("Espera que voy");
// 	} else {
// 		box.classList.add("move");
// 		console.log("Ahora vuelvo");
// 	}
// }

var box = document.getElementById("box");

var anchuraPantalla = window.innerWidth / 2;
var anchuraCaja = box.getBoundingClientRect().width / 2;

var explicacion = box.getBoundingClientRect();
console.log(explicacion);

function posicion(inicioX, inicioY) {
	return "translate(" + inicioX + "px, " + inicioY + "px)";
}

var player = box.animate(
	[
		{ transform: posicion(0, 0) },
		{ transform: posicion(anchuraPantalla - anchuraCaja, 100) },
	],
	{
		duration: 1000,
		iterations: 5,
		delay: 1000,
		easing: "ease-in-out",
	}
);

player.addEventListener("finish", function () {
	box.style.transform = posicion(anchuraPantalla - anchuraCaja, 100);
});
