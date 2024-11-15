<?php
$ipConfirmacion = $_SESSION["idUsuario"];
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h2 class="mt-4 tituloNotaAlumno"></h2><br>

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
        <li class="breadcrumb-item active">Notas </li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-2">
        <div class="row mb-2">
        </div>
      </div>
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="card py-4">
            <div class="card-header">
            </div>
            <script>
              var ipConfirmacion = "<?php echo $ipConfirmacion; ?>";
            </script>
            <div class="card-body table-responsive">
              <!--  Titulo dataTableNotasAlumnoApoderado-->
              <table id="dataTableNotasAlumnoApoderado" class="display dataTableNotasAlumnoApoderado"
                style="width: 100%">
                <thead>
                  <!-- dataTableNotasAlumnoApoderado -->
                </thead>
                <tbody>
                  <!--dataTableNotasAlumnoApoderado-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>



<!-- Modal Listar Cursos -->
<div class="modal fade" id="modalNotasAlumnoApoderado" tabindex="-1" aria-labelledby="modalCompetenciaUnidadLabel"
  aria-hidden="true">
  <div class="modal-dialog" style="max-width: 90%;"> <!-- Ajusta el ancho aquí -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNotasAlumnoApoderadoLabel">Registro de Notas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Contenedor para los datos del alumno -->
        <div id="datosAlumno" style="margin-bottom: 15px;">
          <h5>Información del Alumno</h5>
          <div class="row">
            <div class="col-md-6">
              <p style="margin: 0;"><strong>ID Alumno:</strong> <span id="idAlumno"></span></p>
              <p style="margin: 0;"><strong>Nombre Alumno:</strong> <span id="nombreAlumno"></span></p>
            </div>
            <div class="col-md-6">
              <p style="margin: 0;"><strong>Nivel:</strong> <span id="nivelAlumno"></span></p>
              <p style="margin: 0;"><strong>Grado:</strong> <span id="gradoAlumno"></span></p>
            </div>
          </div>
        </div>
        <hr style="border: 0; height: 2px; background: #ddd; margin: 15px 0;">
        <!-- Tabla de notas -->
        <div class="table-responsive">
          <table id="dataTableNotasPorAlumnoApoderado" class="display dataTableNotasPorAlumnoApoderado"
            style="width: 100%">
            <thead>
              <!-- dataTableNotasPorAlumnoApoderado -->
            </thead>
            <tbody>
              <!-- dataTableNotasPorAlumnoApoderado -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnImprimirPDF">
          <i class="bi bi-filetype-pdf"></i> Imprimir PDF
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>