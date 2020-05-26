// ¿Qué son los condicionales?
// Las declaraciones condicionales y se utilizan
// para ejecutar distintas acciones.

// EL COLEGIO ABRE A LAS 9
// Si son antes de las 9, el colegio esta cerrado.
// Si son después de las 9, el colegio esta abierto.

function comprobarColegioAbierto(consulta) {
	// if (consulta < 9) {
	// 	console.log("El colegio esta cerrado.");
	// } else if (consulta > 17) {
	// 	console.log("El colegio esta cerrado.");
	// } else {
	// 	console.log("El colegio esta abierto.");
	// }

	switch (consulta) {
		case "Sabado":
			console.log("El colegio esta cerrado.");
			break;

		case "Domingo":
			console.log("El colegio esta cerrado.");
			break;
	}
}

console.log(comprobarColegioAbierto("Sabado"));
