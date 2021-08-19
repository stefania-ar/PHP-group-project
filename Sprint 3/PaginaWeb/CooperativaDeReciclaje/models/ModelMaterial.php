<?php

class ModelMaterial
{
    private $db;

    function __construct()
    {
      $this->db = new PDO('mysql:host=localhost;' . 'dbname=metodologia_database;charset=utf8', 'root', '');
      //  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //alta
    function insertMaterial($nombre, $detalle, $noAceptado, $formaEntrega, $imagenMaterial = null)
    {
      $rutaFoto = null;
    if ($imagenMaterial) {
      $rutaFoto = $this->generarRutaImagen($imagenMaterial);
    }
      $query = $this->db->prepare('INSERT INTO especificacion_materiales(nombre_mat, detalle, no_aceptado,
        forma_entrega, imagen_material) VALUES(?,?,?,?,?)');
      $query->execute(array($nombre, $detalle, $noAceptado, $formaEntrega, $rutaFoto));
      return $this->db->lastInsertId();
    }

     //Alta -> Generar ruta para la imagen
    private function generarRutaImagen($foto)
    {
      $ruta = 'img/temp/' . uniqid() . ".jpg";  //genero ruta
      move_uploaded_file($foto, $ruta);
      return $ruta;
    }
    //baja
    function deleteMaterial($id)
    {
      $query = $this->db->prepare('DELETE FROM especificacion_materiales WHERE id_especificacion=?');
      $query->execute(array($id));
    }

    //modificación
    function updateMaterial($id, $nombre, $detalle, $noAceptado, $formaEntrega, $imagenMaterial = null)
    {
      $rutaFoto = null;
      if ($imagenMaterial) {
        $rutaFoto = $this->generarRutaImagen($imagenMaterial);
      }
      $query = $this->db->prepare("UPDATE especificacion_materiales SET nombre_mat=?, detalle=?,
        no_aceptado=?, forma_entrega=?, imagen_material=? WHERE id_especificacion=?");
      $query->execute(array($nombre, $detalle, $noAceptado, $formaEntrega, $rutaFoto, $id));
    }

    //Obtener todos los materiales
    function getMateriales()
    {
      $query = $this->db->prepare('SELECT * FROM especificacion_materiales');
      $query->execute();
      return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getMaterial($id)
    {
      $query = $this->db->prepare('SELECT * FROM especificacion_materiales WHERE id_especificacion=?');
      $query->execute(array($id));
      return  $query->fetch(PDO::FETCH_OBJ);
    }


}