<?php

require_once './smarty/libs/Smarty.class.php';

class ViewRecoleccionMaterial
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarMensaje($filas, $tipoAlerta, $mensaje){
        
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('filas', $filas);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);

        $this->smarty->display('templates/filtroRecoleccion.tpl');
    }

    function renderResultsRecoleccionPorDNI($filas, $materiales, $cartonero){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('filas', $filas);
        $this->smarty->assign('cartonero', $cartonero);
        $this->smarty->assign('materiales', $materiales);

        $this->smarty->display('templates/listadoMaterialesPorCartonero.tpl');

    }

    function renderResultsRecoleccion($filas){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('filas', $filas);

        $this->smarty->display('templates/filtroRecoleccion.tpl');

    }
    


}
