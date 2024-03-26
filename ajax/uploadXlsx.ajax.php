<?php

require_once "../controller/pagos.controller.php";
require_once "../model/pagos.model.php";
require_once "../functions/pagos.functions.php";

class XlsxAjax
{
  //datos de xlsx para la creacion de registro de pagos
  public $jsonDataStringXlsx;
  public function ajaxdataXlsxAdmin()
  {
    $jsonDataStringXlsx = $this->jsonDataStringXlsx;
    $responseDateXlsx = ControllerPagos::ctrCrearRegistroPagoXlsx($jsonDataStringXlsx);
    echo json_encode($responseDateXlsx);
  }
}
//datos de xlsx para la creacion de registro de pagos
if (isset ($_POST["jsonDataStringXlsx"])) {
  $dataXlsx = new XlsxAjax();
  $dataXlsx->jsonDataStringXlsx = $_POST["jsonDataStringXlsx"];
  $dataXlsx->ajaxdataXlsxAdmin();
}

