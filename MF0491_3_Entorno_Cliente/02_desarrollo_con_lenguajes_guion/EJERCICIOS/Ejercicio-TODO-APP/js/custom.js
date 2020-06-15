// JAVASCRIPT

// Variables globales
var NOMBRE_TAREA = document.getElementById("nombre-tarea");
var ANADIR_TAREA = document.getElementById("anadir-tarea");
var TAREAS_NO_HECHAS_CAJA = document.getElementById("tareas-nuevas");
var TAREAS_HECHAS_CAJA = document.getElementById("tareas-hechas");

function crearNuevaTarea(NOMBRE_TAREA) {
	if (NOMBRE_TAREA.value === "") {
		alert("Tienes que añadir un nombre a la Tarea");
		return;
	}

	// Crear caja de la tarea y asignarle clase
	var nuevaTarea = document.createElement("div");
	nuevaTarea.classList.add("tarea-nueva");

	// Crear input[checkbox] de la tarea
	var checkboxTarea = document.createElement("input");
	checkboxTarea.type = "checkbox";
	nuevaTarea.appendChild(checkboxTarea);

	// Crear SPAN contenedor del nombre
	var nombreTareaSpan = document.createElement("span");
	nombreTareaSpan.innerHTML = NOMBRE_TAREA.value;
	nuevaTarea.appendChild(nombreTareaSpan);

	// Crear BOTON eliminar tarea
	var botonEliminarTarea = document.createElement("button");
	botonEliminarTarea.innerText = "Eliminar";
	nuevaTarea.appendChild(botonEliminarTarea);

	// Añadir EVENTO al botón de la nueva tarea
	var botonEliminar = nuevaTarea.getElementsByTagName("button");
	botonEliminar[0].addEventListener("click", function () {
		this.parentElement.remove();
	});

	// Añadir EVENTO al checkbox de la nueva tarea
	var checkboxMarcarTarea = nuevaTarea.getElementsByTagName("input");

	checkboxMarcarTarea[0].addEventListener("change", function () {
		// this es la referencia a si mismo.
		console.log(this);
		console.log(this.checked);

		// Si esta marcado lo envio a la lista de tareas completas
		if (this.checked) {
			TAREAS_HECHAS_CAJA.appendChild(this.parentElement);
		} else {
			TAREAS_NO_HECHAS_CAJA.appendChild(this.parentElement);
		}
	});

	// Añadir la tarea a la caja de Nuevas Tareas
	TAREAS_NO_HECHAS_CAJA.appendChild(nuevaTarea);

	// Limpio la tarea
	NOMBRE_TAREA.value = "";
}

ANADIR_TAREA.addEventListener("click", function () {
	crearNuevaTarea(NOMBRE_TAREA);
});
