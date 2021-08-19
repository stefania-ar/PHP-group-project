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
    function insertMaterial($nombre, $detalle)
    {
      $query = $this->db->prepare('INSERT INTO especificacion_materiales(nombre_mat, detalle) VALUES(?,?)');
      $query->execute(array($nombre, $detalle));
      return $this->db->lastInsertId();
    }

    //baja
    function deleteMaterial($id)
    {
      $query = $this->db->prepare('DELETE FROM especificacion_materiales WHERE id_especificacion=?');
      $query->execute(array($id));
    }

    //modificación
    function updateMaterial($id, $nombre, $detalle)
    {
      $query = $this->db->prepare("UPDATE especificacion_materiales SET nombre_mat=?, detalle=? WHERE id_especificacion=?");
      $query->execute(array($nombre, $detalle, $id));
    }
}