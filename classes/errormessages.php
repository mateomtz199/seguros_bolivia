<?php
class ErrorMessages{
    const ERROR_LOGIN_USUARIO_CONTRASENIA_INCONRRECTO = "bcbe63ed8464684af6945ad8a89f76f8";
    private $errorList = [];
    public function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_LOGIN_USUARIO_CONTRASENIA_INCONRRECTO => "Nombre de usuario y/o password incorrectos",
        ];
    }
    public function get($hash){
        return $this->errorList[$hash];
    }
    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}