<?php
class Login extends SessionController{
    function __construct()
    {
        parent::__construct();
        error_log("Inicio de login");
    }
    function render(){
        $this->view->render("login/index");
    }
}