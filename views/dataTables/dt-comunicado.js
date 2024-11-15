// Definición inicial de dataTableComunicadoPago
$(document).ready(function () {
  var columnDefPagoAlumnos = [
    {
      data: "null",
      render: function (data, type, row, meta) {
        return meta.row + 1;
      },
    },
    { data: "apellidosAlumno" },
    { data: "nombresAlumno" },
    { data: "codAlumnoCaja" },
    { data: "dniAlumno" },
    { data: "estadoAlPag" },
    { data: "btnPagoAlumnos" },
  ];

  var tablePagoAlumnos = $("#dataTableComunicadoPago").DataTable({
    columns: columnDefPagoAlumnos,
  });

  // Titulo dataTableComunicadoPago
  $(".tituloPagoAlumnos").text("Todas las Comunicaciones");

  //Solicitud ajx inicial de dataTableComunicadoPagoAdmin
  var data = new FormData();
  data.append("registroComunicadoPago", true);

  $.ajax({
    url: "ajax/comunicado.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (response) {
      tablePagoAlumnos.clear();
      tablePagoAlumnos.rows.add(response);
      tablePagoAlumnos.draw();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText); // procendecia de error
      console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });

  //Estructura de dataTableComunicadoPago
  $("#dataTableComunicadoPago thead").html(`
      <tr>
        <th scope="col">#</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombres</th>
        <th scope="col">Código Caja</th>
        <th scope="col">Dni</th>
        <th scope="col">Estado</th>
        <th scope="col">Aciones</th>
      </tr>
    `);

  tablePagoAlumnos.destroy();

  columnDefPagoAlumnos = [
    {
      data: "null",
      render: function (data, type, row, meta) {
        return meta.row + 1;
      },
    },
    { data: "apellidosAlumno" },
    { data: "nombresAlumno" },
    { data: "codAlumnoCaja" },
    { data: "dniAlumno" },
    { data: "estadoAlPag" },
    { data: "btnPagoAlumnos" },
  ];

  var tablePagoAlumnos = $("#dataTableComunicadoPago").DataTable({
		columns: columnDefPagoAlumnos,
		language: {
			url: "views/dataTables/Spanish.json",
		},
  });
});
