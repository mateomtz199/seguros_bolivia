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
        $this->view->render("pagos/index", [
            "user" => $this->user,
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
            $this->redirect("dashboard", []);
        }
        $id = $parametros[0];
        $asegurado = new AseguradosModel();
        $dependientes = new DependienteModel();

        $this->view->render("asegurados/ver", [
            "user" => $this->user,
            "asegurado" => $asegurado->getWithPlan($id),
            "dependientes" => $dependientes->getPorAsegurado($id)
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
        $nMes = $this->getPost("nMes");
        $this->view->render("pagos/datospago", [
            "user" => $this->user,
            "id" => $id,
            "nombreAseg" => $nombreAseg,
            "fechaPago" => $fechaPago,
            "mesPago" => $mesPago,
            "cantidad" => $cantidad,
            "factura" => $factura,
            "nMes" => $nMes
        ]);
    }
    public function pagar()
    {
        $id = $this->getPost("aseguradoId");
        $fechaPago = $this->getPost("fechaPago");
        $mesPago = $this->getPost("mesPago");
        $cantidad = $this->getPost("cantidad");
        $factura = $this->getPost("factura");
        $pagos = new PagosModel();
        $pagos->setAseguradoId($id);
        $pagos->setFechaPago($fechaPago);
        $pagos->setMesPago($mesPago);
        $pagos->setCantidadPagada($cantidad);
        $pagos->setClaveFactura($factura);
        $pagos->save();
        $this->redirect("pagos", []);
    }
}
