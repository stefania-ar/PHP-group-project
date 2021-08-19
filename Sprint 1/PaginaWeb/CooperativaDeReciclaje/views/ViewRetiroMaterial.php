<?php

require_once './smarty/libs/Smarty.class.php';

class ViewRetiroMaterial
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarFormularioRetiro()
    {
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->display('templates/formularioRetiro.tpl');
    }

    function mostrarMensaje($tipoAlerta, $mensaje){
        
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
       
        $this->smarty->display('templates/formularioRetiro.tpl');
    }

    function mostrarListadoPedidosRetiro($pedidos)
    {
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('pedidos', $pedidos);
        $this->smarty->display('templates/listadoPedidosRetiro.tpl');
    }
}
