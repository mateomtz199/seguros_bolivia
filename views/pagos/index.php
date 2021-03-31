<?php
$usuario = $this->d["user"];
require_once "views/header.php";
?>
<div class="col-9">
    <h1>Pagos</h1>
    <hr>
    <?php
    $this->showMessages();
    ?>
    <div>
        <div class="card">
            <div class="card-body">
                <form action="" method="post" class="row g-3">
                    <input type="hidden" name="aseguradoId" id="aseguradoId">


                    <div class="col-md-6">
                        <label for="Selecciona un asegurado" class="form-label"><strong>Selecciona un asegurado</strong></label>
                        <input type="text" class="form-control" id="cliente" name="nombre" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Plan asignado" class="form-label">Plan asignado</label>
                        <input type="text" class="form-control" name="plan" id="plan" required disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="Costo mensual" class="form-label">Costo mensual</label>
                        <input type="text" class="form-control" name="precio" id="precio" required disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="Dependientes" class="form-label">Dependientes</label>
                        <input type="text" class="form-control" name="dependientes" id="dependientes" required disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="Precio dependiente" class="form-label">Precio dependiente</label>
                        <input type="text" class="form-control" name="precioDependiente" id="precioDependiente" required disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="Meses pendiente de pago" class="form-label">Meses pendiente de pago</label>
                        <input type="text" class="form-control" name="mesPendiente" id="mesPendiente" required disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="Último mes de pago" class="form-label">Último mes de pago</label>
                        <input type="text" class="form-control" name="ultimoMes" id="ultimoMes" required disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="Número de meses a pagar" class="form-label"><strong>Número de meses a pagar</strong></label>
                        <input type="number" class="form-control" name="nMesPagar" id="nMesPagar" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Realizar pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script src="public/js/js.js"></script>
<script>

</script>

</body>

</html>