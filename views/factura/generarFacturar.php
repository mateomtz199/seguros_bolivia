<?php
include_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();
ob_start();

$id = $this->d["id"];
$nombreAseg  = $this->d["nombreAseg"];
$fechaPago = $this->d["fechaPago"];
$mesPago = $this->d["mesPago"];
$cantidad = $this->d["cantidad"];
$factura = $this->d["factura"];
$nMes = $this->d["nMes"];
$nDependiente = $this->d["nDependiente"];
$precioDependiente = $this->d["precioDependiente"];

include "factura.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=factura.pdf");
echo $dompdf->output();
