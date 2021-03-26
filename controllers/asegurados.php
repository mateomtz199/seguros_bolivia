<?php
require_once "models/aseguradosmodel.php";
require_once "models/planesmodel.php";
class Asegurados extends SessionController
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    public function render()
    {
        error_log("Asegurados::RENDER() ");
        $this->view->render("asegurados/index", [
            "user" => $this->user,
        ]);
    }
    public function newAsegurado()
    {
        if (!$this->existPOST(["planId", "nombre", "apellidos", "direccion", "telefono"])) {
            $this->redirect("asegurados/create", []);
            return;
        }
        if ($this->user == null) {
            $this->redirect("asegurados/create", []);
            return;
        }
        $fotoCertificado = $_FILES["fotoCertificado"];
        $urlImages = "public/img/";
        $extension = explode(".", $fotoCertificado["name"]);
        $filename = $extension[sizeof($extension) - 2]; //nombre del archivo
        $ext = $extension[sizeof($extension) - 1];
        $hash = md5(Date("Ymdi") . $filename) . "." . $ext;
        $targetFile = $urlImages . $hash;
        $upLoadOk = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($fotoCertificado["tmp_name"]);
        if ($check != false) {
            $upLoadOk = true;
        } else {
            $upLoadOk = false;
        }

        if (!$upLoadOk) {
            $this->redirect("dashboard", []);
        } else {
            if (move_uploaded_file($fotoCertificado["tmp_name"], $urlImages)) {
                $this->redirect("asegurados", []);
            }
        }
        $fotoCarnet = "No hay";


        $hoy = date("Y-m-d");
        $asegurado = new AseguradosModel();
        $asegurado->setPlanId($this->getPost("planId"));
        $asegurado->setNombre($this->getPost("nombre"));
        $asegurado->setApellidos($this->getPost("apellidos"));
        $asegurado->setDireccion($this->getPost("direccion"));
        $asegurado->setTelefono($this->getPost("telefono"));
        $asegurado->setFotoCertificadoNacimiento($hash);
        $asegurado->setFotoCarnetIdentidad($fotoCarnet);
        $asegurado->setCreateAt($hoy);
        $asegurado->save();
        $this->redirect("dashboard", []);
    }
    public function create()
    {
        $planes = new PlanesModel();
        $this->view->render("asegurados/create", [
            "planes" => $planes->getAll(),
            "user" => $this->user
        ]);
    }
    public function getAseguradosJSON()
    {
        header("Content-Type: application/json");
        $res = [];
    }
    public function delete($parametros)
    {
        if ($parametros == null) {
            $this->redirect("dashboard", []);
        }
        $id = $parametros[0];
        $res = $this->model->delete($id);
        if ($res) {
            $this->redirect("asegurados", []);
        } else {
            $this->redirect("asegurados", []);
        }
    }
}
