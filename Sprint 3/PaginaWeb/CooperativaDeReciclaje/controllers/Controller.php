<?php
require_once './views/view.php';
require_once 'helper.php';

class Controller{

    private $view;
    private $helper;

    function __construct(){
        $this->view = new View();
        $this->helper = new Helper();
    }

    function viewHome(){
        $logged = $this->helper->checkLoggedIn();
        $this->view->mostrarHome($logged);
    }

    function viewMaterial(){
        $logged = $this->helper->checkLoggedIn();
        $this->view->mostrarMateriales($logged);
    }

}