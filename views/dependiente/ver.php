<?php
$usuario = $this->d["user"];
$asegurado = $this->d["asegurado"];
$dependiente = $this->d["dependiente"];
require_once "views/header.php";
?>

<div class="col-9">

    <h4>Datos del afiliado de <?php echo $asegurado->getNombre() . " " . $asegurado->getApellidos(); ?></h4>

    <?php $this->showMessages(); ?>
    <div class="card text-dark bg-light mb-12">
        <div class="card-header">
            <h4><?php echo $dependiente->getNombre() . " " . $dependiente->getApellidos(); ?></h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <p><strong>Dirección: </strong><?php echo $dependiente->getDireccion(); ?></p>
                    <p><strong>Teléfono: </strong><?php echo $dependiente->getTelefono(); ?></p>
                </div>

                <div class="col-6">

                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>Certificado de nacimiento</p>

                    <a href="<?php echo constant("URL") . "public/img/" . $dependiente->getFotoCertificadoNacimiento() ?>" data-lightbox="Certificado" data-title="Certificado de nacimiento del asegurado">
                        <img src="<?php echo constant("URL") . "public/img/" . $dependiente->getFotoCertificadoNacimiento() ?>" height="200px" class="rounded">
                    </a>

                </div>
                <div class="col-6">
                    <p>Carnet de identidad</p>
                    <a href="<?php echo constant("URL") . "public/img/" . $dependiente->getFotoCarnetIdentidad() ?>" data-lightbox="Carnet" data-title="Carnet de identidad del asegurado">
                        <img src="<?php echo constant("URL") . "public/img/" . $dependiente->getFotoCarnetIdentidad() ?>" height="100px" class="rounded">
                    </a>
                </div>
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