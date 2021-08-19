<?php

class ModelUsuario
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;' . 'dbname=metodologia_database;charset=utf8', 'root', '');
    //  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  //alta
  function insertUsuario($nombre, $apellido, $telefono, $direccion, $mail = null)
  {
    $query = $this->db->prepare('INSERT INTO usuario(nombre_usuario, apellido_usuario,
        telefono_usuario, direccion_usuario, mail_usuario) VALUES(?,?,?,?,?)');
    $query->execute(array($nombre, $apellido, $telefono, $direccion, $mail));
    return $this->db->lastInsertId();
  }

  //baja
  function deleteUsuario($id)
  {
    $query = $this->db->prepare('DELETE FROM usuario WHERE id_usuario=?');
    $query->execute(array($id));
  }

  //modificación
  function updateUsuario($idUsuario, $nombre, $apellido, $telefono, $direccion, $mail)
  {
    $query = $this->db->prepare("UPDATE usuario SET nombre_usuario=?, apellido_usuario=?, 
        telefono_usuario=?, direccion_usuario=?, mail_usuario=? WHERE id_usuario=?");
    $query->execute(array($nombre, $apellido, $telefono, $direccion, $mail, $idUsuario));
  }

  //obtener usuario mediante datos
  function getIdUser($nombre, $apellido, $direccion)
  {
    $query = $this->db->prepare('SELECT id_usuario
                                 FROM usuario 
                                 WHERE nombre_usuario=?
                                 AND apellido_usuario=?
                                 AND direccion_usuario=?');

    $query->execute(array($nombre, $apellido, $direccion));

    return  $query->fetch(PDO::FETCH_OBJ);
  }
}
