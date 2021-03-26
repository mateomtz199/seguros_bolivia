<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    Iniciar sesion
    <p>
        <?php
        $this->showMessages();
        ?>
    </p>
    <form action="<?php echo constant("URL"); ?>/login/authenticate" method="post">
        <p>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" id="">
        </p>
        <p>
            <label for="nombre">Password</label>
            <input type="password" name="password" id="">
        </p>
        <p>
            <input type="submit" value="Iniciar sesion">
        </p>
    </form>
</body>

</html>