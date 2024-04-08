<?php
require_once "connection.php";
class ModelComunicado
{
  //  obtener los alumnos para pagoAlumnos para su comunicado de pago
  public static function mdlGetAllPagoAlumnos($tabla)
  {
    $statement = Connection::conn()->prepare("SELECT
      alumno.idAlumno, 
      alumno.codAlumnoCaja, 
      alumno.dniAlumno,
      alumno.nombresAlumno, 
      alumno.apellidosAlumno, 
      alumno.estadoAlumno,
      admision_alumno.idAdmisionAlumno
      FROM
      $tabla
      INNER JOIN
      admision_alumno
      ON 
      alumno.idAlumno = admision_alumno.idAlumno
      WHERE alumno.estadoAlumno IN (1, 2)
      ORDER BY alumno.idAlumno DESC");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  //datos del alumno y apoderado para el comunicado de pago
  public static function mdlGetDatosAlumnoComunicado($tabla, $codAlumno)
  {
    $statement = Connection::conn()->prepare("SELECT
    alumno.nombresAlumno, 
    alumno.apellidosAlumno, 
    alumno.sexoAlumno, 
    alumno.estadoAlumno, 
    alumno.codAlumnoCaja, 
    alumno.dniAlumno, 
    grado.descripcionGrado, 
    nivel.descripcionNivel, 
    apoderado.numeroApoderado,
    apoderado.tipoApoderado,
    apoderado.correoApoderado,
    apoderado.nombreApoderado,
    apoderado.apellidoApoderado,
    apoderado.convivenciaAlumno
    FROM
    $tabla
    INNER JOIN
    alumno_grado
    ON 
    alumno.idAlumno = alumno_grado.idAlumno
    INNER JOIN
    grado
    ON 
    alumno_grado.idGrado = grado.idGrado
    INNER JOIN
    nivel
    ON 
    grado.idNivel = nivel.idNivel
    LEFT JOIN
    apoderado_alumno
    ON 
    alumno.idAlumno = apoderado_alumno.idAlumno
    LEFT JOIN
    apoderado
    ON 
    apoderado_alumno.idApoderado = apoderado.idApoderado
    WHERE alumno_grado.estadoGradoAlumno = 1 AND alumno.idAlumno = :idAlumno
    LIMIT 1");
    $statement->bindParam(":idAlumno", $codAlumno, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  //cronograma de pago para el comunicado de pago $codCronograma = idAdmisionAlumno $tabla = cronograma_pago

  public static function mdlGetCronogramaPagoComunicado($tabla, $codCronograma)
  {
    $statement = Connection::conn()->prepare("
      SELECT 
        cp.idCronogramaPago,
        cp.conceptoPago,
        cp.montoPago,
        cp.mesPago,
        cp.fechaLimite,
        cp.estadoCronograma,
        dcp.idComunicacionPago,
        dcp.tituloComunicacion,
        dcp.detalleComunicacion,
        dcp.fechaComunicacion
      FROM $tabla cp
      LEFT JOIN comunicacion_pago com ON cp.idCronogramaPago = com.idCronogramaPago
      LEFT JOIN detalle_comunicacion_pago dcp ON com.idComunicacionPago = dcp.idComunicacionPago
      WHERE cp.idAdmisionAlumno = :idAdmisionAlumno
      GROUP BY cp.idCronogramaPago
    ");
    $statement->bindParam(":idAdmisionAlumno", $codCronograma, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }


  /* 
CREATE TABLE `comunicacion_pago` (
  `idComunicacionPago` int(11) NOT NULL,
  `idCronogramaPago` int(11) NOT NULL,
) 

CREATE TABLE `detalle_comunicacion_pago` (
  `idDetalleComunicacion` int(11) NOT NULL,
  `idComunicacionPago` int(11) NOT NULL,
  `tituloComunicacion` varchar(100) NOT NULL,
  `detalleComunicacion` varchar(255) NOT NULL,
  `fechaComunicacion` date NOT NULL,
) 
 */

}