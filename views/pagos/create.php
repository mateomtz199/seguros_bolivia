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
                <form method="post" action="<?php echo constant("URL") ?>pagos/mostrarDatosPago" class="row g-3 needs-validation" novalidate>
                    <input type="hidden" name="aseguradoId" id="aseguradoId">
                    <input type="hidden" name="nombreAseg" id="nombreAseg">
                    <input type="hidden" name="fechaPago" id="fechaPago">
                    <input type="hidden" name="mesPago" id="mesPago">
                    <input type="hidden" name="cantidad" id="cantidad">
                    <input type="hidden" name="factura" id="factura">
                    <input type="hidden" name="nMes" id="nMes">


                    <div class="col-md-6">
                        <label for="Selecciona un asegurado" class="form-label"><strong>Selecciona un asegurado</strong></label>
                        <input type="text" class="form-control" id="cliente" name="nombre" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Plan asignado" class="form-label">Plan asignado</label>
                        <input type="text" class="form-control" name="plan" id="plan" disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="Costo mensual" class="form-label">Costo mensual</label>
                        <input type="text" class="form-control" name="precio" id="precio" disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="Dependientes" class="form-label">Dependientes</label>
                        <input type="text" class="form-control" name="dependientes" id="dependientes" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="Precio dependiente" class="form-label">Precio dependiente por mes</label>
                        <input type="text" class="form-control" name="precioDependiente" id="precioDependiente" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="Meses pendiente de pago" class="form-label">Meses pendiente de pago</label>
                        <input type="text" class="form-control" name="mesPendiente" id="mesPendiente" disabled>
                        <small id="primerPago" class="form-text text-muted">
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label for="Último mes de pago" class="form-label">Último mes de pago</label>
                        <input type="text" class="form-control" name="ultimoMes" id="ultimoMes" disabled>
                        <small id="primerMesPago" class="form-text text-muted">
                        </small>
                    </div>

                    <div class="col-md-4">
                        <label for="Número de meses a pagar" class="form-label"><strong>Número de meses a pagar</strong></label>
                        <input type="number" class="form-control" name="nMesPagar" id="nMesPagar" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Número de meses a pagar" class="form-label"><strong>Subtotal asegurado</strong></label>
                        <input type="number" class="form-control" name="subTotalAsegurado" id="subTotalAsegurado" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="Número de meses a pagar" class="form-label"><strong>Subtotal dependientes</strong></label>
                        <input type="number" class="form-control" name="subTotalDependientes" id="subTotalDependientes" disabled>
                    </div>

                    <div class="col-md-6">
                        <h4>Mes de termino: <span id="mesTermino"></span></h4>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center">Total a pagar: <span id="granTotal">0.0</span></h3>
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
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="<?php echo constant("URL"); ?>public/js/js.js"></script>
<script>

</script>

</body>

</html>