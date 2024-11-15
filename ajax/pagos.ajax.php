<?php

require_once "../controller/pagos.controller.php";
require_once "../model/pagos.model.php";
require_once "../functions/pagos.functions.php";

class PagosAjax
{
  /**
   * Mostrar todos los pagos
   * 
   * @return array Arreglo de todos los pagos 
   */

  public function ajaxTodoLosPagos()
  {
    $allPagos = ControllerPagos::ctrTodoLosPagos();

    echo json_encode($allPagos);
  }

  /**
   * Método para mostrar todos los pagos de un año escolar mediante una petición AJAX.
   *
   * @param int $idAnioEscolar Identificador del año escolar.
   * @return array $response Array con los pagos de un año escolar.
   */
  public function ajaxMostrarTodosLosPagosAnioEscolar($idAnioEscolar)
  {
    $todosLosPagosAnioEscolar = ControllerPagos::ctrGetPagosAnioEscolar($idAnioEscolar);
    foreach ($todosLosPagosAnioEscolar as &$dataPago) {
      // dato para obtener el nombre y el apellido junto
      $dataPago['nombreCompleto'] = strval($dataPago['nombresAlumno'] . ' ' . $dataPago['apellidosAlumno']);
      $dataPago['moraPago'] = strval($dataPago["moraPago"]);
      $dataPago['numeroComprobante'] = strval($dataPago["numeroComprobante"]);
      $dataPago['tipoPago'] = strval($dataPago["conceptoPago"]);
      $dataPago['mesPago'] = strval($dataPago["mesPago"]);

      $dataPago['nivelAlum'] = FunctionPagos::getNivelAlumno($dataPago["idNivel"]);
      $dataPago['cantidadTotal'] = FunctionPagos::getCantidadPago($dataPago["cantidadPago"]);
      $dataPago['statePago'] = FunctionPagos::getEstadoCronogramaPago($dataPago["estadoCronograma"]);
      $dataPago['buttonsPago'] = FunctionPagos::getBotonesPagos($dataPago["idPago"], $dataPago["estadoCronograma"]);
    }
    echo json_encode($todosLosPagosAnioEscolar);
  }

  //mostar todos los Pagos DataTableAlumnosAdmin
  public function ajaxMostrarTodosLosPagosAdmin()
  {
    $todosLosPagosAdmin = ControllerPagos::ctrGetAllPagos();
    foreach ($todosLosPagosAdmin as &$dataPago) {
      // dato para obtener el nombre y el apellido junto
      $dataPago['nombreCompleto'] = strval($dataPago['nombresAlumno'] . ' ' . $dataPago['apellidosAlumno']);
      $dataPago['moraPago'] = strval($dataPago["moraPago"]);
      $dataPago['numeroComprobante'] = strval($dataPago["numeroComprobante"]);
      $dataPago['tipoPago'] = strval($dataPago["conceptoPago"]);
      $dataPago['mesPago'] = strval($dataPago["mesPago"]);

      $dataPago['nivelAlum'] = FunctionPagos::getNivelAlumno($dataPago["idNivel"]);
      $dataPago['cantidadTotal'] = FunctionPagos::getCantidadPago($dataPago["cantidadPago"]);
      $dataPago['statePago'] = FunctionPagos::getEstadoCronogramaPago($dataPago["estadoCronograma"]);
      $dataPago['buttonsPago'] = FunctionPagos::getBotonesPagos($dataPago["idPago"], $dataPago["estadoCronograma"]);
    }
    echo json_encode($todosLosPagosAdmin);
  }
  // vista de pagos buscar alumno por el dni
  public function ajaxMostrarDatosPagoAlumno($codCajaAlumno)
  {
    $datosPagoAlumno = ControllerPagos::ctrGetDataPagoCodAlumno($codCajaAlumno);
    if ($datosPagoAlumno == false) {
      echo json_encode(false);
      return;
    }
    $datosPagoAlumno['nivelAlumno'] = FunctionPagos::getNivelAlumno($datosPagoAlumno["idNivel"]);
    echo json_encode($datosPagoAlumno);
  }
  // vista de pagos detalles de pago
  public $codPago;
  public function ajaxMostrarDetallesPago()
  {
    $codPago = $this->codPago;
    $mostrarDetallesPago = ControllerPagos::ctrGetIdEditPago($codPago);
    $mostrarDetallesPago['nivelAlumno'] = FunctionPagos::getNivelAlumno($mostrarDetallesPago["idNivel"]);
    //$mostrarDetallesPago['mesPagoDet'] = FunctionPagos::getMesEdit($mostrarDetallesPago["mesPago"]);
    echo json_encode($mostrarDetallesPago);
  }
  // eliminar registro de pago
  public function ajaxEliminarRegistroPago($codPagoDelet)
  {
    $eliminarRegistroPago = ControllerPagos::ctrDeleteRegistroPago($codPagoDelet);
    echo json_encode($eliminarRegistroPago);
  }
  public function ajaxGetCantidadPagosPendientesGrados()
  {
    $todosLosPagosPendientesPorGrado = ControllerPagos::ctrGetCantidadPagosPendientesGrados();
    echo json_encode($todosLosPagosPendientesPorGrado);
  }
  public function ajaxGetCantidadPagosRealizadosPendientesNiveles()
  {
    $cantidadPagosRealizadosPendientesNiveles = ControllerPagos::ctrGetCantidadPagosRealizadosPendientesNiveles();
    echo json_encode($cantidadPagosRealizadosPendientesNiveles);
  }
}

if (isset($_POST["todosLosPagos"])) {
  $todosLosPagos = new PagosAjax();
  $todosLosPagos->ajaxTodoLosPagos();
}

//mostar todos los Pagos DataTableAlumnosAdmin
if (isset($_POST["todosLosPagosAdmin"])) {
  $mostrarTodosLosPagosAdmin = new PagosAjax();
  $mostrarTodosLosPagosAdmin->ajaxMostrarTodosLosPagosAdmin();
}
// vista de pagos buscar alumno por el dni
if (isset($_POST["codCajaAlumno"])) {
  $mostrarDatosPagoDniAlumno = new PagosAjax();
  $mostrarDatosPagoDniAlumno->ajaxMostrarDatosPagoAlumno($_POST["codCajaAlumno"]);
}
// vista de pagos detalles de pago
if (isset($_POST["codPago"])) {
  $mostrarDetallesPago = new PagosAjax();
  $mostrarDetallesPago->codPago = $_POST["codPago"];
  $mostrarDetallesPago->ajaxMostrarDetallesPago();
}
// eliminar registro de pago
if (isset($_POST["codPagoDelet"])) {
  $eliminarRegistroPago = new PagosAjax();
  $eliminarRegistroPago->ajaxEliminarRegistroPago($_POST["codPagoDelet"]);
}

class PagosAjaxx
{
  //editar cronograma de pagos de pago modal editar 
  public function ajaxEditarRegistroPagoModal($dataEditCronoModal)
  {
    // Convierte la cadena JSON en un array asociativo
    $dataEditCronoModal = json_decode($dataEditCronoModal, true);
    $EditarRegistroPagoModal = ControllerPagos::ctrEditarRegistroPagoModal($dataEditCronoModal);
    echo json_encode($EditarRegistroPagoModal);
  }
}

//editar cronograma de pagos de pago modal editar 
if (isset($_POST["dataEditCronoModal"])) {
  $EditarRegistroPagoModal = new PagosAjaxx();
  $EditarRegistroPagoModal->ajaxEditarRegistroPagoModal($_POST["dataEditCronoModal"]);
}

// Obtener los datos de los pagos por año escolar
if (isset($_POST["todosLosPagosAnioEscolar"])) {
  $pagosAnioEscolar = new PagosAjax();
  $pagosAnioEscolar->ajaxMostrarTodosLosPagosAnioEscolar($_POST["todosLosPagosAnioEscolar"]);
}
if (isset($_POST["todosLosPagosPendientesPorGrado"])) {
  $todosLosPagosPendientesPorGrado = new PagosAjax();
  $todosLosPagosPendientesPorGrado->ajaxGetCantidadPagosPendientesGrados();
}
if (isset($_POST["cantidadPagosRealizadosPendientesNiveles"])){
  $cantidadPagosRealizadosPendientesNiveles = new PagosAjax();
  $cantidadPagosRealizadosPendientesNiveles->ajaxGetCantidadPagosRealizadosPendientesNiveles();
}
