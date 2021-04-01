<?php
$usuario = $this->d["user"];
$id = $this->d["id"];
$nombreAseg = $this->d["nombreAseg"];
$fechaPago = $this->d["fechaPago"];
$mesPago = $this->d["mesPago"];
$cantidad = $this->d["cantidad"];
$factura = md5(uniqid()) . $this->d["factura"];
$nMes = $this->d["nMes"];
$nDependiente = $this->d["nDependiente"];
$precioDependiente = $this->d["precioDependiente"];

require_once "views/header.php";

?>
<div class="col-9">

    <div class="card">
        <div class="card-header">
            Resumen de pago
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">Asegurado: <?php echo $nombreAseg; ?></h5>
            <h4 class="text-center">Meses de pago: <?php echo $nMes; ?></h4>
            <h4 class="text-center">Fecha vencimiento: <?php echo $mesPago; ?></h4>
            <h1 class="text-center">Total a pagar: <?php echo $cantidad; ?></h1>
            <p class="text-center mt-4"><?php echo $fechaPago; ?></p>

            <form action="<?php echo constant("URL") ?>pagos/pagar" method="POST">
                <input type="hidden" name="aseguradoId" id="aseguradoId" value="<?php echo $id; ?>">
                <input type="hidden" name="fechaPago" id="fechaPago" value="<?php echo $fechaPago; ?>">
                <input type="hidden" name="mesPago" id="mesPago" value="<?php echo $mesPago; ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
                <input type="hidden" name="factura" id="factura" value="<?php echo $factura; ?>">
                <!-- para Factura -->
                <input type="hidden" name="nMes" id="nMes" value="<?php echo $nMes; ?>">
                <input type="hidden" name="nDependiente" id="nDependiente" value="<?php echo $nDependiente; ?>">
                <input type="hidden" name="precioDependiente" id="precioDependiente" value="<?php echo $precioDependiente; ?>">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Realizar pago</button>
                </div>
            </form>
        </div>
    </div>

</div>

</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="public/js/js.js"></script>
<script>

</script>

</body>

</html>