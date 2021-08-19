<?php

class ModelCartonero
{
    private $db;

    function __construct()
    {
      $this->db = new PDO('mysql:host=localhost;' . 'dbname=metodologia_database;charset=utf8', 'root', '');
      //  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
 
    //alta
    function insertCartonero($nombre, $apellido, $dni, $dir, $fecha, $categoria)
    {
      $query = $this->db->prepare('INSERT INTO cartonero(nombre_cartonero, apellido_cartonero, DNI_cartonero,
      direccion_cartonero, fecha_nac_cartonero, categoria) VALUES(?,?,?,?,?,?)');
      $query->execute(array($nombre, $apellido, $dni, $dir, $fecha, $categoria));
      return $this->db->lastInsertId();
    }
    
    //baja
    function deleteCartonero($id)
    {
      $query = $this->db->prepare('DELETE FROM cartonero WHERE DNI_cartonero=?');
      $query->execute(array($id));

      return $query->rowCount();
    }

    // set borrado
    function setBorradoCartonero($id){
      $borrado = 1; // 1 == true
      $query = $this->db->prepare('UPDATE cartonero SET borrado=? WHERE DNI_cartonero=?');
      $query->execute(array($borrado, $id));
    }

    //modificación
    function updateCartonero($id, $nombre, $apellido, $direccion, $fecha_nac, $categoria, $borrado)
    {
      $query = $this->db->prepare("UPDATE cartonero SET nombre_cartonero=?, apellido_cartonero=?, 
        direccion_cartonero=?, fecha_nac_cartonero=?, categoria=?, borrado=? WHERE DNI_cartonero=?");
      $query->execute(array($nombre, $apellido, $direccion, $fecha_nac, $categoria, $borrado, $id));
    }

    //obtener cartonero por ID
    function getCartonero($id)
    {
      $query = $this->db->prepare('SELECT * FROM cartonero WHERE DNI_cartonero=?');
      $query->execute(array($id));
      return  $query->fetch(PDO::FETCH_OBJ);
    }

    //obtener todos los registros de la tabla cartonero
    function getCartoneros()
    {
      $query = $this->db->prepare('SELECT * FROM cartonero');
      $query->execute();
      return  $query->fetchAll(PDO::FETCH_OBJ);
    }

}