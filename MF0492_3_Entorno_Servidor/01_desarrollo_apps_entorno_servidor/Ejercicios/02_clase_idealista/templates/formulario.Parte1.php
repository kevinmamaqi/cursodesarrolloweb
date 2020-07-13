<!-- Tipo inmueble -->
<div class="grupo">
    <label for="tipo_inmueble">Elige el timpo de inmueble:</label>
    <select name="tipo_inmueble" id="tipo_inmueble">
        <option value="" selected disabled>--Por favor escoge una opción--</option>
        <?php foreach ($enviarProp->tipos_inmueble_validos as $key => $value) : ?>
                <option value="<?php echo $key; ?>"><?php echo $value ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Operación -->
<div class="grupo">
    <p>Operación</p>
    <?php foreach ($enviarProp->operaciones_validas as $key => $value) : ?>
        <div class="grupo grupo-radio">
            <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" name="operacion">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>

<!-- Dirección, input -->
<div class="grupo">
    <label for="direccion">Dirección</label>
    <input type="text" id="direccion" name="direccion">
</div>

<!-- Provincia, select -->
<div class="grupo">
    <label for="provincia">Tu provincia:</label>
    <select name="provincia" id="provincia">
        <option value="" selected disabled>--Por favor escoge una opción--</option>
        <?php foreach ($enviarProp->provincias_validas as $key => $value) : ?>
                <option value="<?php echo $key; ?>"><?php echo $value ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Código postal, input -->
<div class="grupo">
    <label for="codigo_postal">Código Postal</label>
    <input type="number" id="codigo_postal" name="codigo_postal">
</div>

<!-- Ocultar dirección, checkbox -->
<div class="grupo">
    <p>¿Quieres ocultar la calle y el número?</p>
    <div class="grupo grupo-checkboxes">
        <input type="checkbox" id="ocultar_direccion" name="ocultar_direccion">
        <label for="ocultar_direccion">Ocultar dirección por 9,9€</label>
    </div>
</div>

<!-- Planta, select -->
<div class="grupo">
    <label for="planta">Escoge planta:</label>
    <select name="planta" id="planta">
        <option value="" selected disabled>--Por favor escoge una opción--</option>
        <?php foreach ($enviarProp->planta_validos as $key => $value) : ?>
                <option value="<?php echo $key; ?>"><?php echo $value ?></option>
        <?php endforeach; ?>
    </select>
</div>


<!-- Puerta, input -->
<div class="grupo">
    <label for="puerta">Puerta</label>
    <input type="text" id="puerta" name="puerta">
</div>


<!-- Bloque portal, radio (Si/No) -->
<div class="grupo">
    <p>¿Hay más de un bloque/portal?</p>
    <div class="grupo grupo-radio">
        <input type="radio" id="bloque_puerta_no" value="si" name="bloque_puerta">
        <label for="bloque_puerta_no">No</label>
    </div>
    <div class="grupo grupo-radio">
        <input type="radio" id="bloque_puerta_si" value="no" name="bloque_puerta">
        <label for="bloque_puerta_si">Si</label>
    </div>
</div>

<!-- Urbanización, input -->
<div class="grupo">
    <label for="urbanizacion">Urbanización</label>
    <input type="text" id="urbanizacion" name="urbanizacion">
</div>

<!-- Email, input (email) -->
<div class="grupo">
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
</div>

<!-- Teléfono, input -->
<div class="grupo">
    <label for="telefono">Teléfono</label>
    <input type="text" id="telefono" name="telefono">
</div>

<!-- Telefono extranjero, checkbox -->
<div class="grupo">
    <div class="grupo grupo-checkboxes">
        <input type="checkbox" id="telefono_extranjero" name="telefono_extranjero">
        <label for="telefono_extranjero">Es un teléfono extranjero</label>
    </div>
</div>

<!-- Nombre, input -->
<div class="grupo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
</div>

<!-- Como prefieres que te contacten, input -->
<div class="grupo">
    <p>¿Cómo prefieres que te contacten?</p>
    <?php foreach ($enviarProp->metodo_contacto_validos as $key => $value) : ?>
        <div class="grupo grupo-radio">
            <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" name="metodo_contacto">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>