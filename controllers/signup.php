<?php
class SignUp extends SessionController{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render("login/signup", []);
    }
    function nuevoUsuario(){
        if($this->existPOST(["usuario", "password"])){
            $nombre = $this->getPost("nombre");
            $apellidos = $this->getPost("apellidos");
            $cargo = $this->getPost("cargo");
            $usuario = $this->getPost("usuario");
            $pasword = $this->getPost("password");
            if($usuario == "" || empty($usuario) || $pasword == "" || empty($pasword)){
                $this->redirect("signup", ["error" => "Algun campo esta vacio"]);
            }
            $usuario = new UserModel();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setCargo($cargo);
            $usuario->setUsuario($usuario);
            $usuario->setPassword($pasword);
            
            $usuario->setRol("user");
            if($usuario->exists($usuario)){
                $this->redirect("signup", ["error" => "El nombre de usuario ya existe"]);
            }else if($usuario->save()){
                $this->redirect("", ["success" => "Usuario registrado correctamente"]);
            }else{
                $this->redirect("signup", ["error" => "Error al reistrar nuevo usuario"]);
            }
        }else{
            $this->redirect("signup", ["error" => "Error al reistrar nuevo usuario"]);
        }
    }
}