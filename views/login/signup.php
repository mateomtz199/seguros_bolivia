<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>

<body>
    <h1>Registro</h1>

    <?php $this->showMessages() ?>
    <form action="<?php echo constant("URL"); ?>signup/nuevoUsuario" method="post">
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="">
        </p>
        <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="">
        </p>
        <p>
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="">
        </p>
        <p>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" id="">
        </p>
        <p>
            <label for="nombre">Password</label>
            <input type="password" name="password" id="">
        </p>
        <p>
            <input type="submit" value="Registrar">
        </p>
    </form>
    <p>Iniciar sesión <a href="<?php echo constant("URL"); ?>">Iniciar sesión</a></p>
</body>

</html>