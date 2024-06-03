// Redireccionar a la vista de notas de un curso en específico
$("#dataTableCursosDocente").on("click", "#btnNotasCursoDocente", function () {
  const idCurso = $(this).attr("idCurso");
  const idGrado = $(this).attr("idGrado");
  const idPersonal = $(this).attr("idPersonal");
  window.location =
    "index.php?ruta=notasCursoDocente&idCurso=" +
    idCurso +
    "&idGrado=" +
    idGrado +
    "&idPersonal=" +
    idPersonal;
});
$(document).ready(function () {
  // Obtener la URL actual
  var urlParams = new URLSearchParams(window.location.search);

  // Obtener el valor de los parámetros de la URL
  var ruta = urlParams.get("ruta");
  var idCurso = urlParams.get("idCurso");
  var idGrado = urlParams.get("idGrado");
  var idPersonal = urlParams.get("idPersonal");
  var data = new FormData();
  data.append("todoslosBimestres", true);
  data.append("idCurso", idCurso);
  data.append("idGrado", idGrado);

  // Define los nombres de los botones con texto, clases e ids como marcadores de posición
  var buttonNames = [
    { text: "Placeholder 1", class: "btn btn-primary", id: "" },
    { text: "Placeholder 2", class: "btn btn-secondary", id: "" },
    { text: "Placeholder 3", class: "btn btn-success", id: "" },
    { text: "Placeholder 4", class: "btn btn-danger", id: "" },
  ];

  $.ajax({
    url: "ajax/bimestre.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (response) {
      // Actualiza el texto y el id de los botones basándose en la respuesta AJAX
      response.forEach((value, index) => {
        if (buttonNames[index]) {
          buttonNames[index].text = value.descripcionBimestre;
          buttonNames[index].id = "btnBimestre";
          buttonNames[index].data = {
            idBimestre: value.idBimestre,
            estadoBimestre: value.estadoBimestre,
          }; // Almacenar idBimestre y estado del bimestre en data
        }
      });

      const buttonContainer = $("#buttonContainer");

      buttonNames.forEach((button) => {
        const btn = $("<button></button>")
          .attr("type", "button")
          .attr("id", button.id)
          .addClass(button.class)
          .text(button.text)
          .css("margin-right", "10px") // Añadir margen a cada botón
          .data("idBimestre", button.data.idBimestre) // Guardar idBimestre en data
          .prop("disabled", button.data.estadoBimestre == 0); // Deshabilitar botón si estadoUnidad es 0
        buttonContainer.append(btn);
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText); // Procedencia de error
      console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });
});
// Funcionalidad para los Botones de Bimestres
$("#buttonContainer").on("click", "#btnBimestre", function () {
  var idBimestre = $(this).data("idBimestre"); // Obtener idBimestre
  // Define los nombres de los botones con texto, clases e ids como marcadores de posición
  var buttonNames = [
    { text: "Placeholder 1", class: "btn btn-warning", id: "" },
    { text: "Placeholder 2", class: "btn btn-info", id: "" },
  ];
  // Solicitud AJAX inicial
  var data = new FormData();
  data.append("idBimestre", idBimestre);

  $.ajax({
    url: "ajax/unidad.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (response) {
      $("#secondButtonContainer").empty();
      $("#thirdButtonContainer").empty();
      // Limpiar el DataTable
      $("#dataTableNotasCursoDocente").DataTable().clear().draw();
      // Actualiza el texto y el id de los botones basándose en la respuesta AJAX
      response.forEach((value, index) => {
        if (buttonNames[index]) {
          buttonNames[index].text = value.descripcionUnidad;
          buttonNames[index].id = "btnUnidad";
          buttonNames[index].data = {
            idUnidad: value.idUnidad,
            estadoUnidad: value.estadoUnidad,
            idBimestre: idBimestre,
          }; // Almacenar idUnidad y estadoUnidad en data
        }
      });

      const buttonContainer = $("#secondButtonContainer");

      buttonNames.forEach((button) => {
        const btn = $("<button></button>")
          .attr("type", "button")
          .attr("id", button.id)
          .addClass(button.class)
          .text(button.text)
          .css("margin-right", "10px") // Añadir margen a cada botón
          .data("idUnidad", button.data.idUnidad) // Guardar idUnidad en data
          .data("idBimestre", button.data.idBimestre) // Guardar idBimestre en data
          .prop("disabled", button.data.estadoUnidad == 0); // Deshabilitar botón si estadoUnidad es 0
        buttonContainer.append(btn);
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText); // Procedencia de error
      console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });
});

$("#thirdButtonContainer").on("click", "#btnVerCompetencias", function () {
  $('#modalCompetenciaUnidad').modal('show');
});
$("#modalIngresarCompetencia").on("click", "#btnCerrarModalCompetencia", function () {
  $('#modalIngresarCompetencia').modal('hide');
  $('#modalCompetenciaUnidad').modal('show');
});
$("#btnAgregarCompetencia").on("click", function () {
  var idUnidad = $(this).attr("idUnidad"); // Obtén el valor de idUnidad del botón btnAgregarCompetencia
  $("#btnCrearCompetencia").attr("idUnidad", idUnidad); // Establece el valor de idUnidad en el botón btnCrearCompetencia
});


$("#modalIngresarCompetencia").on("click", "#btnCrearCompetencia", function () {
  var idUnidad = $(this).attr("idUnidad"); // Obtén el valor de idUnidad del botón btnCrearCompetencia
  var notaText = $("#notaText").val(); // Obtén el valor del elemento con id notaText
  console.log(notaText);
  var data = new FormData();
  data.append("idUnidadCrear", idUnidad);
  data.append("descripcionCompetenciaCrear", notaText);
  $.ajax({
    url: "ajax/unidad.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      if(response !="error"){
        Swal.fire({
          title: 'Operación Exitosa',
          text: 'La operación se ha realizado con éxito.',
          icon: 'success',
          confirmButtonText: 'Aceptar'
      });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText); // Procedencia de error
      console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });
});








