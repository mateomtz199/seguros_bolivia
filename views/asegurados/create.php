<?php
$planes = $this->d['planes'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar asegurado</title>
</head>

<body>
    <h1>Registrar asegurado</h1>
    <form action="<?php echo constant("URL"); ?>asegurados/newAsegurado ?>" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Selecciona un plan</label>
            <select name="planId">
                <?php foreach ($planes as $plan) { ?>
                    <option value="<?php echo $plan->getId(); ?>"><?php echo $plan->getNombre(); ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="">
        </p>
        <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="">
        </p>
        <p>
            <label for="cargo">Dirección</label>
            <input type="text" name="direccion" id="">
        </p>
        <p>
            <label for="usuario">Teléfono</label>
            <input type="text" name="telefono" id="">
        </p>
        <p>
            <label for="nombre">Foto de certificado de nacimiento</label>
            <input type="file" name="fotoCertificado" id="">
        </p>
        <p>
            <label for="nombre">Foto carnet de identidad</label>
            <input type="file" name="fotoCarnet" id="">
        </p>
        <p>
            <input type="submit" value="Registrar">
        </p>


    </form>
</body>

</html>