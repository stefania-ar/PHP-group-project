<?php
    require_once './smarty/libs/Smarty.class.php';
class View{
    private $titulo;
    private $smarty;
    function __construct(){
        $this->titulo = "";
        $this->smarty = new Smarty();
    }

    function mostrarHome(){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);

        $this->smarty->display('templates/home.tpl');
    }

    function mostrarMateriales(){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);

        $this->smarty->display('templates/materiales.tpl');
    }
    
    function mostrarError($mensaje){
        echo "$mensaje";
    }

    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
}