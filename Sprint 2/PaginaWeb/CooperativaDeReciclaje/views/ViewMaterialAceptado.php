<?php

require_once './smarty/libs/Smarty.class.php';

class ViewMaterialAceptado
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarMaterialesAceptados($materiales)
    {
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('materiales', $materiales);

        $this->smarty->display('templates/visualizacionMateriales.tpl');
    }

    function mostrarEdicionMaterial($material)
    {
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('material', $material);

        $this->smarty->display('templates/editarMaterial.tpl');
    }

    function mostrarMensaje($materiales, $tipoAlerta, $mensaje){
        
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('materiales', $materiales);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
       
        $this->smarty->display('templates/visualizacionMateriales.tpl');
    }

    function mostrarMensajeEdicion($materiales, $material, $tipoAlerta, $mensaje){
        
        $this->smarty->assign('base_url', BASE_URL);

        $this->smarty->assign('material', $material);
        $this->smarty->assign('materiales', $materiales);
        $this->smarty->assign('tipoAlerta', $tipoAlerta);
        $this->smarty->assign('mensaje', $mensaje);
       
        $this->smarty->display('templates/editarMaterial.tpl');
    }

    function ShowMaterialesAceptados(){
        header("Location: ".BASE_URL."materialesAceptados");
    }
}
