<?php
require_once './models/ModelMaterial.php';
require_once './views/ViewMaterialAceptado.php';

class ControllerMaterialAceptado
{

    private $viewMaterialAceptado;
    private $modelMaterialAceptado;

    function __construct()
    {
        $this->viewMaterialAceptado = new ViewMaterialAceptado();
        $this->modelMaterialAceptado = new ModelMaterial();
    }

    function viewMaterialesAceptados()
    {
        $materiales = $this->modelMaterialAceptado->getMateriales();
        $this->viewMaterialAceptado->mostrarMaterialesAceptados($materiales);
    }

    function insertMaterialAceptado()
    {
        $materiales = $this->modelMaterialAceptado->getMateriales();
        $nombre = $_POST['material_nombre'];
        $detalle = $_POST['material_detalle'];
        $noAceptado = $_POST['material_noAceptado'];
        $formaEntrega = $_POST['material_formaEntrega'];
        $imagenMaterial = $_FILES['material_imagen']['tmp_name'];
        if (
            isset($nombre) && !empty($nombre) &&
            isset($detalle) && !empty($detalle) &&
            isset($noAceptado) && !empty($noAceptado) &&
            isset($formaEntrega) && !empty($formaEntrega)
        ){
            if (empty($imagenMaterial)) { //si no hay imagen
                $this->modelMaterialAceptado->insertMaterial($nombre, $detalle, $noAceptado, $formaEntrega);
                $this->viewMaterialAceptado->ShowMaterialesAceptados();
            } else {   //si hay imagen
                
                if ($this->formatoImagenValido($_FILES['material_imagen']['type'])) { //checkeo que el formato sea válido
                    $this->modelMaterialAceptado->insertMaterial($nombre, $detalle, $noAceptado, $formaEntrega, $imagenMaterial);
                    $this->viewMaterialAceptado->ShowMaterialesAceptados();
                } else {
                    $this->viewMaterialAceptado->mostrarMensaje($materiales,"danger","Ingrese una imágen con formato jpg o jpeg o png.");
                }
            }
           
        } else { $this->viewMaterialAceptado->mostrarMensaje($materiales,"danger", "Complete todos los campos."); }
    }
    
  //Alta -> Checkea si la imagen es del tipo correspondiente
  private function formatoImagenValido($tipoImagen)
  {
      if($tipoImagen == "image/jpg" || $tipoImagen == "image/jpeg" || $tipoImagen == "image/png" ) {
          return true;
      }
      else return false;
  }

    function deleteMaterialAceptado($params = null){
        $id_material = $params[":ID"];
        $this->modelMaterialAceptado->deleteMaterial($id_material);
        $this->viewMaterialAceptado->ShowMaterialesAceptados();
    }

    function updateMaterialAceptado(){

        $id = $_POST['material_id'];
        $material = $this->modelMaterialAceptado->getMaterial($id);
        $materiales = $this->modelMaterialAceptado->getMateriales();
        $nombre = $_POST['material_nombre'];
        $detalle = $_POST['material_detalle'];
        $noAceptado = $_POST['material_noAceptado'];
        $formaEntrega = $_POST['material_formaEntrega'];
        $imagenMaterial = $_FILES['material_imagen']['tmp_name'];
        if (
            isset($nombre) && !empty($nombre) &&
            isset($detalle) && !empty($detalle) &&
            isset($noAceptado) && !empty($noAceptado) &&
            isset($formaEntrega) && !empty($formaEntrega)
        ){
            if (empty($imagenMaterial)) { //si no hay imagen
                $this->modelMaterialAceptado->updateMaterial($id, $nombre, $detalle, $noAceptado, $formaEntrega);
                $this->viewMaterialAceptado->ShowMaterialesAceptados();
            } else {   //si hay imagen
                
                if ($this->formatoImagenValido($_FILES['material_imagen']['type'])) { //checkeo que el formato sea válido
                    $this->modelMaterialAceptado->updateMaterial($id, $nombre, $detalle, $noAceptado, $formaEntrega, $imagenMaterial);
                    $this->viewMaterialAceptado->ShowMaterialesAceptados();
                } else {
                    $this->viewMaterialAceptado->mostrarMensajeEdicion($materiales, $material, "danger","Ingrese una imágen con formato jpg o jpeg o png.");
                }
            }
        } else {
            $materiales = $this->modelMaterialAceptado->getMateriales(); 
            $this->viewMaterialAceptado->mostrarMensajeEdicion($materiales, $material,"danger", "Complete todos los campos."); 
        }
    } 

    function editarMaterialAceptado($params = null)
    {
        $id = $params[':ID'];
        $material = $this->modelMaterialAceptado->getMaterial($id);
        $this->viewMaterialAceptado->mostrarEdicionMaterial($material);
    }
}
