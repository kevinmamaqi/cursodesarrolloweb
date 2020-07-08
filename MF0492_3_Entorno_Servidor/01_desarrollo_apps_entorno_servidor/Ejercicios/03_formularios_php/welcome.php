<?php
    $nombre = $_POST["name"];
    $email = $_POST["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

<?php if (!empty($nombre) && !empty($email)) : ?>
    Bienvenido <?php echo $_POST["name"]; ?><br>
    Tu email es: <?php echo $_POST["email"]; ?>
<?php else : ?>
    No has introducido tus datos.
<?php endif; ?>

</body>
</html>