<main id="main" class="main">

  <div class="pagetitle">
    <h2 class="mt-4 tituloPagos"></h2><br>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
        <li class="breadcrumb-item active">Todos los Pagos</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-2">
        <div class="row mb-2">
          <button type="button" class="btn btn-primary btnAgregarNuevoPago" id="btnAgregarNuevoPago">Registrar Pago
            </button>
        </div>
      </div>
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <!--  Titulo dataTablePagosAdmin-->
              <table id="dataTablePagos" class="display dataTablePagos" style="width: 100%">
                <thead>
                  <!-- dataTablePagosAdmin -->
                </thead>
                <tbody>
                  <!--dataTablePagosAdmin-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- Modal Cronograma Pagos Admision Alumno-->
<!-- <div class="modal fade" id="calendarioAdmisionPago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="calendarioAdmisionPagoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="calendarioAdmisionPagoLabel">Cronograma Pagos Admision Alumno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div id="monthView" style="display: block;">
        <div style="margin: 20px;">
          <h3 id="anioEscolar"></h3>


          <table class="table-calendar" id="monthCalendar" data-lang="en">
            <tbody id="month-body"></tbody>
          </table>
        </div>
      </div>

      <div class="container-calendar" style="display: none;">
        <h3 id="monthAndYear"></h3>
        <div class="button-container-calendar">
          <button id="previous" onclick="previous()">&#8249;</button>

          <button id="next" onclick="next()">&#8250;</button>
        </div>
        <table class="table-calendar" id="calendar" data-lang="en">
          <thead id="thead-month"></thead>
          <tbody id="calendar-body"></tbody>
        </table><br>

        <div class="footer-container-calendar">
          <label for="month">Selecionar Fecha: </label>
          <select id="month" onchange="jump()">
            <option value=0>Ene</option>
            <option value=1>Feb</option>
            <option value=2>Mar</option>
            <option value=3>Abr</option>
            <option value=4>May</option>
            <option value=5>Jun</option>
            <option value=6>Jul</option>
            <option value=7>Ago</option>
            <option value=8>Sep</option>
            <option value=9>Oct</option>
            <option value=10>Nov</option>
            <option value=11>Dic</option>
          </select>
          <select id="year" onchange="jump()"></select>
        </div>
      </div>


      <div id="monthView" style="display: none;">
        <div style="margin: 20px;">
          <h3 id="anioEscolar"></h3>

          <table class="table-calendar" id="monthCalendar" data-lang="en">
            <tbody id="month-body"></tbody>
          </table>
        </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="toggleView" onclick="toggleView()">Meses</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Ver Pagos</button>
      </div>
    </div>
  </div>
</div> -->