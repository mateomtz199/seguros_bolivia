<?php
require_once "models/aseguradosmodel.php";
require_once "models/planesmodel.php";
require_once "models/userModel.php";
require_once "models/dependientesmodel.php";
class Dependiente extends SessionController
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
    public function newDependiente()
    {
        if (!$this->existPOST(["nombre", "apellidos", "direccion", "telefono"])) {
            $this->redirect("dashboard", []);
            return;
        }
        if ($this->user == null) {
            $this->redirect("dashboard", []);
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
            $this->redirect("dashboard", []);
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
            $this->redirect("dashboard", []);
        } else {
            if (move_uploaded_file($fotoCarnet["tmp_name"], $targetFile) && move_uploaded_file($fotoCertificado["tmp_name"], $targetFile)) {

                $aseguradoId = $this->getPost("aseguradoId");

                $dependiente = new DependienteModel();
                $dependiente->setAseguradoId($aseguradoId);
                $dependiente->setNombre($this->getPost("nombre"));
                $dependiente->setApellidos($this->getPost("apellidos"));
                $dependiente->setDireccion($this->getPost("direccion"));
                $dependiente->setTelefono($this->getPost("telefono"));
                $dependiente->setFotoCertificadoNacimiento($hashCertificado);
                $dependiente->setFotoCarnetIdentidad($hashCarnet);;
                $dependiente->save();

                $asegurado = new AseguradosModel();
                $dependientes = new DependienteModel();

                $this->view->render("asegurados/ver", [
                    "user" => $this->user,
                    "asegurado" => $asegurado->getWithPlan($aseguradoId),
                    "dependientes" => $dependientes->getPorAsegurado($aseguradoId)
                ]);
            }
        }
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
        $this->redirect("dependiente/ver", []);
    }



    public function crear($parametros)
    {
        if ($parametros == null) {
            $this->redirect("dashboard", ["error" => ErrorMessages::ASEGURADO_COMPLETO_DEPENDIENTES]);
        }
        $id = $parametros[0];
        $asegurado = new AseguradosModel();
        $numero = $asegurado->numeroDependientes($id);
        if ($numero >= 3) {
            $this->redirect("dashboard", []); //Ya no se aceptan más
        } else {
            $this->view->render("dependiente/crear", [
                "user" => $this->user,
                "asegurado" => $asegurado->getWithPlan($id)
            ]);
        }
    }



    public function eliminar($parametros)
    {
        if ($parametros == null) {
            $this->redirect("dashboard", []);
        }
        $id = $parametros[0];

        $dependiente = new DependienteModel();
        $aseguradoId = $dependiente->getIdAsegurado($id);

        $eliminado = $dependiente->get($id);

        $res = $dependiente->delete($id);
        if ($res) {

            unlink("public/img/" . $eliminado->getFotoCarnetIdentidad());
            unlink("public/img/" . $eliminado->getFotoCertificadoNacimiento());

            $asegurado = new AseguradosModel();

            $this->view->render("asegurados/ver", [
                "user" => $this->user,
                "asegurado" => $asegurado->getWithPlan($aseguradoId),
                "dependientes" => $dependiente->getPorAsegurado($aseguradoId)
            ]);
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
    public function ver($parametros)
    {
        if ($parametros == null) {
            $this->redirect("dashboard", []);
        }
        $id = $parametros[0];
        $dependiente = new DependienteModel();
        $aseguradoId = $dependiente->getIdAsegurado($id);
        $asegurado = new AseguradosModel();

        $this->view->render("dependiente/ver", [
            "user" => $this->user,
            "dependiente" => $dependiente->get($id),
            "asegurado" => $asegurado->get($aseguradoId)
        ]);
    }
}
