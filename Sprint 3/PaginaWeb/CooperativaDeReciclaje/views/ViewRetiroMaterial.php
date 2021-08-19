<?php

require_once './smarty/libs/Smarty.class.php';

class ViewRetiroMaterial {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function mostrarFormularioRetiro($logged) {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/formularioRetiro.tpl');
    }

    function mostrarMensaje($tipoAlerta, $mensaje, $logged) {
        
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('logged', $logged);
        
        $this->smarty->display('templates/formularioRetiro.tpl');
    }

    function mostrarListadoPedidosRetiro($pedidos, $logged) {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('pedidos', $pedidos);
        $this->smarty->assign('logged', $logged);
        
        $this->smarty->display('templates/listadoPedidosRetiro.tpl');
    }

    function homeLocation() {
        header("Location: ".BASE_URL."home");
    }
}
