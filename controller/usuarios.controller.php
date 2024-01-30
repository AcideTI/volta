<?php
date_default_timezone_set('America/Lima');

class ControllerUsuarios
{
  public static function ctrIniciarSesion()
  {
    if (isset($_POST["inputCorreo"]) && $_POST["inputCorreo"] != "" && $_POST["inputCorreo"] != null && $_POST["inputPassword"] != "" && $_POST["inputPassword"] != null) {

      $verificar = self::ctrVerificarUsuario($_POST["inputCorreo"], $_POST["inputPassword"]);

      if ($verificar != false) {
        $tabla = "usuario";
        $dataUsuario = ModelUsuarios::mdlObtenerDatosSesion($tabla, $_POST["inputCorreo"]);
        $_SESSION["login"] = "ok";
        $_SESSION["idUsuario"] = $dataUsuario["idUsuario"];
        $_SESSION["correoUsuario"] = $dataUsuario["correoUsuario"];
        $_SESSION["nombreCompleto"] = $dataUsuario["nombreUsuario"] . ' ' . $dataUsuario["apellidoUsuario"];
        $_SESSION["tipoUsuario"] = $dataUsuario["idTipoUsuario"];

        //  Save last login
        $ultimaConexion = date("Y-m-d\TH:i:sP");

        $updateConnection = ModelUsuarios::mdlActualizarSesion($tabla, $ultimaConexion, $dataUsuario["idUsuario"]);
        if ($updateConnection == "ok") {
          echo '<script>
            window.location = "inicio";
          </script>';
        }
      } else {
        echo '<br><div class="alert alert-danger" role="alert">Error en los datos ingresados, vuelve a intentarlo</div>';
      }
    }
  }

  //  Verificar usuario
  public static function ctrVerificarUsuario($email, $password)
  {
    $tabla = "usuario";
    $userData = ModelUsuarios::mdlObtenerDataUsuario($tabla, $email);
    $verificar = password_verify($password, $userData["password"]);
    return $verificar;
  }

  //  Agregar nuevo usuario
  public static function ctrGetAllUsuarios()
  {
    $tabla = "usuario";
    $listUsuarios = ModelUsuarios::mdlGetAllUsuarios($tabla);
    return $listUsuarios;
  }

  //  Obtener tipos de usuarios
  public static function ctrGetTipoUsuarios()
  {
    $tabla = "tipo_usuario";
    $listTipos = ModelUsuarios::mdlGetTipoUsuarios($tabla);
    return $listTipos;
  }

  //  Crear usuario personal
  public static function ctrCrearUsuarioPersonal()
  {
    if (isset($_POST["usuarioCorreo"]) && isset($_POST["passwordUsuario"])) {
      $tabla = "usuario";
      $password = password_hash($_POST["passwordUsuario"], PASSWORD_ARGON2ID, [
        'memory_cost' => 1 << 12,
        'time_cost' => 2,
        'threads' => 2
      ]);
      $dataUsuario = array(
        "correoUsuario" => $_POST["usuarioCorreo"],
        "password" => $password,
        "nombreUsuario" => $_POST["nombreUsuario"],
        "apellidoUsuario" => $_POST["apellidoUsuario"],
        "dniUsuario" => $_POST["dniUsuario"],
        "idTipoUsuario" => $_POST["tipoUsuario"],
        "estadoUsuario" => "1",
        "fechaCreacion" => date("Y-m-d\TH:i:sP"),
        "fechaActualizacion" => date("Y-m-d\TH:i:sP")
      );

      $response = ModelUsuarios::mdlCrearUsuarioPersonal($tabla, $dataUsuario);
      if ($response == "ok") {
        ControllerFunciones::mostrarAlerta("success", "Correcto", "Usuario creado correctamente", "usuarios");
      } else {
        ControllerFunciones::mostrarAlerta("error", "Error", "Error al crear un nuevo usuario", "usuarios");
      }
    }
  }

  //  Obtener datos para editar
  public static function ctrGetUsuarioEdit($codUsuario)
  {
    $tabla = "usuario";
    $dataUsuario = ModelUsuarios::mdlGetUsuarioEditar($tabla, $codUsuario);
    return $dataUsuario;
  }

  //  Editar usuario
  public static function ctrEditarUsuarioPersonal()
  {
    if (isset($_POST["correoEditar"])) {
      $tabla = "usuario";
      $dataUsuario = array(
        "correoUsuario" => $_POST["correoEditar"],
        "nombreUsuario" => $_POST["nombreEditar"],
        "apellidoUsuario" => $_POST["apellidoEditar"],
        "dniUsuario" => $_POST["dniEditar"],
        "idTipoUsuario" => $_POST["tipoEditar"],
        "fechaActualizacion" => date("Y-m-d\TH:i:sP"),
        "idUsuario" => $_POST["codUsuario"]
      );
      $response = ModelUsuarios::mdlEditarUsuarioPersonal($tabla, $dataUsuario);
      if ($response == "ok") {
        ControllerFunciones::mostrarAlerta("success", "Correcto", "Usuario editado correctamente", "usuarios");
      } else {
        ControllerFunciones::mostrarAlerta("error", "Error", "Error al editar el usuario", "usuarios");
      }
    }
  }
}
