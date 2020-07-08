<?php

// EJEMPLO DE: https://www.w3schools.com/php/php_forms.asp

// En el atributo HTML <form> la propiedad action indica
// donde se envian los datos recopilados por el formulario.
// El atributo method, define que método HTTP usaremos
// para enviar dichos datos (GET o POST)

// GET /es/docs/Learn/HTML/Forms/Your_first_HTML_form/
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar formulario</title>
</head>
<body>
    <form action="welcome.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
</body>
</html>