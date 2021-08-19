<?php
require_once './views/view.php';

class Controller{

    private $view;

    function __construct(){
        $this->view = new View();
    }

    function viewHome(){
        $this->view->mostrarHome();
    }

    function viewMaterial(){
        $this->view->mostrarMateriales();
    }

}