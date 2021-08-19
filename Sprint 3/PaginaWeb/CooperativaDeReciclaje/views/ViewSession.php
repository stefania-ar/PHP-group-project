<?php
    require_once './smarty/libs/Smarty.class.php';

class ViewSession{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function mostrarFormularioLogin($logged)
    {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/formularioLogin.tpl');
    }

    function mostrarMensaje($tipoAlerta, $mensaje, $logged){
        
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/formularioLogin.tpl');
    }

    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
}