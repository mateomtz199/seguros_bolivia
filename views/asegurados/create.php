<?php
$planes = $this->d['planes'];
$usuario = $this->d["user"];
require_once "views/header.php";
?>

<div class="col-9">

    <h4>Registrar asegurado</h4>

    <?php $this->showMessages(); ?>
    <form action="<?php echo constant("URL") ?>asegurados/newAsegurado" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        <div class="row mb-3">
            <label for="nombre" class="col-sm-4 col-form-label">Selecciona un plan</label>
            <div class="col-sm-8">
                <select name="planId" class="form-select" required>
                    <option selected disabled value="">Selecciona un plan</option>
                    <?php foreach ($planes as $plan) { ?>
                        <option value="<?php echo $plan->getId(); ?>"><?php echo $plan->getNombre(); ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="nombre" id="validationCustom01" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-4 col-form-label" for="nombre">Apellidos</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="apellidos" id="" required>
            </div>

        </div>

        <div class="row mb-3">
            <label class="col-sm-4 col-form-label" for="nombre">Dirección</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="direccion" id="" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-4 col-form-label" for="nombre">Teléfono (7 digitos)</label>
            <div class="col-sm-8">
                <input class="form-control" type="tel" pattern="[0-9]{7}" name="telefono" id="" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-4 col-form-label" for="nombre">Foto de certificado de nacimiento</label>
            <div class="col-sm-8">
                <input class="form-control" type="file" name="fotoCertificado" id="" required accept="image/*">
            </div>

        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label" for="nombre">Foto carnet de identidad</label>
            <div class="col-sm-8">
                <input class="form-control" type="file" name="fotoCarnet" id="" required accept="image/*">
            </div>

        </div>

        <p>
            <input type="submit" class="btn btn-primary" value="Registrar">
        </p>




    </form>
</div>
</div>

</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>