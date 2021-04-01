<?php
$usuario = $this->d["user"];
$id = $this->d["id"];
$nombreAseg  = $this->d["nombreAseg"];
$fechaPago = $this->d["fechaPago"];
$mesPago = $this->d["mesPago"];
$cantidad = $this->d["cantidad"];
$factura = $this->d["factura"];
$nMes = $this->d["nMes"];
$nDependiente = $this->d["nDependiente"];
$precioDependiente = $this->d["precioDependiente"];
require_once "views/header.php";

?>
<div class="col-9 mt-5 ml-5">
    <div class="card text-center">
        <h4>Pago realizado</h4>
        <form action="<?php echo constant("URL") ?>pagos/factura" method="post">
            <input type="hidden" name="aseguradoId" id="aseguradoId" value="<?php echo $id; ?>">
            <input type="hidden" name="fechaPago" id="fechaPago" value="<?php echo $fechaPago; ?>">
            <input type="hidden" name="mesPago" id="mesPago" value="<?php echo $mesPago; ?>">
            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
            <input type="hidden" name="factura" id="factura" value="<?php echo $factura; ?>">
            <!-- para Factura -->
            <input type="hidden" name="nMes" id="nMes" value="<?php echo $nMes; ?>">
            <input type="hidden" name="nDependiente" id="nDependiente" value="<?php echo $nDependiente; ?>">
            <input type="hidden" name="precioDependiente" id="precioDependiente" value="<?php echo $precioDependiente; ?>">
            <input type="hidden" name="nombreAseg" id="nombreAseg" value="<?php echo $nombreAseg; ?>">
            <button class="btn btn-primary">Generar factura</button>
            <a href="<?php echo constant("URL") ?>" class="btn btn-success">Ir al inicio</a>
        </form>

    </div>
</div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
<script>

</script>

</body>

</html>