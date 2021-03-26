<?php
$asegurados = $this->d["asegurados"];
$usuario = $this->d["user"];

require_once "views/header.php";
?>



<div class="col-9">
    <h3>Dashboard</h3>
    <hr>
    <?php $this->showMessages(); ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Plan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asegurados as $asegurado) { ?>
                <tr>
                    <td><?php echo $asegurado->getNombre(); ?> </td>
                    <td><?php echo $asegurado->getApellidos(); ?></td>
                    <td><?php echo $asegurado->getDireccion(); ?></td>
                    <td><?php echo $asegurado->getTelefono(); ?></td>
                    <td><?php echo $asegurado->getNombrePlan(); ?></td>
                    <td>
                        <a href="<?php echo constant("URL") ?>asegurados/ver/<?php echo $asegurado->getId(); ?>" class="btn btn-primary"><i class="bi bi-search"></i></a>
                        <a href="<?php echo constant("URL") ?>asegurados/editar/<?php echo $asegurado->getId(); ?>" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                        <a href="<?php echo constant("URL") ?>asegurados/eliminar/<?php echo $asegurado->getId(); ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>
</div>




</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
</body>

</html>