<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <!-- INICIO -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="inicio">
        <i class="bi bi-grid"></i>
        <span>Inicio</span>
      </a>
    </li>

    <!-- ADMISION -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allAdmision" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal"></i><span>Admisión</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allAdmision" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="listaPostulantes">
            <i class="bi bi-circle"></i><span>Postulaciones</span>
          </a>
        </li>
        <li>
          <a href="anioEscolar">
            <i class="bi bi-circle"></i><span>Año Escolar</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- MATRICULADOS -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allMatriculados" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Matriculados</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allMatriculados" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="listaAdmisionAlumnos">
            <i class="bi bi-circle"></i><span>Lista Matriculados</span>
          </a>
        </li>
        <li>
          <a href="buscarAlumno">
            <i class="bi bi-circle"></i><span>Buscar Alumno</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- PAGOS -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allPensiones" data-bs-toggle="collapse" href="#">
        <i class="bi bi-wallet2"></i><span>Pensiones</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allPensiones" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="listaPagos">
            <i class="bi bi-circle"></i><span>Todos los Pagos</span>
          </a>
        </li>
        <li>
          <a href="listaComunicadoPago">
            <i class="bi bi-circle"></i><span>Comunicados Pago</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- REPORTES -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allReportes" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Reportes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allReportes" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="listaPostulantesAnio">
            <i class="bi bi-circle"></i><span>Reporte de Admisiones</span>
          </a>
        </li>
        <li>
          <a href="reporteComunicaciones">
            <i class="bi bi-circle"></i><span>Reporte de Comunicaciones</span>
          </a>
        </li>
        <li>
          <a href="reportePagos">
            <i class="bi bi-circle"></i><span>Reporte de Pensiones</span>
          </a>
        </li>
        <li>
          <a href="reporteAdmisiones">
            <i class="bi bi-circle"></i><span>Reporte Matriculados</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>