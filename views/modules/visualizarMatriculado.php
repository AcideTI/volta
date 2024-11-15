<main id="main" class="main">

  <div class="pagetitle">
    <h1>Visualizar Alumno</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
        <li class="breadcrumb-item"><a href="listaAdmisionAlumnos">Lista de Matriculados</a></li>
        <li class="breadcrumb-item active">Visualizar Alumno</li>
      </ol>
    </nav>
    <?php
    $codAlumno = $_GET["codAdmisionAlumno"];
    $datosAlumno = ControllerAlumnos::ctrGetDatosVisualizar($codAlumno);
    ?>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-2">
        <div class="row mb-2">
        </div>
      </div>

      <span class="border border-3 p-3 m-3">
        <div class="container row g-3">
          <h3 style="font-weight: bold">Datos del Alumno</h3>

          <div class="form-group row">
            <label for="visualizarNombre" class="col-sm-2 col-form-label" style="font-weight: bold">Nombres: </label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="visualizarNombre" name="visualizarNombre" value="<?php echo $datosAlumno["nombresAlumno"] ?>" disabled>
            </div>
            <label for="visualizarFechaPostulacion" class="col-sm-2 col-form-label" style="font-weight: bold">Fecha Postulación: </label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="visualizarFechaPostulacion" name="visualizarFechaPostulacion" value="<?php echo $datosAlumno["fechaPostulacion"] ?>" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="visualizarApellido" class="col-sm-2 col-form-label" style="font-weight: bold">Apellidos: </label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="visualizarApellido" name="visualizarApellido" value="<?php echo $datosAlumno["apellidosAlumno"] ?>" disabled>
            </div>
            <label for="visualizarFechaNacimiento" class="col-sm-2 col-form-label" style="font-weight: bold">Fecha Nacimiento: </label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="visualizarFechaNacimiento" name="visualizarFechaNacimiento" value="<?php echo $datosAlumno["fechaNacimiento"] ?>" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="visualizarSexo" class="col-sm-2 col-form-label" style="font-weight: bold">Sexo: </label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="visualizarSexo" name="visualizarSexo" value="<?php echo $datosAlumno["sexoAlumno"] ?>" disabled>
            </div>
            <label for="visualizarLugarNacimiento" class="col-sm-2 col-form-label" style="font-weight: bold">Lugar Nacimiento: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="visualizarLugarNacimiento" name="visualizarLugarNacimiento" value="<?php echo $datosAlumno["lugarNacimiento"] ?>" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="visualizarDni" class="col-sm-2 col-form-label" style="font-weight: bold">DNI: </label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="visualizarDni" name="visualizarDni" value="<?php echo $datosAlumno["dniAlumno"] ?>" disabled>
            </div>
            <label for="visualizarDomicilio" class="col-sm-2 col-form-label" style="font-weight: bold">Domicilio: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="visualizarDomicilio" name="visualizarDomicilio" value="<?php echo $datosAlumno["direccionAlumno"] ?>" disabled>
            </div>
          </div>

          <div class="form-group row nivelAdmision">
            <label for="nivelAlumno" class="col-sm-2 col-form-label" style="font-weight: bold">Nivel:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="nivelAlumno" name="nivelAlumno" value="<?php echo $datosAlumno["descripcionNivel"] ?>" disabled>
            </div>
            <label for="visualizarColegioProced" class="col-sm-2 col-form-label" style="font-weight: bold">Colegio Procedencia: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="visualizarColegioProced" name="visualizarColegioProced" value="<?php echo $datosAlumno["colegioProcedencia"] ?>" disabled>
            </div>
          </div>

          <div class="form-group row gradoAdmision">
            <label for="gradoAlumno" class="col-sm-2 col-form-label" style="font-weight: bold">Grado:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="gradoAlumno" name="gradoAlumno" value="<?php echo $datosAlumno["descripcionGrado"] ?>" disabled>
            </div>
            <label for="visualizarDificultad" class="col-sm-2 col-form-label" style=" font-weight: bold">Tiene alguna dificultad: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="visualizarColegioProced" name="visualizarColegioProced" value="<?php echo $datosAlumno["dificultadPostulante"] ?>" disabled>
            </div>
          </div>

          <div class="form-group col-md-11">
            <label for="visualizarDetalleDif" class="form-label" style="font-weight: bold">Especifique la Dificultad: </label>
            <input type="text" class="form-control" id="visualizarDetalleDif" name="visualizarDetalleDif" value="<?php echo $datosAlumno["dificultadObservacion"] ?>" disabled>
          </div>

          <div class="form-group col-md-11">
            <label for="visualizarTipoSalud" class="form-label" style="font-weight: bold">Tipo de atención de salud tiene el estudiante (SIS, ESSALUD u otro): </label>
            <input type="text" class="form-control" id="visualizarTipoSalud" name="visualizarTipoSalud" value="<?php echo $datosAlumno["tipoAtencionPostulante"] ?>" disabled>
          </div>

          <div class="form-group col-md-11">
            <label for="visualizarTratamiento" class="form-label" style="font-weight: bold">Recibe un tipo de tratamiento o terapia, especificar: </label>
            <input type="text" class="form-control" id="visualizarTratamiento" name="visualizarTratamiento" value="<?php echo $datosAlumno["tratamientoPostulante"] ?>" disabled>
          </div>
        </div>
      </span>


      <?php
      $dataApoderados = ControllerApoderados::ctrGetDatosApoderados($datosAlumno["apoderado1"], $datosAlumno["apoderado2"]);
      foreach ($dataApoderados as $apoderado) {
      ?>
        <span class="border border-3 p-3 m-3">
          <div class="container row g-3">
            <h3 style="font-weight:bold">Datos <?php echo $apoderado["tipoApoderado"] ?></h3>
            <div class="form-group row">
              <label for="visualizarNombrePadre" class="col-sm-2 col-form-label" style="font-weight: bold">Nombres: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarNombrePadre" name="visualizarNombrePadre" value="<?php echo $apoderado["nombreApoderado"] ?>" disabled>
              </div>
              <label for="visualizarProfesionPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Profesión: </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="visualizarProfesionPadre" name="visualizarProfesionPadre" value="<?php echo $apoderado["profesionApoderado"] ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label for="visualizarApellidoPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Apellidos: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarApellidoPadre" name="visualizarApellidoPadre" value="<?php echo $apoderado["apellidoApoderado"] ?>" disabled>
              </div>
              <label for="visualizarCorreoPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Correo Electrónico: </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="visualizarCorreoPadre" name="visualizarCorreoPadre" value="<?php echo $apoderado["correoApoderado"] ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label for="visualizarDniPadre" class="col-sm-2 col-form-label" style="font-weight: bold">DNI: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarDniPadre" name="visualizarDniPadre" value="<?php echo $apoderado["dniApoderado"] ?>" disabled>
              </div>
              <label for="visualizarCelularPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Numero Celular: </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="visualizarCelularPadre" name="visualizarCelularPadre" value="<?php echo $apoderado["celularApoderado"] ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label for="visualizarFechaPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Fecha de Nacimiento: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarFechaPadre" name="visualizarFechaPadre" value="<?php echo $apoderado["fechaNacimiento"] ?>" disabled>
              </div>
              <label for="visualizarDepenPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Independiente / Dependiente: </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="visualizarDepenPadre" name="visualizarDepenPadre" value="<?php echo $apoderado["dependenciaApoderado"] ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label for="visualizarConvivePadre" class="col-sm-2 col-form-label" style="font-weight: bold">Convive con el postulante: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarFechaPadre" name="visualizarFechaPadre" value="<?php echo $apoderado["convivenciaAlumno"] ?>" disabled>
              </div>
              <label for="visualizarCentroPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Centro Laboral: </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="visualizarCentroPadre" name="visualizarCentroPadre" value="<?php echo $apoderado["centroLaboral"] ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label for="visualizarGradoPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Grado de Instrucción: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarGradoPadre" name="visualizarGradoPadre" value="<?php echo $apoderado["gradoInstruccion"] ?>" disabled>
              </div>
              <label for="visualizarNumTrabajoPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Teléfono de Trabajo: </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="visualizarNumTrabajoPadre" name="visualizarNumTrabajoPadre" value="<?php echo $apoderado["telefonoTrabajo"] ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label for="visualizarIngresoPadre" class="col-sm-2 col-form-label" style="font-weight: bold">Ingreso Mensual: </label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="visualizarIngresoPadre" name="visualizarIngresoPadre" value="<?php echo $apoderado["ingresoMensual"] ?>" disabled>
              </div>
            </div>
          </div>
        </span>
      <?php
      }
      ?>
      <div class="container row g-3 p-3 justify-content-between">
        <button class="col-1 d-inline-flex-center p-2 btn btn-secondary cerrarVisualizarPostulante">Cerrar</button>
      </div>
    </div>
  </section>
</main>