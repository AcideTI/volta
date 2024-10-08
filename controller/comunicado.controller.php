<?php
date_default_timezone_set('America/Lima');

class ControllerComunicado
{
  //  obtener los alumnos para pagoAlumnos para su comunicado de pago
  public static function ctrGetAllComunicadoPago()
  {
    $tabla = "alumno";
    $listaAlumnos = ModelComunicado::mdlGetAllPagoAlumnos($tabla);
    return $listaAlumnos;
  }
  //datos del alumno para el comunicado de pago
  public static function ctrGetDatosAlumnoComunicado($codAlumno)
  {
    $tabla = "alumno";
    $listaAlumnos = ModelComunicado::mdlGetDatosAlumnoComunicado($tabla, $codAlumno);
    return $listaAlumnos;
  }

  //cronograma de pago para el comunicado de pago
  public static function ctrGetCronogramaPagoComunicado($codCronograma)
  {
    $tabla = "cronograma_pago";
    $datosCronograma = ModelComunicado::mdlGetCronogramaPagoComunicado($tabla, $codCronograma);
    foreach ($datosCronograma as &$data) {
      $idCronograma = $data["idCronogramaPago"];
      //comunciados asociados al cronograma de pago del alumno
      $datosComunicado = ModelComunicado::mdlGetComunicadoPago($tabla, $idCronograma);
      $data['comunicado'] = $datosComunicado;
      $data['estadoCronograma'] = FunctionComunicado::getEstadoComunicadoCrono($data["estadoCronograma"]);
    }
    return $datosCronograma;
  }
  // Registro de comunicado de pago
  public static function ctrRegistrosComunicado($registroComunicado)
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    // acceder a la variable de sesión
    $idUsuario = $_SESSION["idUsuario"];

    $data = $registroComunicado;

    $tabla = "comunicacion_pago";
    $dataComunicadoPago = array(
      "idCronogramaPago" => $data["codComunicado"],
      "fechaCreacion" => date("Y-m-d H:i:s"),
      "usuarioCreacion" => $idUsuario,
    );
    // Registro de comunicado de pago
    $response = ModelComunicado::mdlCrearRegistroComunciadoPago($tabla, $dataComunicadoPago);
    if ($response == "ok") {
      $ultimoRegComunicado = self::ctrUltimoRegistroComunicacionPago();
      $tabla = "detalle_comunicacion_pago";
      $dataDetalleComunicado = array(
        "idComunicacionPago" => $ultimoRegComunicado["idComunicacionPago"],
        "tituloComunicacion" => $data["asuntoComuni"],
        "detalleComunicacion" => $data["comunicado"],
        "fechaComunicacion" => $data["fechaComuni"],
        "fechaCreacion" => date("Y-m-d H:i:s"),
        "usuarioCreacion" => $idUsuario,
      );
      // Registro de detalle de comunicado de pago
      $response = ModelComunicado::mdlCrearRegistroDetalleComunciado($tabla, $dataDetalleComunicado);

      if ($response == "ok") {
        return $response;
      } else {
        return "error";
      }
    } else {
      return "error";
    }
  }
  //obtener el ultimo id de comunicacion_pago registrado
  public static function ctrUltimoRegistroComunicacionPago()
  {
    $tabla = "comunicacion_pago";
    $ultimoRegComunicado = ModelComunicado::mdlUltimoRegistroComunicacionPago($tabla);
    return $ultimoRegComunicado;
  }
  // editar Registro de detalle comunicado de pago
  public static function ctrEditarRegistroComunicado($dataEdit)
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    // acceder a la variable de sesión
    $idUsuario = $_SESSION["idUsuario"];

    $tabla = "detalle_comunicacion_pago";

    $dataEditarComunicado = array(
      "idDetalleComunicacion" => $dataEdit["codComunicadoEdit"],
      "tituloComunicacion" => $dataEdit["tituloComunicado"],
      "detalleComunicacion" => $dataEdit["textoComunicado"],
      "fechaComunicacion" => $dataEdit["fechaComunicado"],
      "fechaActualizacion" => date("Y-m-d H:i:s"),
      "usuarioActualizacion" => $idUsuario,
    );
    $response = ModelComunicado::mdlEditarRegistroDetalleComunciado($tabla, $dataEditarComunicado);
    if ($response == "ok") {
      return $response;
    } else {
      return "error";
    }
  }

  // Borrar Registro de detalle comunicado de pago
  public static function ctrBorrarRegistroComunicado($codComunicadoDetalle, $codComunicado)
  {
    $tabla = "detalle_comunicacion_pago";
    // Borrar Registro de comunicado de pago
    $response = ModelComunicado::mdlBorrarRegistroDetalleComunciado($tabla, $codComunicadoDetalle);
    if ($response == "ok") {
      $tabla = "comunicacion_pago";
      // borrar Registro de detalle de comunicado de pago
      $response = ModelComunicado::mdlBorrarRegistroComunciadoPago($tabla, $codComunicado);

      if ($response == "ok") {
        return $response;
      } else {
        return "error";
      }
    } else {
      return "error";
    }
  }
}
