
// Definición inicial de dataTableAlumnos
$(document).ready(function () {
  var columnDefsAlumno = [
    { data: "idAlumno" },
    { data: "nombresAlumno" },
    { data: "apellidosAlumno" },
    { data: "sexoAlumno" },
    { data: "stateAlumno" },
    { data: "descripcionGrado" },
    { data: "descripcionNivel" },
    { data: "buttonsAlumno" },
  ];

  var tableAlumno = $("#dataTableAlumnos").DataTable({
    columns: columnDefsAlumno,
  });

  // Titulo dataTableAlumnos
  var data = new FormData();
  $(".tituloAlumnos").text("Todos los Alumnos");

  //Solicitud ajx inicial de dataTableAlumnosAdmin
  var data = new FormData();
  data.append("todosLosAlumnosAdmin", true);

  $.ajax({
    url: "ajax/alumnos.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (response) {
      tableAlumno.clear();
      tableAlumno.rows.add(response);
      tableAlumno.draw();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });

  //Estructura de dataTableAlumnos
  $("#dataTableAlumnos thead").html(`
      <tr>
        <th scope="col">#</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombres</th>
        <th scope="col">Sexo</th>
        <th scope="col">Estado</th>
        <th scope="col">Nivel</th>
        <th scope="col">Grado</th>
        <th scope="col">Acciones</th>
      </tr>
    `);

  table.destroy();

  columnDefsAlumno = [
    { data: "idAlumno" },
    { data: "nombresAlumno" },
    { data: "apellidosAlumno" },
    { data: "sexoAlumno" },
    { data: "stateAlumno" },
    { data: "descripcionGrado" },
    { data: "descripcionNivel" },
    { data: "buttonsAlumno" },
  ];
  tableAlumno = $("#dataTableAlumnos").DataTable({
    columns: columnDefsAlumno,
  });
});