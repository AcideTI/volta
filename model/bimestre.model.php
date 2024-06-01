<?php
require_once "connection.php";

class ModelBimestre
{

  public static function mdlInsertarBimestre($dataBimestre)
  {
    $stmt = Connection::conn()->prepare("INSERT INTO bimestre (idCursoGrado, descripcionBimestre, estadoBimestre, fechaCreacion, fechaActualizacion, usuarioCreacion, usuarioActualizacion) VALUES (:idCursoGrado, :descripcionBimestre, :estadoBimestre, :fechaCreacion, :fechaActualizacion, :usuarioCreacion, :usuarioActualizacion)");

    $stmt->bindParam(":idCursoGrado", $dataBimestre["idCursoGrado"], PDO::PARAM_INT);
    $stmt->bindParam(":descripcionBimestre", $dataBimestre["descripcionBimestre"], PDO::PARAM_STR);
    $stmt->bindParam(":estadoBimestre", $dataBimestre["estadoBimestre"], PDO::PARAM_INT);
    $stmt->bindParam(":fechaCreacion", $dataBimestre["fechaCreacion"], PDO::PARAM_STR);
    $stmt->bindParam(":fechaActualizacion", $dataBimestre["fechaActualizacion"], PDO::PARAM_STR);
    $stmt->bindParam(":usuarioCreacion", $dataBimestre["usuarioCreacion"], PDO::PARAM_INT);
    $stmt->bindParam(":usuarioActualizacion", $dataBimestre["usuarioActualizacion"], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
  public static function mdlObtenerUltimoIdCreado($idCursoGrado){
    $stmt = Connection::conn()->prepare("SELECT idBimestre FROM bimestre where idCursoGrado = :idCursoGrado");
    $stmt->bindParam(":idCursoGrado", $idCursoGrado, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
// Obtener todos los bimestres
  public static function mdlObtenerTodosLosBimestres($tabla, $idCurso, $idGrado){
    $stmt = Connection::conn()->prepare("SELECT
    bimestre.idBimestre, 
    bimestre.descripcionBimestre
  FROM
    $tabla
    INNER JOIN
    curso_grado
    ON 
      bimestre.idCursoGrado = curso_grado.idCursoGrado
  WHERE
    curso_grado.idCurso = :idCurso AND
    curso_grado.idGrado = :idGrado");
    $stmt->bindParam(":idCurso", $idCurso, PDO::PARAM_INT);
    $stmt->bindParam(":idGrado", $idGrado, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
