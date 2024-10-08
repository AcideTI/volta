// boton para abrir modal modalListadoAlumnosCurso con el dato del idCurso, idGrado y el idPersonal
$("#dataTableCursosDocente").on("click", "#btnVerAlumnosCurso", function () {
	var idCurso = $(this).attr("idCurso");
	var idGrado = $(this).attr("idGrado");
	var idPersonal = $(this).attr("idPersonal");

	$("#modalListadoAlumnosCurso").modal("show");

	//Solicitud inicial de dataTableAlumnosCurso

	var columnDefsAlumnosCurso = [
		{ data: "idAlumno" },
		{ data: "nombresAlumno" },
		{ data: "apellidosAlumno" },
		{ data: "acciones" },
	];

	var tableAlumnosCurso = $("#dataTableListadoAlumnosCurso").DataTable({
		columns: columnDefsAlumnosCurso,
		retrieve: true,
		paging: false,
	});

	const dataListaAlumnosCurso = {
		idCurso: idCurso,
		idGrado: idGrado,
		idPersonal: idPersonal,
		todosLosAlumnosCurso: true,
	};
	// crear la formdata con datalistaAlumnosCurso
	var data = new FormData();
	data.append("todosLosAlumnosCurso", JSON.stringify(dataListaAlumnosCurso));

	$.ajax({
		url: "ajax/alumnos.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (response) {
			tableAlumnosCurso.clear();
			tableAlumnosCurso.rows.add(response);
			tableAlumnosCurso.draw();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText); // procendecia de error
			console.log(
				"Error en la solicitud AJAX: ",
				textStatus,
				errorThrown
			);
		},
	});

	//Estructura de dataTableAlumnosCurso
	$("#dataTableListadoAlumnosCurso thead").html(`
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Acciones</th>
    </tr>
    `);

	tableAlumnosCurso.destroy();

	columnDefsAlumnosCurso = [
		{
			data: null,
			render: function (data, type, row, meta) {
				return meta.row + 1;
			},
		},
		{ data: "nombresAlumno" },
		{ data: "apellidosAlumno" },
		{ data: "acciones" },
	];
	tableAlumnosCurso = $("#dataTableListadoAlumnosCurso").DataTable({
		columns: columnDefsAlumnosCurso,
		language: {
			url: "views/dataTables/Spanish.json",
		},
	});
});
