<?php

require_once './smarty/libs/Smarty.class.php';

class ViewRecoleccionMaterial
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarMensaje($filas, $tipoAlerta, $mensaje, $logged){
        
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('filas', $filas);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/filtroRecoleccion.tpl');
    }

    function renderResultsRecoleccionPorDNI($filas, $materiales, $cartonero, $logged){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('filas', $filas);
        $this->smarty->assign('cartonero', $cartonero);
        $this->smarty->assign('materiales', $materiales);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/listadoMaterialesPorCartonero.tpl');
    }

    function renderResultsRecoleccion($filas, $logged){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('filas', $filas);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/filtroRecoleccion.tpl');
    }
    
    function renderMaterialesPorCartonero($materiales, $cartoneros, $logged){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('materiales', $materiales);
        $this->smarty->assign('cartoneros', $cartoneros);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('mensaje', null);
        
        $this->smarty->display('templates/materialesPorCartonero.tpl');
    }

    function mostrarMensajeResumen($tipoAlerta, $mensaje, $logged){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('logged', $logged);

        $this->smarty->display('templates/materialesPorCartonero.tpl');
    }

    function homeLocation(){
        header("Location: ".BASE_URL."home");
    }
}
