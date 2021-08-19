<?php

require_once './models/ModelCartonero.php';
require_once './views/ViewCartonero.php';
require_once 'helper.php';

class ControllerCartonero
{

    private $viewCartonero;
    private $modelCartonero;
    private $helper;

    function __construct()
    {
        $this->viewCartonero = new ViewCartonero();
        $this->modelCartonero = new ModelCartonero();
        $this->helper = new Helper();
    }

    function viewCartoneros()
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $cartoneros = $this->modelCartonero->getCartoneros();
            if($cartoneros){
                $this->viewCartonero->showCartoneros($cartoneros, $logged);
            }
            else{
                $this->viewCartonero->mostrarMensaje($cartoneros, "info", "Aún no existen cartoneros en la base de datos. Puede ingresar un cartonero en el siguiente formulario.", $logged);
            }
        } else {
            $this->viewCartonero->homeLocation();
        }
    }

    function editarCartonero($params = null)
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $id = $params[':ID'];
            $cartonero = $this->modelCartonero->getCartonero($id);
            $this->viewCartonero->mostrarEdicionCartonero($cartonero, $logged);
        } else {
            $this->viewCartonero->homeLocation();
        }
    }
    function updateCartonero()
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $DNI = $_POST['cartonero_DNI'];
            $cartonero = $this->modelCartonero->getCartonero($DNI);
            $nombre = $_POST['cartonero_nombre'];
            $apellido = $_POST['cartonero_apellido'];
            $direccion = $_POST['cartonero_direccion'];
            $fecha_nacimiento = $_POST['cartonero_fecha_nac'];
            $categoria = $_POST['cartonero_categoria'];
            $borrado = $_POST['cartonero_borrado'];
            if (
                isset($nombre) && !empty($nombre) &&
                isset($apellido) && !empty($apellido) &&
                isset($direccion) && !empty($direccion) &&
                isset($fecha_nacimiento) && !empty($fecha_nacimiento) &&
                isset($categoria) && !empty($categoria) &&
                isset($borrado)
            ) {
                $this->modelCartonero->updateCartonero($DNI, $nombre, $apellido, $direccion, $fecha_nacimiento, $categoria, $borrado);
                $this->viewCartonero->showLocationCartoneros();
            } else {
                $this->viewCartonero->mostrarMensajeEdicion($cartonero, "danger", "Complete todos los campos.", $logged);
            }
        } else {
            $this->viewCartonero->homeLocation();
        }
    }

    function insertCartonero()
    {
        $cartoneros = $this->modelCartonero->getCartoneros();

        $logged = $this->helper->checkLoggedIn();
        $time_now = date("Y-m-d");

        if ($logged == true) {
            $nombre = $_POST['cartonero_nombre'];
            $apellido = $_POST['cartonero_apellido'];
            $dni = $_POST['cartonero_dni'];
            $dir = $_POST['cartonero_direccion'];
            $fecha = $_POST['cartonero_fecha'];
            $categoria = $_POST['cartonero_select'];
            if (
                isset($nombre) && !empty($nombre) &&
                isset($apellido) && !empty($apellido) &&
                isset($dni) && !empty($dni) &&
                isset($dir) && !empty($dir) &&
                isset($fecha) && !empty($fecha) &&
                isset($categoria) && !empty($categoria)
            ) {
                if($dni < 999999 || $dni > 100000000){
                    $this->viewCartonero->mostrarMensaje($cartoneros, "danger", "DNI inválido. Ingrese los datos nuevamente", $logged);
                }
                else if($fecha > $time_now){
                    $this->viewCartonero->mostrarMensaje($cartoneros, "danger", "Fecha inválida. Ingrese los datos nuevamente", $logged);
                }
                else{
                    $this->modelCartonero->insertCartonero($nombre, $apellido, $dni, $dir, $fecha, $categoria);
                    $this->viewCartonero->showLocationCartoneros();
                }
            }
            
        } else {
            $this->viewCartonero->homeLocation();
        }
    }

    function borrarCartonero($params = null)
    {
        $logged = $this->helper->checkLoggedIn();
        if ($logged) {
            $dni = $params[":ID"];
            $checkear = $this->modelCartonero->deleteCartonero($dni);
            if ($checkear == 0) {
                $this->modelCartonero->setBorradoCartonero($dni);
            }
            $this->viewCartonero->showLocationCartoneros();
        } else {
            $this->viewCartonero->homeLocation();
        }
    }
}
