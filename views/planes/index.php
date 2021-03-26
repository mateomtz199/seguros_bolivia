<?php
$planes = $this->d['planes'];
$usuario = $this->d["user"];
require_once "views/header.php";
?>
<div class="col-9">
    <h3>Planes</h3>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php
        foreach ($planes as $plan) {
        ?>
            <div class="col-4">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                        <h4 class="my-0 fw-normal"><?php echo $plan->getNombre(); ?></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$<?php echo $plan->getPrecio(); ?><small class="text-muted fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <?php echo $plan->getDescripcion(); ?>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary">Contratar</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
</div>