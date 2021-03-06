<?php
require_once "models/pagosModel.php";
class Pagos extends SessionController
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    public function render()
    {
        $pagos = new PagosModel();
        $this->view->render("pagos/index", [
            "user" => $this->user,
            "pagos" => $pagos->getAll()
        ]);
    }
    public function create()
    {
        $this->view->render("pagos/create", [
            "user" => $this->user,
        ]);
    }
    public function ver($parametros)
    {
        if ($parametros == null) {
            $this->redirect("pagos", []);
        }
        $id = $parametros[0];
        $pago = new PagosModel();

        $this->view->render("pagos/ver", [
            "user" => $this->user,
            "pago" => $pago->getById($id),
        ]);
    }
    public function mostrarDatosPago()
    {
        $id = $this->getPost("aseguradoId");
        $nombreAseg = $this->getPost("nombreAseg");
        $fechaPago = $this->getPost("fechaPago");
        $mesPago = $this->getPost("mesPago");
        $cantidad = $this->getPost("cantidad");
        $factura = $this->getPost("factura");
        $nDependiente = $this->getPost("nDependiente");
        $precioDependiente = $this->getPost("precioDependiente");
        $nmes = $this->getPost("nMesPagar");
        $this->view->render("pagos/datospago", [
            "user" => $this->user,
            "id" => $id,
            "nombreAseg" => $nombreAseg,
            "fechaPago" => $fechaPago,
            "mesPago" => $mesPago,
            "cantidad" => $cantidad,
            "factura" => $factura,
            "nDependiente" => $nDependiente,
            "precioDependiente" => $precioDependiente,
            "nmes" => $nmes
        ]);
    }
    public function pagar()
    {
        $id = $this->getPost("aseguradoId");
        $mesPago = $this->getPost("mesPago");
        $cantidad = $this->getPost("cantidad");
        $factura = $this->getPost("factura");
        $nmes = $this->getPost("nmes");
        $pagos = new PagosModel();
        $pagos->setAseguradoId($id);
        $pagos->setMesPago($mesPago);
        $pagos->setCantidadPagada($cantidad);
        $pagos->setClaveFactura($factura);
        $pagos->setNmes($nmes);
        $pagos->save();
        $idPago = $pagos->ultimoId();
        $this->view->render("pagos/postpago", [
            "user" => $this->user,
            "idPago" => $idPago,
        ]);
    }
    public function factura()
    {
        $id = $this->getPost("aseguradoId");
        $pago = new PagosModel();
        $datosPago = $pago->getById($id);
        $this->view->render("factura/generarFacturar", [
            "user" => $this->user,
            "id" => $id,
            "datosPago" => $datosPago,
        ]);
    }
}
