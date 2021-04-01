<?php
$usuario = $this->d["user"];
$pago = $this->d["pago"];
require_once "views/header.php";
?>
<div class="col-9">
    <h1>Detalle de pago</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="card text-white text-center bg-success mb-3" style="max-width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pago["plan"]; ?></h5>
                    <h2>$ <?php echo $pago["cantidad_pagada"]; ?></h2>
                    <p><?php echo $pago["fecha_pago"]; ?></p>
                </div>
            </div>

            <p>Asegurado:</p>
            <h5> <?php echo $pago["nombre"] . " " . $pago["apellidos"]; ?></h5>

            <p>Importe:</p>
            <h5>$ <?php echo $pago["cantidad_pagada"]; ?></h5>

            <p>Mes de pago:</p>
            <h5> <?php echo $pago["mes_pago"]; ?></h5>

            <p>Fecha realizada:</p>
            <h5> <?php echo $pago["fecha_pago"]; ?></h5>

            <p>Descripción:</p>
            <pre> <?php echo $pago["clave_factura"]; ?></pre>
        </div>
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