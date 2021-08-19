<?php

require_once './models/ModelRecoleccionMaterial.php';
require_once './views/ViewRecoleccionMaterial.php';
require_once './models/ModelMaterial.php';
require_once './models/ModelCartonero.php';
require_once './views/ViewCartonero.php';
require_once 'helper.php';

class ControllerRecoleccionMaterial
{

    private $viewRecoleccion;
    private $modelRecoleccion;
    private $modelMaterial;
    private $modelCartonero;
    private $viewCartonero;
    private $helper;

    function __construct()
    {
        $this->viewRecoleccion = new ViewRecoleccionMaterial();
        $this->modelRecoleccion = new ModelRecoleccionMaterial();
        $this->modelMaterial = new ModelMaterial();
        $this->modelCartonero = new ModelCartonero();
        $this->viewCartonero = new ViewCartonero();
        $this->helper = new Helper();
    }

    //alta
    function cargarRecoleccion()
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $cartonero = $_POST['input_recoleccion_dni_cartonero_fk'];
            $material = $_POST['input_recoleccion_material'];
            $peso = $_POST['input_recoleccion_peso'];
            $fecha = $_POST['input_recoleccion_fecha'];

            if (
                isset($cartonero) && !empty($cartonero) &&
                isset($material) && !empty($material) &&
                isset($peso) && !empty($peso) &&
                isset($fecha) && !empty($fecha)
            ) {
                $recoleccion = $this->modelRecoleccion->getRecoleccion($cartonero, $material, $peso, $fecha);
                $cartoneros = $this->modelCartonero->getCartoneros();
                if ($recoleccion) {
                    $this->viewRecoleccion->mostrarMensaje($cartoneros, "danger", "Ya ha registrado esta recolección.", $logged);
                } else {
                    $insercion = $this->modelRecoleccion->insertarRecoleccion($cartonero, $material, $peso, $fecha);
                    if ($insercion) {
                        $this->viewRecoleccion->mostrarMensaje($cartoneros, "success", "Se registró la recolección en la base de datos.", $logged);
                    } else {
                        $this->viewRecoleccion->mostrarMensaje($cartoneros, "danger", "No se pudo registrar la recolección en la base de datos.", $logged);
                    }
                }
            }
        } else {
            $this->viewRecoleccion->homeLocation();
        }
    }

    function buscarRecoleccionesPorDNI()
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $DNI = $_POST['buscarPorDNI'];

            if (isset($DNI) && !empty($DNI)) {

                $recolecciones = $this->modelRecoleccion->getRecoleccionesPorDNI($DNI);
                $materiales = $this->modelMaterial->getMateriales();
                $cartonero = $this->modelCartonero->getCartonero($DNI);
                if($cartonero){ //existe el cartonero en la base de datos
                    //es un cartonero activo en la cooperativa
                    if ($cartonero && $cartonero->borrado == false) {
                        $this->viewRecoleccion->renderResultsRecoleccionPorDNI($recolecciones, $materiales, $cartonero, $logged);
                    }
                    else{//es un cartonero que no está activo actualmente
                        $cartoneros = $this->modelCartonero->getCartoneros();
                        $this->viewRecoleccion->mostrarMensaje($cartoneros, "info", "El cartonero se encuentra inactivo en la cooperativa. Ingrese a la sección de edición para habilitarlo nuevamente", $logged);
                    }
                }else { //no existe el cartonero
                    $cartoneros = $this->modelCartonero->getCartoneros();
                    $this->viewCartonero->mostrarMensaje($cartoneros, "danger", "No existe el cartonero buscado en la base de datos. Debe registrarlo antes de ingresar su recolección.", $logged);
                }
            }
        } else {
            $this->viewRecoleccion->homeLocation();
        }
    }

    function buscarRecolecciones()
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $cartoneros = $this->modelCartonero->getCartoneros();
            $this->viewRecoleccion->renderResultsRecoleccion($cartoneros, $logged);
        } else {
            $this->viewRecoleccion->homeLocation();
        }
    }

    function viewMaterialesAcopiados()
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $cartoneros = $this->modelRecoleccion->getDNIsCartoneros();
            if ($cartoneros) {
                $materiales = $this->modelRecoleccion->getMaterialesPorCartonero();
                $this->viewRecoleccion->renderMaterialesPorCartonero($materiales, $cartoneros, $logged);
            } else {
                $this->viewRecoleccion->mostrarMensajeResumen("info", "Aún no se ha cargado información sobre las recolecciones.", $logged);
            }
        } else {
            $this->viewRecoleccion->homeLocation();
        }
    }
}
