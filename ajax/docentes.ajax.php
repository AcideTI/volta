<?php

require_once "../controller/docentes.controller.php";
require_once "../model/docentes.model.php";
require_once "../functions/docentes.functions.php";

class DocentesAjax
{
  //mostar todos los usuarios DataTable
  public function ajaxMostrarTodosLosDocentes()
  {
    $todosLosDocentes = ControllerDocentes::ctrGetAllDocentes();
    foreach ($todosLosDocentes as &$usuario) {
      $usuario['state'] = FunctionDocente::getEstadoocentes($usuario["estadoUsuario"]);
      $usuario["grado"] = ControllerDocentes::ctrGetGrado($usuario['idPersonal']);
      $usuario["grado"] = FunctionDocente::getGrado($usuario['grado']);
      $usuario['buttons'] = FunctionDocente::getBtnUsuarios($usuario["idUsuario"], $usuario["estadoUsuario"]);
      
    }
    echo json_encode($todosLosDocentes);
  }
  
}

//mostar todos los usuarios DataTable
if (isset($_POST["todosLosDocentes"])) {
  $mostrarTodosLosDocentes = new DocentesAjax();
  $mostrarTodosLosDocentes->ajaxMostrarTodosLosDocentes();
}