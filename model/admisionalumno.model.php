<?php
require_once "connection.php";

class ModelAdmisionAlumno
{
  //todos los registros de admision
  public static function mdlGetAdmisionAlumnos($tabla)
  {
    $statement = Connection::conn()->prepare("SELECT adal.idAdmisionAlumno, 
    al.dniAlumno,
    al.apellidosAlumno,
    al.nombresAlumno, 
    ad.tipoAdmision,
    ad.fechaAdmision,
    adal.estadoAdmisionAlumno
/*     al.estadoAlumno, 
    al.estadoSiagie, 
    al.estadoMatricula, 
    al.codAlumnoCaja, 
    al.fechaIngresoVolta  */     
    FROM $tabla adal
    INNER JOIN admision ad ON adal.idAdmision = ad.idAdmision
    INNER JOIN alumno al ON adal.idAlumno = al.idAlumno;");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  //Obtener el data de anio escolar para el cronograma de pago se obtiene solo el año activo que es de valor de estado 1
  public static function mdlGetDataAnioEscolar($tabla)
  {
    $statement = Connection::conn()->prepare("SELECT costoMatricula, costoPension
    FROM $tabla
    WHERE estadoAnio = 1");
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  // Actualizar estado admision_alumno y crear registro en cronograma_pago 
  public static function mdlCrearCronogramaPago($tabla, $dataAdmisionCronoPago)
  {
    $statement = Connection::conn()->prepare("INSERT INTO $tabla (idAdmisionAlumno, conceptoPago, montoPago, fechaLimite, estadoCronograma, mesPago, fechaCreacion, fechaActualizacion, usuarioCreacion, usuarioActualizacion) VALUES (:idAdmisionAlumno, :conceptoPago, :montoPago, :fechaLimite, :estadoCronograma,:mesPago,:fechaCreacion, :fechaActualizacion, :usuarioCreacion, :usuarioActualizacion)");
    $statement->bindParam(":idAdmisionAlumno", $dataAdmisionCronoPago["idAdmisionAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":conceptoPago", $dataAdmisionCronoPago["conceptoPago"], PDO::PARAM_STR);
    $statement->bindParam(":montoPago", $dataAdmisionCronoPago["montoPago"], PDO::PARAM_STR);
    $statement->bindParam(":fechaLimite", $dataAdmisionCronoPago["fechaLimite"], PDO::PARAM_STR);
    $statement->bindParam(":estadoCronograma", $dataAdmisionCronoPago["estadoCronograma"], PDO::PARAM_INT);
    $statement->bindParam(":mesPago", $dataAdmisionCronoPago["mesPago"], PDO::PARAM_STR);
    $statement->bindParam(":fechaCreacion", $dataAdmisionCronoPago["fechaCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":fechaActualizacion", $dataAdmisionCronoPago["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioCreacion", $dataAdmisionCronoPago["usuarioCreacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioActualizacion", $dataAdmisionCronoPago["usuarioActualizacion"], PDO::PARAM_STR);

    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
  // Actualizar estado admision_alumno
  public static function mdlActualizarestadoAdmisionAlumno($table, $data)
  {
    $statement = Connection::conn()->prepare("UPDATE $table SET estadoAdmisionAlumno = :estadoAdmisionAlumno, fechaActualizacion = :fechaActualizacion, usuarioActualizacion = :usuarioActualizacion WHERE idAdmisionAlumno = :idAdmisionAlumno");
    $statement->bindParam(":estadoAdmisionAlumno", $data["estadoAdmisionAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":idAdmisionAlumno", $data["idAdmisionAlumno"], PDO::PARAM_INT);
    $statement->bindParam(":fechaActualizacion", $data["fechaActualizacion"], PDO::PARAM_STR);
    $statement->bindParam(":usuarioActualizacion", $data["usuarioActualizacion"], PDO::PARAM_INT);
    if ($statement->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
  // ver calendario cronograma pago de la tabla  admision_alumno
  public static function mdlDataCronoPagoAdAlumEstado($table, $codAdAlumCalendario)
  {
    $statement = Connection::conn()->prepare("SELECT conceptoPago, montoPago, fechaLimite, estadoCronograma, mesPago
      FROM $table WHERE idAdmisionAlumno = :idAdmisionAlumno");
    $statement->bindParam(":idAdmisionAlumno", $codAdAlumCalendario, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}