<?php
class ControllerCursos
{
  /**
   * Obtiene los cursos.
   *
   * @return array Retorna un array con los cursos.
   */
  public static function ctrGetCursos()
  {
    $response = ModelCursos::mdlGetCursos();
    return $response;
  }

  /**
   * Registra un curso.
   *
   * @param array $data Datos del curso.
   * @return string Retorna un mensaje de éxito o error.
   */
  public static function ctrRegistrarCurso($data)
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $idUsuario = $_SESSION['idUsuario'];
    $dataRegistrarCursoModal = array(
      "descripcionCurso" => $data["descripcionCurso"],
      "idArea" => $data["idArea"],
      "estadoCurso" => $data["estadoCurso"],
      "usuarioCreacion" => $idUsuario,
      "fechaCreacion" => date('Y-m-d H:i:s'),
      "usuarioActualizacion" => $idUsuario,
      "fechaActualizacion" => date('Y-m-d H:i:s'),
    );

    $response = ModelCursos::mdlRegistrarCurso($dataRegistrarCursoModal);
    return $response;
  }

  /**
   * Elimina un curso.
   *
   * @param int $idCurso El ID del curso.
   * @return string Retorna un mensaje de éxito o error.
   */
  public static function ctrEliminarCurso($idCurso)
  {

    $existeCurso = ModelCursos::mdlExisteCursoEnCursoGrado($idCurso);
    if ($existeCurso == "ok") {
      return "error";
    }

    $response = ModelCursos::mdlEliminarCurso($idCurso);
    if ($response == "ok") {
      return "ok";
    } else {
      return "error";
    }
  }

  /**
   * Obtiene un curso.
   *
   * @param int $idCurso El ID del curso a obtener.
   * @return array Retorna un array con los datos del curso.
   */
  public static function ctrGetCurso($idCurso)
  {
    $response = ModelCursos::mdlGetCurso($idCurso);
    return $response;
  }

  /**
   * Edita un curso.
   *
   * @param array $data Datos del curso.
   * @return string Retorna un mensaje de éxito o error.
   */
  public static function ctrEditarCurso($data)
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $idUsuario = $_SESSION['idUsuario'];
    $dataEditarCursoModal = array(
      "idCurso" => $data["idCurso"],
      "descripcionCurso" => $data["descripcionCurso"],
      "idArea" => $data["idArea"],
      "estadoCurso" => $data["estadoCurso"],
      "usuarioActualizacion" => $idUsuario,
      "fechaActualizacion" => date('Y-m-d H:i:s'),
    );

    $response = ModelCursos::mdlEditarCurso($dataEditarCursoModal);
    return $response;
  }

  /**
   * Obtiene los grados por nivel.
   *
   * @return array Retorna un array con los grados por nivel.
   */
  public static function ctrGetGradosPorNivel()
  {
    $response = ModelCursos::mdlGetGradosPorNivel();
    return $response;
  }

  /**
   * Obtiene los cursos por grado.
   *
   * @param int $idGrado El ID del grado.
   * @return array Retorna un array con los cursos por grado.
   */
  public static function ctrGetCursosPorGrado($idGrado)
  {
    $response = ModelCursos::mdlGetCursosPorGrado($idGrado);
    return $response;
  }

  /**
   * Obtiene los cursos sin asignar.
   *
   * @param int $idGrado El ID del grado.
   * @return array Retorna un array con los cursos sin asignar.
   */
  public static function ctrGetCursosSinAsignar($idGrado)
  {
    $response = ModelCursos::mdlGetCursosSinAsignar($idGrado);
    return $response;
  }

  /**
   * Asigna un curso a un grado.
   *
   * @param int $idGrado El ID del grado.
   * @param int $idCurso El ID del curso.
   * @return string Retorna un mensaje de éxito o error.
   */

  public static function ctrAsignarCursoAGrado($data)
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $idUsuario = $_SESSION['idUsuario'];

    $data = json_decode($data, true);

    $dataAsignarCurso = array(
      "idCurso" => $data["idCursoAsignar"],
      "idGrado" => $data["idGradoAsignar"],
      "usuarioCreacion" => $idUsuario,
      "fechaCreacion" => date('Y-m-d H:i:s'),
      "usuarioActualizacion" => $idUsuario,
      "fechaActualizacion" => date('Y-m-d H:i:s'),
    );

    $response = ModelCursos::mdlAsignarCursoAGrado($dataAsignarCurso);
    return $response;
  }
}
