<?php
$usuario = $this->d["user"];
$pagos = $this->d["pagos"];
require_once "views/header.php";
?>
<div class="col-9">
    <h1>Pagos realizados</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha de transacción</th>
                        <th>Asegurado</th>
                        <th>Mes pagado</th>
                        <th>Cantidad pago</th>
                        <th>Plan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagos as $pago) { ?>
                        <tr>
                            <td><?php echo $pago["fecha_pago"]; ?></td>
                            <td><?php echo $pago["nombre"] . " " . $pago["apellidos"]; ?></td>
                            <td><?php echo $pago["mes_pago"]; ?></td>
                            <td><?php echo $pago["cantidad_pagada"]; ?></td>
                            <td><?php echo $pago["plan"]; ?></td>
                            <td><a href="<?php echo constant("URL") ?>pagos/ver/<?php echo $pago["id"]; ?>" class="btn btn-success"><i class="bi bi-search"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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