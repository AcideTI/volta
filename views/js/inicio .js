$(document).ready(function () {
  // Obtiene los datos de los scripts del archivo PHP
  var pagosPorMes = window.pagosPorMes;
  var porcentajePorMes = window.porcentajePorMes;
  var meses = window.meses;
  var descripcionesAnio = window.descripcionesAnio;
  var totalesAlumnos = window.totalesAlumnos;

  // Función para actualizar el total de pagos vencidos y porcentaje de pensiones vencidas
  function updatePagosVencidos(mes) {
    const totalPagosVencidos = pagosPorMes[mes].reduce(
      (sum, current) => sum + current,
      0
    );
    const porcentajeVencidas =
      Math.round(parseFloat(porcentajePorMes[mes]) * 100) / 100;

    $("#filtroSeleccionado").text("| " + mes);
    $("#totalPagosVencidos").text(totalPagosVencidos);
    $("#porcentajeVencidas").text(porcentajeVencidas + "%");
  }

  // Función para actualizar el título y el total de alumnos
  function actualizarDatos(indice) {
    const filtroSeleccionado = $(".filtro-seleccionado");
    const totalAlumnos = $(".total-alumnos");

    filtroSeleccionado.text("| " + descripcionesAnio[indice]);
    totalAlumnos.text(
      totalesAlumnos[indice].toLocaleString() + " Matriculados"
    ); // Formatear como número
  }

  // Inicializar con el primer mes y primer conjunto de datos
  if (meses.length > 0) {
    updatePagosVencidos(meses[0]);
  }
  actualizarDatos(0);

  // Función para filtrar pagos por mes
  window.filtrarPagos = function (mes) {
    updatePagosVencidos(mes);
  };

  // Función para filtrar alumnos por año
  window.filtrarAlumnos = function (descripcionAnio) {
    const indice = descripcionesAnio.indexOf(descripcionAnio);
    if (indice !== -1) {
      actualizarDatos(indice);
    }
  };
});
