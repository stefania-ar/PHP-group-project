<?php

class ModelRetiroMaterial
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;' . 'dbname=metodologia_database;charset=utf8', 'root', '');
    //  $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  //obtener pedidos de retiro
  function getPedidosRetiro() 
  {
    $query =$this->db->prepare('SELECT * FROM retiro_materiales');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  //alta
  function insertRetiro($categoria, $iniHorario, $finHorario, $idUsuario, $foto = null, $idCartonero = null)
  {
    //si hay foto
    $rutaFoto = null;
    if ($foto) {
      $rutaFoto = $this->generarRutaImagen($foto);
    }

    $query = $this->db->prepare('INSERT INTO retiro_materiales(foto, categoria,
                                             inicio_horario_retiro, fin_horario_retiro,
                                             id_usuario, DNI_cartonero)
                                 VALUES(?,?,?,?,?,?)');

    $query->execute(array($rutaFoto, $categoria, $iniHorario, $finHorario, $idUsuario, $idCartonero));

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
  function deleteRetiro($id)
  {
    $query = $this->db->prepare('DELETE FROM retiro_materiales WHERE id_retiro=?');
    $query->execute(array($id));
  }

  //modificación
  function updateRetiro($idRetiro, $foto, $categoria, $iniHorario, $finHorario, $idUsuario, $idCartonero)
  {
    $query = $this->db->prepare("UPDATE retiro_materiales SET foto=?, categoria=?, 
        inicio_horario_retiro=?, fin_horario_retiro=?, id_usuario=?, DNI_cartonero=? WHERE id_retiro=?");
    $query->execute(array($foto, $categoria, $iniHorario, $finHorario, $idUsuario, $idCartonero, $idRetiro));
  }

  //obtener usuario mediante datos
  function getIdSolicitud($categoria, $iniHorario, $finHorario, $idUsuario)
  {

    $query = $this->db->prepare('SELECT id_retiro
                                   FROM retiro_materiales
                                   WHERE categoria=?
                                   AND inicio_horario_retiro=?
                                   AND fin_horario_retiro=?
                                   AND id_usuario=?');

    $query->execute(array($categoria, $iniHorario, $finHorario, $idUsuario));

    return  $query->fetch(PDO::FETCH_OBJ);
  }
}
