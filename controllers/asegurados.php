<?php
require_once "models/aseguradosmodel.php";
require_once "models/planesmodel.php";
require_once "models/userModel.php";
require_once "models/dependientesmodel.php";
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
        $hashCertificado = md5(Date("Ymdi") . $filename) . "." . $ext;
        $targetFile = $urlImages . $hashCertificado;
        $upLoadOk = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($fotoCertificado["tmp_name"]);
        if ($check != false) {
            $upLoadOk = true;
        } else {
            $upLoadOk = false;
        }

        if (!$upLoadOk) {
            $this->redirect("asegurados/create", []);
        } else {
            if (move_uploaded_file($fotoCertificado["tmp_name"], $targetFile)) {
                $this->redirect("asegurados", []);
            }
        }

        $fotoCarnet = $_FILES["fotoCarnet"];
        $urlImages = "public/img/";
        $extension = explode(".", $fotoCarnet["name"]);
        $filename = $extension[sizeof($extension) - 2]; //nombre del archivo
        $ext = $extension[sizeof($extension) - 1];
        $hashCarnet = md5(Date("Ymdi") . $filename) . "." . $ext;
        $targetFile = $urlImages . $hashCarnet;
        $upLoadOk = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($fotoCarnet["tmp_name"]);
        if ($check != false) {
            $upLoadOk = true;
        } else {
            $upLoadOk = false;
        }

        if (!$upLoadOk) {
            $this->redirect("asegurados/create", []);
        } else {
            if (move_uploaded_file($fotoCarnet["tmp_name"], $targetFile)) {
                $this->redirect("asegurados", []);
            }
        }

        $hoy = date("Y-m-d");
        $asegurado = new AseguradosModel();
        $asegurado->setPlanId($this->getPost("planId"));
        $asegurado->setNombre($this->getPost("nombre"));
        $asegurado->setApellidos($this->getPost("apellidos"));
        $asegurado->setDireccion($this->getPost("direccion"));
        $asegurado->setTelefono($this->getPost("telefono"));
        $asegurado->setFotoCertificadoNacimiento($hashCertificado);
        $asegurado->setFotoCarnetIdentidad($hashCarnet);
        $asegurado->setCreateAt($hoy);
        $asegurado->save();
        $this->redirect("dashboard", []);
    }
    public function update()
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
        $hashCertificado = md5(Date("Ymdi") . $filename) . "." . $ext;
        $targetFile = $urlImages . $hashCertificado;
        $upLoadOk = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($fotoCertificado["tmp_name"]);
        if ($check != false) {
            $upLoadOk = true;
        } else {
            $upLoadOk = false;
        }

        if (!$upLoadOk) {
            $this->redirect("asegurados/create", []);
        } else {
            if (move_uploaded_file($fotoCertificado["tmp_name"], $targetFile)) {
                $this->redirect("asegurados", []);
            }
        }

        $fotoCarnet = $_FILES["fotoCarnet"];
        $urlImages = "public/img/";
        $extension = explode(".", $fotoCarnet["name"]);
        $filename = $extension[sizeof($extension) - 2]; //nombre del archivo
        $ext = $extension[sizeof($extension) - 1];
        $hashCarnet = md5(Date("Ymdi") . $filename) . "." . $ext;
        $targetFile = $urlImages . $hashCarnet;
        $upLoadOk = false;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($fotoCarnet["tmp_name"]);
        if ($check != false) {
            $upLoadOk = true;
        } else {
            $upLoadOk = false;
        }

        if (!$upLoadOk) {
            $this->redirect("asegurados/create", []);
        } else {
            if (move_uploaded_file($fotoCarnet["tmp_name"], $targetFile)) {
                $this->redirect("asegurados", []);
            }
        }

        $asegurado = new AseguradosModel();
        $asegurado->setPlanId($this->getPost("planId"));
        $asegurado->setNombre($this->getPost("nombre"));
        $asegurado->setApellidos($this->getPost("apellidos"));
        $asegurado->setDireccion($this->getPost("direccion"));
        $asegurado->setTelefono($this->getPost("telefono"));
        $asegurado->setFotoCertificadoNacimiento($hashCertificado);
        $asegurado->setFotoCarnetIdentidad($hashCarnet);
        $asegurado->update();
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
    public function eliminar($parametros)
    {
        if ($parametros == null) {
            $this->redirect("dashboard", []);
        }
        $id = $parametros[0];
        $asegurado = new AseguradosModel();
        $aseguradoFoto = $asegurado->get($id);
        $res = $this->model->delete($id);
        if ($res) {

            unlink("public/img/" . $aseguradoFoto->getFotoCarnetIdentidad());
            unlink("public/img/" . $aseguradoFoto->getFotoCertificadoNacimiento());

            $this->redirect("dashboard", []);
        } else {
            $this->redirect("dashboard", []);
        }
    }
    public function editar($parametros)
    {
        if ($parametros == null) {
            $this->redirect("dashboard", []);
        }
        $id = $parametros[0];
        $asegurado = new AseguradosModel();
        $planes = new PlanesModel();

        error_log("Metodo del controller editar: " . $id);

        $this->view->render("asegurados/editar", [
            "user" => $this->user,
            "asegurado" => $asegurado->get($id),
            "planes" => $planes->getAll()
        ]);
    }

    public function aseguradosJSON($parametros)
    {
        $valor = $parametros[0];
        header('Content-Type: application/json');

        $asegurado = new AseguradosModel();
        $json = $asegurado->getWithPlanJson($valor);

        echo json_encode($json);
    }
}
