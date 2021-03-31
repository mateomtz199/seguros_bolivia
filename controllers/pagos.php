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
}
