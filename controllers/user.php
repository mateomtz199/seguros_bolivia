<?php
class User extends SessionController
{
    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    function render()
    {
        $this->view->render("user/index", [
            "user" => $this->user
        ]);
    }
}
