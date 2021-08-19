<?php
require_once './models/ModelOfertaTransporte.php';

require_once './views/view.php';

class ControllerOfertaTransporte
{

    private $view;
    private $modelOfertaTransporte;

    function __construct()
    {
        $this->view = new View();
        $this->modelOfertaTransporte = new ModelOfertaTransporte();
    }

}