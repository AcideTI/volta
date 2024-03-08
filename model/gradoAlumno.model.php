<?php
require_once "connection.php";

class ModelGradoAlumno
{
  //  Asignar grado a alumno
  public static function mdlAsignarGradoAlumno($tabla, $dataAlumnoGrado)
  {
    $statement = Connection::conn()->prepare("INSERT INTO $tabla (idAlumno, idGrado, estadoGradoAlumno, fechaCreacion, fechaActualizacion, usuarioCreacion, usuarioActualizacion) VALUES (:idAlumno, :idGrado, :estadoGradoAlumno, :fechaCreacion, :fechaActualizacion, :usuarioCreacion, :usuarioActualizacion)");
    $statement->bindParam(":idAlumno", $dataAlumnoGrado["idAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":idGrado", $dataAlumnoGrado["idGrado"], PDO::PARAM_INT);
    $statement->bindParam(":estadoGradoAlumno", $dataAlumnoGrado["estadoGradoAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":fechaCreacion", $dataAlumnoGrado["fechaCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":fechaActualizacion", $dataAlumnoGrado["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioCreacion", $dataAlumnoGrado["usuarioCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioActualizacion", $dataAlumnoGrado["usuarioActualizacion"], PDO::PARAM_STR);

    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
  //  crear Grado admision de postulante-alumno
  public static function mdlCrearGradoAlumnoAdmision($tabla, $dataGradoAlumnoAdmision)
  {
    $statement = Connection::conn()->prepare("INSERT INTO $tabla (idAlumno, idGrado, estadoGradoAlumno, fechaCreacion, fechaActualizacion, usuarioCreacion, usuarioActualizacion) VALUES (:idAlumno, :idGrado, :estadoGradoAlumno, :fechaCreacion, :fechaActualizacion, :usuarioCreacion, :usuarioActualizacion)");
    $statement->bindParam(":idAlumno", $dataGradoAlumnoAdmision["idAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":idGrado", $dataGradoAlumnoAdmision["idGrado"], PDO::PARAM_INT);
    $statement->bindParam(":estadoGradoAlumno", $dataGradoAlumnoAdmision["estadoGradoAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":fechaCreacion", $dataGradoAlumnoAdmision["fechaCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":fechaActualizacion", $dataGradoAlumnoAdmision["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioCreacion", $dataGradoAlumnoAdmision["usuarioCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioActualizacion", $dataGradoAlumnoAdmision["usuarioActualizacion"], PDO::PARAM_STR);

    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
}