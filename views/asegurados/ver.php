<?php
$usuario = $this->d["user"];
$asegurado = $this->d["asegurado"];
$dependientes = $this->d["dependientes"];
require_once "views/header.php";
?>

<div class="col-9">

    <h4>Datos del asegurado</h4>

    <?php $this->showMessages(); ?>
    <div class="card text-dark bg-light mb-12">
        <div class="card-header">
            <h4><?php echo $asegurado->getNombre() . " " . $asegurado->getApellidos(); ?></h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <p><strong>Dirección: </strong><?php echo $asegurado->getDireccion(); ?></p>
                    <p><strong>Teléfono: </strong><?php echo $asegurado->getTelefono(); ?></p>
                    <p><strong>Fecha de registro: </strong><?php echo $asegurado->getCreateAt(); ?></p>
                </div>

                <div class="col-6">
                    <strong>Plan: <?php echo $asegurado->getPlan()->getNombre(); ?></strong>
                    <p>
                        <strong>Pago mensual: </strong>$USD <?php echo $asegurado->getPlan()->getPrecio(); ?>.00
                    </p>
                    <p>
                        <strong>Características del servicio: </strong><?php echo $asegurado->getPlan()->getDescripcion(); ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>Certificado de nacimiento</p>

                    <a href="<?php echo constant("URL") . "public/img/" . $asegurado->getFotoCertificadoNacimiento() ?>" data-lightbox="Certificado" data-title="Certificado de nacimiento del asegurado">
                        <img src="<?php echo constant("URL") . "public/img/" . $asegurado->getFotoCertificadoNacimiento() ?>" height="200px" class="rounded">
                    </a>

                </div>
                <div class="col-6">
                    <p>Carnet de identidad</p>
                    <a href="<?php echo constant("URL") . "public/img/" . $asegurado->getFotoCarnetIdentidad() ?>" data-lightbox="Carnet" data-title="Carnet de identidad del asegurado">
                        <img src="<?php echo constant("URL") . "public/img/" . $asegurado->getFotoCarnetIdentidad() ?>" height="100px" class="rounded">
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <h4>Lista de asociados</h4>
                <?php
                $this->showMessages();
                ?>
                <div class="text-end">
                    <a href="<?php echo constant("URL") ?>dependiente/crear/<?php echo $asegurado->getId(); ?>" class="btn btn-warning">Agregar afiliado</a>
                </div>
                <table class="table" <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dependientes as $dependiente) { ?>
                            <tr>
                                <td><?php echo $dependiente->getNombre(); ?></td>
                                <td><?php echo $dependiente->getApellidos(); ?></td>
                                <td><?php echo $dependiente->getTelefono(); ?></td>
                                <td><?php echo $dependiente->getDireccion(); ?></td>
                                <td>
                                    <a href="<?php echo constant("URL") ?>dependiente/ver/<?php echo $dependiente->getId(); ?>" class="btn btn-primary"><i class="bi bi-search"></i></a>
                                    <a href="<?php echo constant("URL") ?>dependiente/editar/<?php echo $dependiente->getId(); ?>" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="<?php echo constant("URL") ?>dependiente/eliminar/<?php echo $dependiente->getId(); ?>" onclick="return confirm('¿Estas seguro?');" class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
</body>