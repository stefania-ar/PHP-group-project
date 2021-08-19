<?php
require_once './models/ModelSession.php';

require_once './views/view.php';

class ControllerSession
{

    private $view;
    private $modelSession;

    function __construct()
    {
        $this->view = new View();
        $this->modelSession = new ModelSession();
    }

}