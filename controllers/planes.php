<?php
class Planes extends SessionController
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData();
    }
    public function render()
    {
        $planes = new PlanesModel();
        //error_log("Planes::RENDER() ");
        $this->view->render("planes/index", [
            "user" => $this->user,
            "planes" => $planes->getAll()
        ]);
    }
}
