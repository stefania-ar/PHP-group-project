<?php

require_once './models/ModelRecoleccionMaterial.php';
require_once './views/ViewRecoleccionMaterial.php';
require_once './models/ModelMaterial.php';
require_once './models/ModelCartonero.php';

class ControllerRecoleccionMaterial
{

    private $viewRecoleccion;
    private $modelRecoleccion;
    private $modelMaterial;
    private $modelCartonero;

    function __construct()
    {
        $this->viewRecoleccion = new ViewRecoleccionMaterial();
        $this->modelRecoleccion = new ModelRecoleccionMaterial();
        $this->modelMaterial = new ModelMaterial();
        $this->modelCartonero = new ModelCartonero();
    }

    //alta
    function cargarRecoleccion()
    {
        $cartonero = $_POST['input_recoleccion_dni_cartonero_fk'];
        $material = $_POST['input_recoleccion_id_especificacion_material_fk'];
        $peso = $_POST['input_recoleccion_peso'];
        $fecha = $_POST['input_recoleccion_fecha'];

        if (
            isset($cartonero) && !empty($cartonero) &&
            isset($material) && !empty($material) &&
            isset($peso) && !empty($peso) &&
            isset($fecha) && !empty($fecha)
        ) {
            $recoleccion = $this->modelRecoleccion->getRecoleccion($cartonero, $material, $peso, $fecha);
           
            if ($recoleccion) {
                $materiales = $this->modelRecoleccion->getRecoleccionesMateriales();
                $this->viewRecoleccion->mostrarMensaje($materiales, "danger", "Ya ha registrado esta recolección.");
            } else {
                $insercion = $this->modelRecoleccion->insertarRecoleccion($cartonero, $material, $peso, $fecha);
                if ($insercion) {
                    $materiales = $this->modelRecoleccion->getRecoleccionesMateriales();
                    $this->viewRecoleccion->mostrarMensaje($materiales, "success", "Se registró la recolección en la base de datos.");
                } else {
                    $materiales = $this->modelRecoleccion->getRecoleccionesMateriales();
                    $this->viewRecoleccion->mostrarMensaje($materiales, "danger", "No se pudo registrar la recolección en la base de datos.");
                }
            }
        }
    }

    function buscarRecoleccionesPorDNI()
    {
        $DNI = $_POST['buscarPorDNI'];

        if (isset($DNI) && !empty($DNI)) {

            $filas = $this->modelRecoleccion->getRecoleccionesPorDNI($DNI);
            $materiales = $this->modelMaterial->getMateriales();
            $cartonero = $this->modelCartonero->getCartonero($DNI);
            if($cartonero){
                $this->viewRecoleccion->renderResultsRecoleccionPorDNI($filas, $materiales, $cartonero);
            }
            else{
                $filas = $this->modelRecoleccion->getRecoleccionesMateriales();
                $this->viewRecoleccion->mostrarMensaje($filas, "danger", "No existe el cartonero buscado en la base de datos.");
            }
        }
    }

    function buscarRecolecciones()
    {
        $materiales = $this->modelRecoleccion->getRecoleccionesMateriales();
        $this->viewRecoleccion->renderResultsRecoleccion($materiales);
    }
}
