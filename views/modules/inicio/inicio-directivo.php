<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtro</h6>
                </li>
                <div id="mesesDropdown"></div> <!-- Contenedor para poblar desde JavaScript -->
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Pagos Vencidos <span id="filtroSeleccionado"></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-calendar-x"></i>
                </div>
                <div class="ps-3">
                  <h6 id="totalPagosVencidos">0</h6>
                  <span class="text-success small pt-1 fw-bold" id="porcentajeVencidas">12%</span>
                  <span class="text-muted small pt-2 ps-1">de <span id="totalPensiones"></span></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Revenue Card -->
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtro</h6>
                </li>
                <div id="tipoDocenteDropdown"></div> <!-- Contenedor para poblar desde JavaScript -->
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Docentes <span class="filtro-seleccionado-tipo-docente"></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-workspace"></i>
                </div>
                <div class="ps-3">
                  <h6 class="total-docentes-tipo"></h6>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Reports -->
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Docentes / Cursos <span>| Grado</span></h5>

              <!-- Line Chart -->
              <div id="reportsChartDocentesCursos"></div>
            </div>

          </div>
        </div>


      </div>

    </div>

    <div class="col-lg-4">
      <div class="row">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Customers Card -->
        <div class="col-xxl-12 col-xl-8">
          <div class="card info-card customers-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtro</h6>
                </li>
                <div id="gradoSexoDropdown"></div> <!-- Contenedor para poblar desde JavaScript -->
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Alumnos <span class="filtro-seleccionado-grado-sexo">| </span></h5>
              <div class="d-flex align-items-center">
              </div>
              <!-- Contenedor para el gráfico -->
              <div>
                <canvas id="pieChart" width="200" height="200"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Reports -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Informacion <span>| Grado</span></h5>
              <!-- Line Chart -->
              <div id="informacionCursos" style="max-height: 440px; overflow-y: auto;">
                <!-- Contenido generado dinámicamente por JavaScript -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">

          <div class="card-body">
            <h5 class="card-title">Personal<span>| Conexión</span></h5>

            <!--  Titulo DataTableAlumnosAdmin-->
            <table id="dataTablePersonalInicio" class="display dataTableAlumnos" style="width: 97%" align="center">
              <thead>
                <!-- DataTableAlumnosAdmin -->
              </thead>
              <tbody>
                <!-- DataTableAlumnosAdmin -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>