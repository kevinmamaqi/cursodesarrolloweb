<!-- Estado, radio -->
<div class="grupo">
    <p>Estado</p>
    <div class="grupo grupo-radio">
        <input type="radio" id="estado_a_reformar" value="estado_a_reformar" name="estado">
        <label for="estado_a_reformar">A reformar</label>
    </div>
    <div class="grupo grupo-radio">
        <input type="radio" id="estado_buen_estado" value="estado_buen_estado" name="estado">
        <label for="estado_buen_estado">Buen estado</label>
    </div>
</div>

<!-- m2 construidos, input -->
<div class="grupo">
    <label for="m2_construidos">m2 construidos</label>
    <input type="number" id="m2_construidos" name="m2_construidos" required>
</div>

<!-- m2 utiles, input -->
<div class="grupo">
    <label for="m2_utiles">m2 utiles (opcional)</label>
    <input type="number" id="m2_utiles" name="m2_utiles">
</div>

<!-- m2 superficie minima, input -->
<div class="grupo">
    <label for="m2_superficie_minima">m2 superficie mínima (opcional)</label>
    <input type="number" id="m2_superficie_minima" name="m2_superficie_minima">
</div>

<!-- Fachada del inmueble, radio -->
<div class="grupo">
    <p>Fachada del inmueble</p>
    <div class="grupo grupo-radio">
        <input type="radio" id="fachada_exterior" value="fachada_exterior" name="fachada_inmueble">
        <label for="fachada_exterior">Exterior</label>
    </div>
    <div class="grupo grupo-radio">
        <input type="radio" id="fachada_interior" value="fachada_interior" name="fachada_inmueble">
        <label for="fachada_interior">Interior</label>
    </div>
</div>

<!-- Distribución, radio -->
<div class="grupo">
    <p>Distribución</p>
    <?php foreach ($enviarProp->distribucion_validos as $key => $value) : ?>
        <div class="grupo grupo-radio">
            <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" name="distribucion">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>

<!-- Uso exclusivo oficinas, radio -->
<div class="grupo">
    <p>Uso exclusivo oficinas</p>
    <div class="grupo grupo-radio">
        <input type="radio" id="uso_exclusivo_si" value="si" name="uso_exclusivo_oficinas">
        <label for="uso_exclusivo_si">Si</label>
    </div>
    <div class="grupo grupo-radio">
        <input type="radio" id="uso_exclusivo_no" value="no" name="uso_exclusivo_oficinas">
        <label for="uso_exclusivo_no">No</label>
    </div>
</div>


<!-- Numero de baños y aseos, input number -->
<div class="grupo">
    <label for="n_banos_aseos">Número de baños y aseos</label>
    <input type="number" id="n_banos_aseos" name="n_banos_aseos">
</div>

<!-- Tipo de baños (opcional), radio -->
<div class="grupo">
    <p>Tipos de baños (opcional)</p>
    <?php foreach ($enviarProp->tipo_de_banos_validos as $key => $value) : ?>
        <div class="grupo grupo-radio">
            <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" name="tipo_de_banos">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>

<!-- Ubicación de los baños (opcional), radio -->
    <div class="grupo">
    <p>Ubicación de los baños (opcional)</p>
    <div class="grupo grupo-radio">
        <input type="radio" id="dentro_oficina" value="dentro_oficina" name="ubicacion_banos">
        <label for="dentro_oficina">Dentro de la oficina</label>
    </div>
    <div class="grupo grupo-radio">
        <input type="radio" id="fuera_oficina" value="fuera_oficina" name="ubicacion_banos">
        <label for="fuera_oficina">Fuera de la oficina</label>
    </div>
</div>

<!-- Ascensores, input number -->
<div class="grupo">
    <label for="n_ascensores">Ascensores</label>
    <input type="number" id="n_ascensores" name="n_ascensores">
</div>

<!-- Certificación energetica, select -->
<div class="grupo">
    <label for="certificacion-energetica">Certificación energética:</label>
    <select name="certificacion-energetica" id="certificacion-energetica">
        <option value="">--Selecciona--</option>
        <?php foreach ($enviarProp->certificacion_energetica_validos as $key => $value) : ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Aire acondicionado, radio -->
<div class="grupo">
    <p>Aire acondicionado</p>
    <?php foreach ($enviarProp->aire_acondicionado_validos as $key => $value) : ?>
        <div class="grupo grupo-radio">
            <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" name="aire_acondicionado">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>

<!-- Seguridad de la oficina, checkboxes -->
<div class="grupo">
    <p>Seguridad de la oficina</p>
    <?php foreach ($enviarProp->seguridad_oficina_validos as $key => $value) : ?>
        <div class="grupo grupo-checkboxes">
            <input type="checkbox" id="<?php echo $key; ?>" name="<?php echo $key; ?>">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>

<!-- Características de tu oficina -->
<div class="grupo">
    <p>Características de tu oficina</p>
    <?php foreach ($enviarProp->caracteristicas_oficina_validos as $key => $value) : ?>
        <div class="grupo grupo-checkboxes">
            <input type="checkbox" id="<?php echo $key; ?>" name="<?php echo $key; ?>">
            <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
        </div>
    <?php endforeach; ?>
</div>