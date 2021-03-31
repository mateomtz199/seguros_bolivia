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
                <form action="" method="post">
                    <input type="hidden" name="aseguradoId" id="aseguradoId">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="nombre" id="cliente" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nombre">Plan asigando</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="nombre" id="plan" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nombre">Costo mensual</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="nombre" id="precio" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nombre">Dependientes</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="nombre" id="dependientes" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nombre">Precio dependiente</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="nombre" id="precioDependiente" required>
                        </div>
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