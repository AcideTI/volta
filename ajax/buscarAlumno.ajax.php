<?php

require_once "../controller/buscarAlumno.controller.php";
require_once "../model/buscarAlumno.model.php";
require_once "../functions/buscarAlumno.functions.php";
require_once "../model/apoderado.model.php";

class BuscarAlumnoAjax
{
  //mostar todos los Apoderados DataTable
  public function ajaxMostrartodasLasBusquedas()
  {
    $todasLasBusquedas = ControllerBuscarAlumno::ctrGetAllBusquedaAlumno();
    foreach ($todasLasBusquedas as &$dataBsucar) {
      $tabla = "apoderado";
      $todoslosApoderados = ModelApoderados::mdlGetAllApoderadosByAlumno($tabla, $dataBsucar["idAlumno"]);

      if (isset($todoslosApoderados[0])) {
        $dataBsucar['apoderado1Busqueda'] = $todoslosApoderados[0]["nombreApoderado"] . " " . $todoslosApoderados[0]["apellidoApoderado"];
        $dataBsucar['celularApoderado1'] = $todoslosApoderados[0]["celularApoderado"];
        $dataBsucar['dni1ApoBusqueda'] = $todoslosApoderados[0]["dniApoderado"];
        $dataBsucar['convive1Busqueda'] = $todoslosApoderados[0]["convivenciaAlumno"];
        $dataBsucar['email1ApoBusqueda'] = $todoslosApoderados[0]["correoApoderado"];
      } else {
        $dataBsucar['apoderado1Busqueda'] = 'No registrado';
        $dataBsucar['celularApoderado1'] = 'No registrado';
      }

      if (isset($todoslosApoderados[1])) {
        $dataBsucar['apoderado2Busqueda'] = $todoslosApoderados[1]["nombreApoderado"] . " " . $todoslosApoderados[1]["apellidoApoderado"];
        $dataBsucar['celularApoderado2'] = $todoslosApoderados[1]["celularApoderado"];
        $dataBsucar['dni2ApoBusqueda'] = $todoslosApoderados[1]["dniApoderado"];
        $dataBsucar['convive2ApoBusqueda'] = $todoslosApoderados[1]["convivenciaAlumno"];
        $dataBsucar['email2ApoBusqueda'] = $todoslosApoderados[1]["correoApoderado"];
      } else {
        $dataBsucar['apoderado2Busqueda'] = 'No registrado';
        $dataBsucar['celularApoderado2'] = 'No registrado';
      }
      if (isset($dataBsucar["fechaNacimiento"])) {
        $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $dataBsucar["fechaNacimiento"]);
        $fechaActual = new DateTime();

        $anioNacimiento = $fechaNacimiento->format('Y');
        $anioActual = $fechaActual->format('Y');

        $dataBsucar['edad'] = $anioActual - $anioNacimiento;
      } else {
        $dataBsucar['edad'] = "No Registrado";
      }
      if (isset($dataBsucar["mesPago"])) {
        switch ($dataBsucar["mesPago"]) {
          case "Matricula":
            $dataBsucar['montoPagoMatricula'] = $dataBsucar["montoPago"];
            $dataBsucar['numeroComprobanteMatricula'] = $dataBsucar["numeroComprobante"];
            break;
          case "Cuota Inicial":
            $dataBsucar['montoPagoCuota'] = $dataBsucar["montoPago"];
            $dataBsucar['numeroComprobanteCuota'] = $dataBsucar["numeroComprobante"];
            break;
          default:
            if ($dataBsucar["mesPago"] != "Cuota Inicial" && $dataBsucar["mesPago"] != "Matricula") {
              $dataBsucar['montoPagoPension'] = $dataBsucar["montoPago"];
            }
            break;
        }
      }
      $dataBsucar['estadoAdmisionAlumno'] = FunctionBuscarAlumno::getEstadoAlumnoBuscar($dataBsucar["estadoAdmisionAlumno"]);
      $dataBsucar['estadoSiagie'] = FunctionBuscarAlumno::getEstadosBuscarSiagiue($dataBsucar["estadoSiagie"]);
      $dataBsucar['nuevoAlumno'] = FunctionBuscarAlumno::getEstadoNuevoAntigup($dataBsucar["nuevoAlumno"]);
    }
    echo json_encode($todasLasBusquedas);
  }
}
//mostar todos los Apoderados DataTable
if (isset($_POST["buscarAlumnos"])) {
  $mostrartodasLasBusquedas = new BuscarAlumnoAjax();
  $mostrartodasLasBusquedas->ajaxMostrartodasLasBusquedas();
}
