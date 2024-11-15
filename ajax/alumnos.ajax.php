<?php

require_once "../controller/alumnos.controller.php";
require_once "../model/alumnos.model.php";
require_once "../functions/alumnos.functions.php";
require_once "../controller/usuarios.controller.php";
require_once "../model/usuarios.model.php";
require_once "../controller/admisionalumno.controller.php";
require_once "../model/admisionalumno.model.php";
require_once "../functions/cursosDocente.functions.php";

class AlumnosAjax
{
  //mostar todos los Alumno DataTableAlumnosAdmin
  public function ajaxMostrarTodosLosAlumnosAdmin()
  {
    $todosLosAlumnosAdmin = ControllerAlumnos::ctrGetAlumnos();
    foreach ($todosLosAlumnosAdmin as &$alumno) {
      $alumno['stateAlumno'] = FunctionAlumnos::getEstadosAlumnos($alumno["estadoAdmisionAlumno"]);
      $alumno['buttonsAlumno'] = FunctionAlumnos::getBotonesAlumnos($alumno["idAlumno"], $alumno["estadoAdmisionAlumno"]);
    }
    echo json_encode($todosLosAlumnosAdmin);
  }

  /**
   * Método para mostrar todos los alumnos de un año escolar mediante una petición AJAX.
   * 
   * @param int $idAnioEscolar Identificador del año escolar.
   * @return string JSON con los datos de los alumnos.
   */
  public function ajaxMostrarTodosLosAlumnosAnioEscolar($idAnioEscolar)
  {
    // Verificar si el año escolar es 0 para mostrar todos los alumnos.
    if ($idAnioEscolar == 0){
      $response = ControllerAlumnos::ctrGetAlumnos();
      foreach ($response as &$dataAlumno) {
        $dataAlumno['stateAlumno'] = FunctionAlumnos::getEstadosAlumnos($dataAlumno["estadoAdmisionAlumno"]);
        $dataAlumno['buttonsAlumno'] = FunctionAlumnos::getBotonesAlumnos($dataAlumno["idAlumno"], $dataAlumno["estadoAdmisionAlumno"]);
      }
      echo json_encode($response);
    } else{
      $response = ControllerAlumnos::ctrGetAlumnosAnioEscolar($idAnioEscolar);
      foreach ($response as &$dataAlumno) {
        $estadoAdmisionAlumno = ControllerAlumnos::ctrGetEstadoAdmisionAlumnoAnioEscolar($dataAlumno["idAdmisionAlumno"]);
        $dataAlumno['stateAlumno'] = FunctionAlumnos::getEstadosAlumnos($estadoAdmisionAlumno);
        $dataAlumno['buttonsAlumno'] = FunctionAlumnos::getBotonesAlumnos($dataAlumno["idAlumno"], $estadoAdmisionAlumno);
      }
      echo json_encode($response);
    }
  }


  //  Obtener los datos del alumno para visualizar
  public $codAlumnoVisualizar;
  public function ajaxMostrarDatosAlumno()
  {
    $datosAlumno = ControllerAlumnos::ctrMostrarDatosAlumno($this->codAlumnoVisualizar);
    /* $datosAlumno['estadoMatricula'] = FunctionAlumnos::getEstadosmatricula($datosAlumno["estadoMatricula"]); */
    $datosAlumno['estadoSiagie'] = FunctionAlumnos::getEstadoSiagie($datosAlumno["estadoSiagie"]);
    // Verificar cada identificador de los datos del alumno
    array_walk($datosAlumno, function (&$value) {
      if (is_null($value) || $value === '') {
        $value = 'Sin registro';
      }
    });
    echo json_encode($datosAlumno);
  }
  //  Obtener los datos del alumno para realizar el pago
  public $codAlumnoPago;
  public function ajaxMostrarDatosAlumnoPago()
  {
    $codAlumnoPago = $this->codAlumnoPago;
    $response = ControllerAlumnos::ctrGetDataAlumnoPago($codAlumnoPago);
    echo json_encode($response);
  }
  //  Cambiar estado del alumno
  public $cambiarEstadoAlumno;
  public $codAlumnoEstado;
  public function ajaxCambiarEstadoAlumno()
  {
    $cambiarEstadoAlumno = $this->cambiarEstadoAlumno;
    $codAlumnoEstado = $this->codAlumnoEstado;
    $response = ControllerAlumnos::ctrCambiarEstadoAlumno($codAlumnoEstado, $cambiarEstadoAlumno);
    echo json_encode($response);
  }
  /**
   * Método para mostrar todos los alumnos de un curso mediante una petición AJAX.
   */
  public function ajaxMostrarTodosLosAlumnosCurso($data)
  {
    $data = json_decode($data, true);
    $todosLosAlumnosCurso = ControllerAlumnos::ctrGetAlumnosCurso($data["idCurso"], $data["idGrado"], $data["idPersonal"]);
    foreach ($todosLosAlumnosCurso as &$alumno) {
      $alumno['acciones'] = FunctionCursosDocente::getAccionesAlumnosPorCurso($alumno["idAlumno"]);
    }
    echo json_encode($todosLosAlumnosCurso);
  }
  // Metod para mostrar todos los alumnos de un curso mediante una petición AJAX en la vista para ver notas.
  public function ajaxMostrarTodosLosAlumnosCursoNotas($data)
  {
    $data = json_decode($data, true);
    $todosLosAlumnosCurso = ControllerAlumnos::ctrGetAlumnosCursoNotas($data["idCurso"], $data["idGrado"], $data["idPersonal"], $data["idBimestre"], $data["idUnidad"]);
    foreach ($todosLosAlumnosCurso as &$alumno) {
      $alumno['acciones'] = FunctionCursosDocente::getAccionesAlumnosPorCursoNotas($alumno["idAlumno"]);
    }
    echo json_encode($todosLosAlumnosCurso);
  }
  public $codAlumnoVisualizarDocente;
  public function ajaxGetAlumnoByIdAlumnoDocenteVisualizar()
  {
    $codAlumnoVisualizarDocente = $this->codAlumnoVisualizarDocente;
    $response = ControllerAlumnos::ctrGetAlumnoByIdAlumnoDocenteVisualizar($codAlumnoVisualizarDocente);
    echo json_encode($response);
  }
  public function ajaxObtenerTodosIdAlumnoIdApoderadoHermanos()
  {
    $response = ControllerAlumnos::ctrObtenerTodosIdAlumnoIdApoderadoHermanos();
    echo json_encode($response);
  }
}


//mostar todos los Alumnos DataTableAdmin
if (isset($_POST["todosLosAlumnosAdmin"])) {
  $mostrarTodosLosAlumnosAdmin = new AlumnosAjax();
  $mostrarTodosLosAlumnosAdmin->ajaxMostrarTodosLosAlumnosAdmin();
}

//  Obtener los datos del alumno para visualizar
if (isset($_POST["codAlumnoVisualizar"])) {
  $alumno = new AlumnosAjax();
  $alumno->codAlumnoVisualizar = $_POST["codAlumnoVisualizar"];
  $alumno->ajaxMostrarDatosAlumno();
}

//  Obtener los datos del alumno para realizar el pago
if (isset($_POST["codAlumnoPago"])) {
  $obtenerAlumnoData = new AlumnosAjax();
  $obtenerAlumnoData->codAlumnoPago = $_POST["codAlumnoPago"];
  $obtenerAlumnoData->ajaxMostrarDatosAlumnoPago();
}

//  Cambiar estado del alumno
if (isset($_POST["codAlumnoEstado"]) && isset($_POST["AlumnoEstado"])) {
  $cambiarEstadoAlumno = new AlumnosAjax();
  $cambiarEstadoAlumno->codAlumnoEstado = $_POST["codAlumnoEstado"];
  $cambiarEstadoAlumno->cambiarEstadoAlumno = $_POST["AlumnoEstado"];
  $cambiarEstadoAlumno->ajaxCambiarEstadoAlumno();
}

if (isset($_POST["todosLosAlumnosCurso"])) {
  $mostrarTodosLosAlumnosCurso = new AlumnosAjax();
  $mostrarTodosLosAlumnosCurso->ajaxMostrarTodosLosAlumnosCurso($_POST["todosLosAlumnosCurso"]);
}

if (isset($_POST["todosLosAlumnosCursoNotas"])) {
  $mostrarTodosLosAlumnosCursoNotas = new AlumnosAjax();
  $mostrarTodosLosAlumnosCursoNotas->ajaxMostrarTodosLosAlumnosCursoNotas($_POST["todosLosAlumnosCursoNotas"]);
}

// Los alumnos de un año escolar
if (isset($_POST["todosLosAlumnosAnio"])) {
  $mostrarTodosLosAlumnosAnioEscolar = new AlumnosAjax();
  $mostrarTodosLosAlumnosAnioEscolar->ajaxMostrarTodosLosAlumnosAnioEscolar($_POST["todosLosAlumnosAnio"]);
}
// Obtener los datos del alumno para visualizar en el modal mis alumnos
if(isset($_POST["idAlumnoVisualizarDatosDocente"])){
  $mostrarDatosAlumnoDocenteVisualizar = new AlumnosAjax();
  $mostrarDatosAlumnoDocenteVisualizar->codAlumnoVisualizarDocente = $_POST["idAlumnoVisualizarDatosDocente"];
  $mostrarDatosAlumnoDocenteVisualizar->ajaxGetAlumnoByIdAlumnoDocenteVisualizar();
}
if(isset($_POST["todosLosAlumnosMatriculadosApoderados"])){
  $mostrarTodosAlumnosApoderados = new AlumnosAjax();
  $mostrarTodosAlumnosApoderados->ajaxObtenerTodosIdAlumnoIdApoderadoHermanos();
}
