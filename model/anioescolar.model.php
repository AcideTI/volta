<?php
require_once "connection.php";

class ModelAnioEscolar
{
  //  Crear nuevo Año Escolar
  public static function mdlCrearAnioEscolar($tabla, $datosAnioEscolar)
  {
    $statement = Connection::conn()->prepare("INSERT INTO $tabla (descripcionAnio, estadoAnio, cuotaInicial, matriculaInicial, pensionInicial, matriculaPrimaria, pensionPrimaria, matriculaSecundaria, pensionSecundaria, fechaCreacion, fechaActualizacion, usuarioCreacion, usuarioActualizacion) VALUES (:descripcionAnio, :estadoAnio, :cuotaInicial, :matriculaInicial, :pensionInicial, :matriculaPrimaria, :pensionPrimaria, :matriculaSecundaria, :pensionSecundaria, :fechaCreacion, :fechaActualizacion, :usuarioCreacion, :usuarioActualizacion)");
    $statement->bindParam(":descripcionAnio", $datosAnioEscolar["descripcionAnio"], PDO::PARAM_STR);
    $statement->bindParam(":estadoAnio", $datosAnioEscolar["estadoAnio"], PDO::PARAM_STR);
    $statement->bindParam(":cuotaInicial", $datosAnioEscolar["cuotaInicial"], PDO::PARAM_STR);
    $statement->bindParam(":matriculaInicial", $datosAnioEscolar["matriculaInicial"], PDO::PARAM_STR);
    $statement->bindParam(":pensionInicial", $datosAnioEscolar["pensionInicial"], PDO::PARAM_STR);
    $statement->bindParam(":matriculaPrimaria", $datosAnioEscolar["matriculaPrimaria"], PDO::PARAM_STR);
    $statement->bindParam(":pensionPrimaria", $datosAnioEscolar["pensionPrimaria"], PDO::PARAM_STR);
    $statement->bindParam(":matriculaSecundaria", $datosAnioEscolar["matriculaSecundaria"], PDO::PARAM_STR);
    $statement->bindParam(":pensionSecundaria", $datosAnioEscolar["pensionSecundaria"], PDO::PARAM_STR);
    $statement->bindParam(":fechaCreacion", $datosAnioEscolar["fechaCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":fechaActualizacion", $datosAnioEscolar["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioCreacion", $datosAnioEscolar["usuarioCreacion"], PDO::PARAM_INT);
    $statement->bindParam(":usuarioActualizacion", $datosAnioEscolar["usuarioActualizacion"], PDO::PARAM_INT);

    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
  //  Obtener el anio escolar por el estado activo = 1
  public static function mdlGetAnioEscolarEstadoActivo($table, $estadoAnio)
  {
    $statement = Connection::conn()->prepare("SELECT idAnioEscolar FROM $table WHERE estadoAnio = :estadoAnio");
    $statement->bindParam(":estadoAnio", $estadoAnio, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchColumn();
  }

  //  Obtener datos del anio escolar

  public static function mdlGetAnioEscolarActivo($table)
  {
    $activoAnio = 1;
    $statement = Connection::conn()->prepare("SELECT *
    FROM $table WHERE estadoAnio = $activoAnio");
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  //  Otener todos los años escolares
  public static function mdlGetTodosAniosEscolar($table)
  {
    $statement = Connection::conn()->prepare("SELECT idAnioEscolar, descripcionAnio, estadoAnio, cuotaInicial FROM $table ORDER BY descripcionAnio DESC");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  //  Obtener un año escolar para luego editarlo
  public static function mdlBuscarAnioEscolar($table, $codAnio)
  {
    $statement = Connection::conn()->prepare("SELECT idAnioEscolar, descripcionAnio, estadoAnio, cuotaInicial, matriculaInicial, pensionInicial, matriculaPrimaria, pensionPrimaria, matriculaSecundaria, pensionSecundaria FROM $table WHERE idAnioEscolar = :idAnioEscolar");
    $statement->bindParam(":idAnioEscolar", $codAnio, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  //  Editar un año escolar existente
  public static function mdlEditarAnioEscolar($tabla, $datosEditarAnio)
  {
    $statement = Connection::conn()->prepare("UPDATE $tabla SET descripcionAnio = :descripcionAnio, cuotaInicial = :cuotaInicial, matriculaInicial = :matriculaInicial, pensionInicial = :pensionInicial, matriculaPrimaria = :matriculaPrimaria, pensionPrimaria = :pensionPrimaria, matriculaSecundaria = :matriculaSecundaria, pensionSecundaria = :pensionSecundaria, fechaActualizacion = :fechaActualizacion, usuarioActualizacion = :usuarioActualizacion WHERE idAnioEscolar = :idAnioEscolar");
    $statement->bindParam(":idAnioEscolar", $datosEditarAnio["idAnioEscolar"], PDO::PARAM_INT);
    $statement->bindParam(":descripcionAnio", $datosEditarAnio["descripcionAnio"], PDO::PARAM_STR);
    $statement->bindParam(":cuotaInicial", $datosEditarAnio["cuotaInicial"], PDO::PARAM_STR);
    $statement->bindParam(":matriculaInicial", $datosEditarAnio["matriculaInicial"], PDO::PARAM_STR);
    $statement->bindParam(":pensionInicial", $datosEditarAnio["pensionInicial"], PDO::PARAM_STR);
    $statement->bindParam(":matriculaPrimaria", $datosEditarAnio["matriculaPrimaria"], PDO::PARAM_STR);
    $statement->bindParam(":pensionPrimaria", $datosEditarAnio["pensionPrimaria"], PDO::PARAM_STR);
    $statement->bindParam(":matriculaSecundaria", $datosEditarAnio["matriculaSecundaria"], PDO::PARAM_STR);
    $statement->bindParam(":pensionSecundaria", $datosEditarAnio["pensionSecundaria"], PDO::PARAM_STR);
    $statement->bindParam(":fechaActualizacion", $datosEditarAnio["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioActualizacion", $datosEditarAnio["usuarioActualizacion"], PDO::PARAM_STR);

    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }

  //  Activar o desactivar el año escolar
  public static function mdlActivarAnioEscolar($tabla, $datosActivarAnio)
  {
    $statement = Connection::conn()->prepare("UPDATE $tabla SET estadoAnio = :estadoAnio, fechaActualizacion = :fechaActualizacion, usuarioActualizacion = :usuarioActualizacion WHERE idAnioEscolar = :idAnioEscolar");
    $statement->bindParam(":idAnioEscolar", $datosActivarAnio["idAnioEscolar"], PDO::PARAM_INT);
    $statement->bindParam(":estadoAnio", $datosActivarAnio["estadoAnio"], PDO::PARAM_INT);
    $statement->bindParam(":fechaActualizacion", $datosActivarAnio["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioActualizacion", $datosActivarAnio["usuarioActualizacion"], PDO::PARAM_STR);

    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }

  //  Verificar el uso del año escolar en las tablas de la base de datos
  public static function mdlVerificarUsoAnioEscolar($codAnio)
  {
    $statement = Connection::conn()->prepare("SELECT COALESCE((SELECT 1 FROM anio_admision WHERE idAnioEscolar = :idAnioEscolar LIMIT 1), 0) AS existencia");
    $statement->bindParam(":idAnioEscolar", $codAnio, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  //  Eliminar un año escolar
  public static function mdlEliminarAnioEscolar($tabla, $codAnio)
  {
    $statement = Connection::conn()->prepare("DELETE FROM $tabla WHERE idAnioEscolar = :idAnioEscolar");
    $statement->bindParam(":idAnioEscolar", $codAnio, PDO::PARAM_INT);
    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
  /**
   * Obtener el nivel de educacion
   * 
   * @param int $idNivelEducacion
   * @return string
   */
  public static function mdlGetNivelEducacion($table, $idNivelEducacion)
  {
    $statement = Connection::conn()->prepare("SELECT descripcionNivel FROM $table WHERE idNivel = :idNivel");
    $statement->bindParam(":idNivel", $idNivelEducacion, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchColumn();
  }
}
