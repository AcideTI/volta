<?php
//controller
require_once "../controller/reportesComunicados.controller.php";

//model
require_once "../model/reportesComunicados.model.php";

// functions
require_once "../functions/reportesComunicados.functions.php";


class ReportesComunicados
{
  /**
   * Función para mostrar todos los comunicados.
   *
   * @return void
   */
  public function ajaxMostrarTodosLosComunicados()
  {
    $todosLosComunicados = ControllerReportesComunicados::ctrGetAllAlumnosConComunicados();
    foreach ($todosLosComunicados as &$dataPensiones) {
      $dataPensiones['nombreAlumno'] = $dataPensiones["nombresAlumno"] . " " . $dataPensiones["apellidosAlumno"];
      $dataPensiones['dniAlumno'] = $dataPensiones["dniAlumno"];
      $dataPensiones['gradoAlumno'] = $dataPensiones["descripcionGrado"];
      $dataPensiones['nivelAlumno'] = $dataPensiones["descripcionNivel"];
      $dataPensiones['acciones'] = FunctionReportesComunicados::getBotonesOpciones($dataPensiones["idComunicacionPago"], $dataPensiones["idAlumno"]);
    }
    echo json_encode($todosLosComunicados);
  }
}

if (isset($_POST["todosLosComunicados"])) {
  $mostrarTodosLosComunicados = new ReportesComunicados();
  $mostrarTodosLosComunicados->ajaxMostrarTodosLosComunicados();
}
