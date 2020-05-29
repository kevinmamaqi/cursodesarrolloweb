// Que día es hoy.
var hoy = new Date();
var referencia = new Date(1965, 0, 1);

console.log("resta", (hoy - referencia) / (1000 * 3600 * 24 * 365));
