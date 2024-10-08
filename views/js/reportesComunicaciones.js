$(".dataTableReportesComunicaciones").on(
  "click",
  ".btnVerComunicadosAlumno",
  function () {
    var codAlumnoComunicado = $(this).attr("codAlumnoComunicado");
    var codAlumno = $(this).attr("codAlumno");
    window.location =
      "index.php?ruta=registrarComunicadoPago&codAdAlumCronograma=" +
      codAlumnoComunicado +
      "&codAlumno=" +
      codAlumno+"&reporteComunicados=1";
  }
);

// Reporte de comunicaciones
$("#btnDescargarReporteComunicados").on("click", function () {
  var data = new FormData();
  data.append("comunicadosPorAlumno", true);
  $.ajax({
    url: "ajax/reportesComunicados.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        const data = respuesta.map((comunicado) => {
          delete comunicado["idAlumno"];
          return comunicado;
        });

        crearComunicadoExcel(data, "Comunicados", "Reporte de Comunicados");
      }
    },
    error: function (error) {
      console.error("error", error);
    },
  });
});

/* // Reporte de comunicaciones por rango de fechas

$('input[name="daterangecomunicados"]').daterangepicker(
  {
    opens: "left",
    locale: {
      format: "YYYY-MM-DD",
      cancelLabel: "Limpiar",
      applyLabel: "Aplicar",
      fromLabel: "Desde",
      toLabel: "Hasta",
      daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
      monthNames: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ],
    },
  },
  function (start, end, label) {}
);

// Limpiar el select de meses al cerrar el modal
$("#seleccionarRangoFechasComunicados").on("hidden.bs.modal", function () {
  const $rangeFechas = $("#daterangecomunicados");
  const fechaActual = moment().format("YYYY-MM-DD");
  $rangeFechas.data("daterangepicker").setStartDate(fechaActual);
  $rangeFechas.data("daterangepicker").setEndDate(fechaActual);
});

// Descargar reporte de comunicaciones por rango de fechas

$("#btnDescargarReporteComunicadosFechas").on("click", function () {
  const fechaInicio = $('input[name="daterangecomunicados"]')
    .data("daterangepicker")
    .startDate.format("YYYY-MM-DD");
  const fechaFin = $('input[name="daterangecomunicados"]')
    .data("daterangepicker")
    .endDate.format("YYYY-MM-DD");

  var data = new FormData();
  data.append("comunicadosPorRangoFechas", true);
  data.append("fechaInicio", fechaInicio);
  data.append("fechaFin", fechaFin);

  $.ajax({
    url: "ajax/reportesComunicados.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        const data = respuesta.map((comunicado) => {
          delete comunicado["idAlumno"];
          return comunicado;
        });
        crearComunicadoExcel(data, "Comunicados", "Reporte de Comunicados");
      }
      $("#seleccionarRangoFechasComunicados").modal("hide");
    },
    error: function (error) {
      console.error("error", error);
    },
  });
}); */

//  Descargar reporte exel de notas por meses
$(document).ready(function () {
  $(function () {
    var boton = $("#btnDescargarMmReport");
    boton.daterangepicker(
      {
        opens: "left",
        locale: {
          format: "YYYY-MM-DD",
          cancelLabel: "Limpiar",
          applyLabel: "Aplicar",
          fromLabel: "Desde",
          toLabel: "Hasta",
          daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          monthNames: [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
          ],
        },
      },
      function (start, end) {
        boton.val(
          start.format("YYYY-MM-DD") + " - " + end.format("YYYY-MM-DD")
        );
      }
    );
    // Limpiar fechas seleccionadas cuando se presiona "Limpiar" y mantener el daterangepicker abierto
    boton.on("cancel.daterangepicker", function (ev, picker) {
      const fechaActual = moment().format("YYYY-MM-DD");
      picker.setStartDate(fechaActual);
      picker.setEndDate(fechaActual);
      picker.updateView();
      picker.show(); // Mantener el daterangepicker abierto
      $(this).val(""); // Limpiar el campo de entrada
      $(this).removeClass("drp-selected"); // Eliminar la clase drp-selected
	  $(".drp-selected").empty();
    });

    //agraga la fecha actual si no se selecciona ninguna fecha al clickear en el boton aplly
    //tambien si solo se selciona una solo fecha
    boton.on("apply.daterangepicker", function (ev, picker) {
      var rangoFechas = $(this).val().split(" - ");
      var fechaInicioNot = rangoFechas[0];
      var fechaFinNot = rangoFechas[1];
      var fechaActualNot = new Date().toISOString().split("T")[0]; // obtiene la fecha actual en formato YYYY-MM-DD
      if (!fechaInicioNot && !fechaFinNot) {
        fechaInicioNot = fechaActualNot;
        fechaFinNot = fechaActualNot;
      } else if (!fechaFinNot) {
        fechaFinNot = fechaInicioNot;
      } else if (!fechaInicioNot) {
        fechaInicioNot = fechaFinNot;
      }
      console.log(fechaInicioNot, fechaFinNot);
      var rangoFechas = $(this).val().split(" - ");
      var fechaInicioNot = rangoFechas[0];
      var fechaFinNot = rangoFechas[1];
      const fechaInicio = fechaInicioNot;
      const fechaFin = fechaFinNot;

      var data = new FormData();
      data.append("comunicadosPorRangoFechas", true);
      data.append("fechaInicio", fechaInicio);
      data.append("fechaFin", fechaFin);
      $.ajax({
        url: "ajax/reportesComunicados.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta) {
            const data = respuesta.map((comunicado) => {
              delete comunicado["idAlumno"];
              return comunicado;
            });
            crearComunicadoExcel(data, "Comunicados", "Reporte de Comunicados");
          }
        },
        error: function (error) {
          console.error("error", error);
        },
      });
    });
  });
});

/**
 * Crea un archivo Excel a partir de los datos proporcionados.
 *
 * @param {Array} data - Los datos que se utilizarán para crear el archivo Excel.
 * @param {string} nombreHoja - El nombre de la hoja de trabajo en el archivo Excel.
 * @param {string} nombreArchivo - El nombre del archivo Excel.
 */
const crearComunicadoExcel = (data, nombreHoja, nombreArchivo) => {
  // Crear un nuevo libro de trabajo
  var workbook = XLSX.utils.book_new();

  // Crear una hoja de trabajo
  const ws = XLSX.utils.json_to_sheet(data);

  const date = new Date().toLocaleDateString().replaceAll("/", "-");

  // Agregar estilo a la columna A
  ws["!cols"] = [{ wpx: 100 }, { wpx: 100 }, { wpx: 100 }, { wpx: 100 }];

  // Agregar la hoja de trabajo al libro de trabajo
  XLSX.utils.book_append_sheet(workbook, ws, nombreHoja);

  // Generar el archivo Excel
  var excelBuffer = XLSX.write(workbook, {
    bookType: "xlsx",
    type: "array",
  });

  // Convertir el archivo Excel en un Blob
  var blob = new Blob([excelBuffer], {
    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
  });

  // Crear un enlace de descarga
  var url = URL.createObjectURL(blob);
  var link = document.createElement("a");
  link.href = url;
  link.download = nombreArchivo + ".xlsx";
  link.click();

  // Liberar el enlace de descarga
  URL.revokeObjectURL(url);
};
