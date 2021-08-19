<?php
require_once './smarty/libs/Smarty.class.php';

class ViewCartonero {
    private $smarty;

    function __construct(){
        $this-> smarty= new Smarty();
    }

    //listado cartoneros
    function showCartoneros($cartoneros, $logged){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('cartoneros', $cartoneros);
        $this->smarty->assign('tipoAlerta', null);

        $this-> smarty->display('templates/listadoCartoneros.tpl');
    }

    //mostrar notificación de tabla de cartoneros vacía
    function mostrarMensaje($cartoneros, $tipoAlerta, $mensaje, $logged){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('cartoneros', $cartoneros);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);

        $this-> smarty->display('templates/listadoCartoneros.tpl');
    }

    function mostrarEdicionCartonero($cartonero, $logged) {
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('cartonero', $cartonero);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/editarCartonero.tpl');
    }

    function mostrarMensajeEdicion($cartonero, $tipoAlerta, $mensaje, $logged){
        
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('cartonero', $cartonero);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('logged', $logged);
       
        $this->smarty->display('templates/editarCartonero.tpl');
    }

    function showLocationCartoneros(){
        header("Location: ".BASE_URL."cartoneros");
    }
    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
}


