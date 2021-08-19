<?php
require_once './models/ModelMaterial.php';
require_once './views/view.php';

class ControllerMaterial{

    private $view;
    private $modelMaterial;

    function __construct(){
        $this->view = new View();
        $this->modelMaterial = new ModelMaterial();
    }

    function viewMateriales(){
        $this->view->mostrarMateriales();
    }

}