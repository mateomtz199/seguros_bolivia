<?php
require_once "models/aseguradosmodel.php";
require_once "models/pagosModel.php";
class Dashboard extends SessionController
{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        error_log("Dashboard::Inicio de login");
    }
    function render()
    {
        $aseguradosModel = new AseguradosModel();
        $pagos = new PagosModel();
        $this->view->render("dashboard/index", [
            "user" => $this->user,
            "asegurados" => $aseguradosModel->getAllWithPlan(),
            "planesCantidad" => $aseguradosModel->cantidadPorPlan(),
            "cantidadAsegurados" => $aseguradosModel->cantidadAsegurados(),
            "cantidadDependientes" => $aseguradosModel->cantidadDependientes(),
            "mesesAtrasados" => $pagos->aseguradosMesesAtrasados()
        ]);
    }
    public function getAsegurados()
    {
    }
    public function getDependietes()
    {
    }
    public function getPlanes()
    {
    }
}
