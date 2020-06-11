var miVideo = document.getElementById("mi-video");
var reproducir = document.getElementById("reproducir");
var parar = document.getElementById("parar");

reproducir.addEventListener("click", function () {
	miVideo.play();
});

parar.addEventListener("click", function () {
	miVideo.pause();
});

var miAudio = document.getElementById("mi-audio");
var reproducirAudio = document.getElementById("reproducir-audio");
var pararAudio = document.getElementById("parar-audio");

reproducirAudio.addEventListener("click", function () {
	miAudio.play();
});

pararAudio.addEventListener("click", function () {
	miAudio.pause();
});
