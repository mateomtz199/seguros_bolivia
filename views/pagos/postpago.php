<?php
$usuario = $this->d["user"];
$id = $this->d["idPago"];
require_once "views/header.php";

?>
<div class="col-9 mt-5 ml-5">
    <div class="card text-center">
        <h4>Pago realizado</h4>
        <form action="<?php echo constant("URL") ?>pagos/factura" method="post">
            <input type="hidden" name="aseguradoId" id="aseguradoId" value="<?php echo $id; ?>">
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