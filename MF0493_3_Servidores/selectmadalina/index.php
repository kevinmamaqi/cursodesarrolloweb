<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT MULTIPLE</title>
</head>
<body>
    <?php
        $infoMarcas = array(
            'mercedes' => ['mercedes-1', 'mercedes-2', 'mercedes-3'],
            'seat' => ['leon-1', 'leon-2', 'leon-3']
        );
    ?>
    <select name="marcas" id="marcas">
        <option value="" disabled selected>-- Escoge una marca</option>
        <?php foreach ($infoMarcas as $marca => $value) : ?>
            <option value="<?php echo $marca ?>" ><?php echo $marca ?></option>
        <?php endforeach; ?>
    </select>

    <select name="modelos" id="modelos" style="visibility: hidden">
    </select>
    
    <script id="marcas_coches" type="application/json"><?php echo json_encode($infoMarcas); ?></script>
    <script>
        var marcas_modelos = JSON.parse(document.getElementById("marcas_coches").innerHTML);
        var SELECT_MARCAS = document.getElementById("marcas");
        var SELECT_MODELOS = document.getElementById("modelos");

        SELECT_MARCAS.addEventListener('change', function() {
            var SMval = SELECT_MARCAS.value;
            if (SMval !== '') {
                SELECT_MODELOS.innerHTML = '';
                SELECT_MODELOS.style.visibility = 'visible';
                for (let i = 0; i < marcas_modelos[SMval].length; i++) {
                    const el = marcas_modelos[SMval][i];
                    var option = document.createElement('option');
                    option.appendChild(document.createTextNode(marcas_modelos[SMval][i]));
                    option.value = marcas_modelos[SMval][i];
                    SELECT_MODELOS.appendChild(option);                   
                }
            }
        });
    </script>
</body>
</html>