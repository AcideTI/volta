<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <!-- INICIO -->
    <li class="nav-item">
      <a class="nav-link" href="inicio">
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
            <i class="bi bi-circle"></i><span>Postulantes</span>
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
          <a href="reportePagos">
            <i class="bi bi-circle"></i><span>Reporte de Pensiones</span>
          </a>
        </li>
        <li>
          <a href="reporteComunicaciones">
            <i class="bi bi-circle"></i><span>Reporte de Comunicaciones</span>
          </a>
        </li>
        <li>
          <a href="listaPostulantesAnio">
            <i class="bi bi-circle"></i><span>Reporte de Postulantes</span>
          </a>
        </li>
        <li>
          <a href="reporteAdmisiones">
            <i class="bi bi-circle"></i><span>Reporte Matriculados</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- TIPOS DE EVALUACIÓN -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tiposEvaluacion" data-bs-toggle="collapse" href="#">
        <i class="bi bi-search"></i><span>Tipos de Evaluación</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tiposEvaluacion" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="tecnicaseInstrumentos">
            <i class="bi bi-circle"></i><span>Ténicas e Instrumentos</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- ALUMNOS -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allAlumnos" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people-fill"></i><span>Alumnos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allAlumnos" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="listaAlumnos">
            <i class="bi bi-circle"></i><span>Todos los Alumnos</span>
          </a>
        </li>
        <li>
          <a href="buscarAlumno">
            <i class="bi bi-circle"></i><span>Buscar Alumno</span>
          </a>
        </li>
        <li>
          <a href="anioEscolar">
            <i class="bi bi-circle"></i><span>Año Escolar</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- PERSONAL -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allPersonal" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-vcard" fa="x2"></i><span>Personal</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allPersonal" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="personal">
            <i class="bi bi-circle"></i><span>Todo el Personal</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- USUARIOS -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allUsuarios" data-bs-toggle="collapse" href="#">
        <i class="bi bi-lock-fill"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allUsuarios" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="usuarios">
            <i class="bi bi-circle"></i><span>Todos los Usuarios</span>
          </a>
        </li>
        <li>
          <a href="apoderado">
            <i class="bi bi-circle"></i><span>Todos Los Apoderados</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- CURSOS POR GRADO -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allCurses" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i><span>Cursos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allCurses" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="cursos">
            <i class="bi bi-circle"></i><span>Todos los Cursos</span>
          </a>
        </li>
        <li>
          <a href="asignarCursos">
            <i class="bi bi-circle"></i><span>Asignar cursos</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- TODOS LOS DOCENTES -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#allDocentes" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-video2"></i><span>Docentes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="allDocentes" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="listaDocentes">
            <i class="bi bi-circle"></i><span>Todos los Docentes</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>