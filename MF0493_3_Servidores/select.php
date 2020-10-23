<?php

$arrayQueTengo = array(
    array('id1', 'nombre1', 'apellidos1', 'dni1'),
    array('id2', 'nombre2', 'apellidos2', 'dni2'),
    array('id3', 'nombre3', 'apellidos3', 'dni3'),
    array('id4', 'nombre4', 'apellidos4', 'dni4')
);

$arrayQueTengoQueEnviar = array(
    'id1' => 'dni1',
    'id2' => 'dni2',
    'id3' => 'dni3',
    'id4' => 'dni4',
);

function transformarArray($arr)
{
    $arrayADevolver = array();
    foreach ($arr as $value) {
        $arrayADevolver[$value[0]] = $value[3];
    }
    print_r($arrayADevolver);
}

transformarArray($arrayQueTengo);
