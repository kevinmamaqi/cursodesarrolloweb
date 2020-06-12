// Variables globales
var NOMBRE_TAREA = $("#nombre-tarea");
var ANADIR_TAREA = $("#anadir-tarea");
var TAREAS_NO_HECHAS_CAJA = $("#tareas-nuevas");
var TAREAS_HECHAS_CAJA = $("#tareas-hechas");

function crearNuevaTarea(NOMBRE_TAREA) {
	if (NOMBRE_TAREA.val() === "") {
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
	nombreTareaSpan.innerHTML = NOMBRE_TAREA.val();
	nuevaTarea.appendChild(nombreTareaSpan);

	// Crear BOTON eliminar tarea
	var botonEliminarTarea = document.createElement("button");
	botonEliminarTarea.innerText = "Eliminar";
	nuevaTarea.appendChild(botonEliminarTarea);

	// Añadir la tarea a la caja de Nuevas Tareas
	TAREAS_NO_HECHAS_CAJA.append(nuevaTarea);

	// Limpio la tarea
	NOMBRE_TAREA.val("");
}

ANADIR_TAREA.on("click", function () {
	crearNuevaTarea(NOMBRE_TAREA);
});

// Añadir EVENTO al botón de la nueva tarea
$("#tareas-nuevas, #tareas-hechas").on("click", "button", function () {
	$(this).parent().remove();
});

// Añadir EVENTO al checkbox de la nueva tarea
$("#tareas-nuevas, #tareas-hechas").on("click", "input", function () {
	if ($(this).prop("checked")) {
		TAREAS_HECHAS_CAJA.append($(this).parent());
	} else {
		TAREAS_NO_HECHAS_CAJA.append($(this).parent());
	}
});
