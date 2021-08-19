<?php

class ModelOfertaTransporte
{
    private $db;

    function __construct()
    {
      $this->db = new PDO('mysql:host=localhost;' . 'dbname=metodologia_database;charset=utf8', 'root', '');
      //  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
 
    //alta
    function insertOferta($textoLibre, $espacioDisp, $idUsuario)
    {
      $query = $this->db->prepare('INSERT INTO oferta_transporte(texto_libre, espacio_disp, id_usuario) VALUES(?,?,?)');
      $query->execute(array($textoLibre, $espacioDisp, $idUsuario));
      return $this->db->lastInsertId();
    }

    //baja
    function deleteOferta($id)
    {
      $query = $this->db->prepare('DELETE FROM oferta_transporte WHERE id_oferta=?');
      $query->execute(array($id));
    }

    //modificación
    function updateOferta($idOferta, $textoLibre, $espacioDisp, $idUsuario)
    {
      $query = $this->db->prepare("UPDATE oferta_transporte SET texto_libre=?, espacio_disp=?,
       id_usuario=? WHERE id_oferta=?");
      $query->execute(array($textoLibre, $espacioDisp, $idUsuario, $idOferta));
    }
}