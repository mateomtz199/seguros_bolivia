<?php
include_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();
ob_start();

$id = $this->d["id"];
$p  = $this->d["datosPago"];

include "factura.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=factura.pdf");
echo $dompdf->output();
