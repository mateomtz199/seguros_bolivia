<?php
require_once "models/aseguradosmodel.php";
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
        $this->view->render("dashboard/index", [
            "user" => $this->user,
            "asegurados" => $aseguradosModel->getAllWithPlan(),
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
