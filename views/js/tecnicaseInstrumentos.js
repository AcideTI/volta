$("#btnAgregarInstrumento").on("click", function (e) {
  var listaInstrumentos = $(".listaInstrumentos");
  var inputInstrumentos = $(".listaInstrumentosPorTecnica");

  var nuevoInstrumento = `
      <div class="nuevoInstrumento" style="display: flex">
        <input type="text" placeholder="Descripción Instrumento" name="descripcionInstrumento" class="form-control descripcionInstrumento" required/>
        <input type="text" placeholder="Código Instrumento" name="codigoInstrumento" class="form-control codigoInstrumento" required/>
        <button type="button" class="btn btn-danger btnEliminarInstrumento">Eliminar</button>
      </div>
    `;
  listaInstrumentos.append(nuevoInstrumento);
  actualizarInstrumentos();

  function actualizarInstrumentos() {
    var instrumentos = [];
    document.querySelectorAll(".nuevoInstrumento").forEach((fila) => {
      var descripcion = fila.querySelector(
        "input[type=text]:nth-child(1)"
      ).value;
      var codigo = fila.querySelector("input[type=text]:nth-child(2)").value;
      instrumentos.push({ descripcion, codigo });
    });
    inputInstrumentos.val(JSON.stringify(instrumentos));
    console.log(inputInstrumentos.val());
  }

  $(".btnEliminarInstrumento").on("click", function (e) {
    $(this).parent().remove();
    actualizarInstrumentos();
  });
  $(".descripcionInstrumento").on("change", function (e) {
    actualizarInstrumentos();
  });
  $(".codigoInstrumento").on("change", function (e) {
    actualizarInstrumentos();
  });
});

$("#btnRegistrarTecnica").on("click", function () {
  var descripcionTecnica = $("#descripcionTecnica").val();
  var codigoTecnica = $("#codigoTecnica").val();
  var listaInstrumentosPorTecnica = $("#listaInstrumentosPorTecnica").val();

  var dataRegistrarTecnica = {
    descripcionTecnica: descripcionTecnica,
    codigoTecnica: codigoTecnica,
    listaInstrumentosPorTecnica: listaInstrumentosPorTecnica,
  };

  var data = new FormData();
  data.append("dataRegistrarTecnica", JSON.stringify(dataRegistrarTecnica));

  $.ajax({
    url: "ajax/tecnicaseInstrumentos.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response) {
        Swal.fire({
          icon: "success",
          title: "Registrado",
          text: "Técnica e Instrumento registrados correctamente",
          showConfirmButton: true,
        }).then((result) => {
          location.reload();
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Error al registrar la técnica e instrumento",
        timer: 2000,
        showConfirmButton: true,
      });
      console.error(
        "Error al registrar la técnica e instrumento: ",
        textStatus,
        errorThrown
      );
    },
  });
});

//  Obtener los datos del las tecnicas para visualizar
$(".dataTableTecnicas").on("click", ".btnVisualizarTecnica", function (e) {
  $(".visualizarListaInstrumentos").empty();
  var codTecnica = $(this).attr("codTecnica");

  var data = new FormData();
  data.append("codTecnicaVisualizar", codTecnica);

  $.ajax({
    url: "ajax/tecnicaseInstrumentos.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response == "error") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "La técnica no se encontró",
          timer: 2000,
          showConfirmButton: true,
        });
        return;
      } else {
        //  Mostrar los datos de las competencias
        var listaInstrumentos = JSON.parse(response.listaInstrumentos);
        $("#visualizarDescripcionTecnica").val(response.descripcionTecnica);
        $("#visualizarCodigoTecnica").val(response.codTecnica);

        var htmlInstrumentos = "";
        listaInstrumentos.forEach((instrumento) => {
          htmlInstrumentos += `
            <div class="nuevoInstrumento" style="display: flex">
              <input type="text" placeholder="Descripción Instrumento" name="descripcionInstrumento" class="form-control descripcionInstrumento" value="${instrumento.descripcionInstrumento}" readonly/>
              <input type="text" placeholder="Código Instrumento" name="codigoInstrumento" class="form-control codigoInstrumento" value="${instrumento.codInstrumento}" readonly/>
            </div>
          `;
        });
        $(".visualizarListaInstrumentos").append(htmlInstrumentos);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });
});

//  Obtener los datos del las tecnicas para editar
$(".dataTableTecnicas").on("click", ".btnEditarTecnica", function (e) {
  $(".editarListaInstrumentos").empty();
  var codTecnica = $(this).attr("codTecnica");

  var data = new FormData();
  data.append("codTecnicaVisualizar", codTecnica);

  $.ajax({
    url: "ajax/tecnicaseInstrumentos.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response == "error") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "La técnica no se encontró",
          timer: 2000,
          showConfirmButton: true,
        });
        return;
      } else {
        //  Mostrar los datos de las competencias
        var listaInstrumentos = JSON.parse(response.listaInstrumentos);
        $("#editarDescripcionTecnica").val(response.descripcionTecnica);
        $("#editarCodigoTecnica").val(response.codTecnica);
        $("#idTecnica").val(response.idTecnicaEvaluacion);

        var htmlInstrumentos = "";
        listaInstrumentos.forEach((instrumento) => {
          htmlInstrumentos += `
            <div class="editarInstrumento" style="display: flex">
              <input type="text" placeholder="Descripción Instrumento" name="editarDescripcionInstrumento" class="form-control editarDescripcionInstrumento" value="${instrumento.descripcionInstrumento}" required/>
              <input type="text" placeholder="Código Instrumento" name="editarCodigoInstrumento" class="form-control editarCodigoInstrumento" value="${instrumento.codInstrumento}" required/>
              <button type="button" class="btn btn-danger btnEliminarEditarInstrumento" codInstrumento="${instrumento.idInstrumento}"><i class='bi bi-trash'></i></button>
            </div>
          `;
        });
        $(".editarListaInstrumentos").append(htmlInstrumentos);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });
});

$("#btnAgregarInstrumentoEditar").on("click", function (e) {
  var listaInstrumentos = $(".editarListaInstrumentos");
  var nuevoInstrumento = `
      <div class="editarInstrumento" style="display: flex">
        <input type="text" placeholder="Descripción Instrumento" name="editarDescripcionInstrumento" class="form-control editarDescripcionInstrumento" required/>
        <input type="text" placeholder="Código Instrumento" name="editarCodigoInstrumento" class="form-control editarCodigoInstrumento" required/>
        <button type="button" class="btn btn-danger btnEliminarEditarInstrumento" codInstrumento=" "><i class='bi bi-trash'></i></button>
      </div>
    `;
  listaInstrumentos.append(nuevoInstrumento);
  actualizarInstrumentosEditar();
});

function actualizarInstrumentosEditar() {
  var instrumentos = [];
  document.querySelectorAll(".editarInstrumento").forEach((fila) => {
    var descripcion = fila.querySelector("input[type=text]:nth-child(1)").value;
    var codigo = fila.querySelector("input[type=text]:nth-child(2)").value;
    var codInstrumento =
      fila
        .querySelector(".btnEliminarEditarInstrumento")
        .getAttribute("codInstrumento") || undefined;
    instrumentos.push({ descripcion, codigo, codInstrumento });
  });
  $("#nuevaListaInstrumentos").val(JSON.stringify(instrumentos));
}

$(".btnEliminarEditarInstrumento").on("click", function (e) {
  $(this).parent().remove();
  actualizarInstrumentosEditar();
});

$(".editarListaInstrumentos").on(
  "change",
  ".editarDescripcionInstrumento",
  function (e) {
    actualizarInstrumentosEditar();
  }
);
$(".editarListaInstrumentos").on(
  "change",
  ".editarCodigoInstrumento",
  function (e) {
    actualizarInstrumentosEditar();
  }
);

$(".editarListaInstrumentos").on(
  "click",
  ".btnEliminarEditarInstrumento",
  function (e) {
    var instrumento = $(this).parent();
    var codInstrumento = $(this).attr("codInstrumento");
    if (codInstrumento != " ") {
      var data = new FormData();
      data.append("codInstrumentoEliminar", codInstrumento);

      $.ajax({
        url: "ajax/tecnicaseInstrumentos.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
          if (response) {
            instrumento.remove()
            actualizarInstrumentosEditar();
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "No se puede eliminar el instrumento, ya se está usando",
              timer: 2000,
              showConfirmButton: true,
            });
            return;
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Error al eliminar el instrumento",
            timer: 2000,
            showConfirmButton: true,
          });
          return;
        },
      });
    } else {
      $(this).parent().remove();
      actualizarInstrumentosEditar();
    }
  }
);

$("#btnEditarTecnica").on("click", function () {
  var descripcionTecnica = $("#editarDescripcionTecnica").val();
  var codigoTecnica = $("#editarCodigoTecnica").val();
  var nuevaListaInstrumentos = $("#nuevaListaInstrumentos").val();
  var idTecnica = $("#idTecnica").val();

  var dataEditarTecnica = {
    descripcionTecnica: descripcionTecnica,
    codigoTecnica: codigoTecnica,
    idTecnica: idTecnica,
    nuevaListaInstrumentos: nuevaListaInstrumentos,
  };

  var data = new FormData();
  data.append("dataEditarTecnica", JSON.stringify(dataEditarTecnica));

  $.ajax({
    url: "ajax/tecnicaseInstrumentos.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response == true) {
        Swal.fire({
          icon: "success",
          title: "Registrado",
          text: "Técnica e Instrumento editados correctamente",
          showConfirmButton: true,
        })
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Error al editar la técnica e instrumento",
        timer: 2000,
        showConfirmButton: true,
      });
    },
  });
});

$(".dataTableTecnicas").on("click", ".btnEliminarTecnica", function (e) {
  var codTecnica = $(this).attr("codTecnica");
  var data = new FormData();
  data.append("codTecnicaEliminar", codTecnica);
  $.ajax({
    url: "ajax/tecnicaseInstrumentos.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response) {
        Swal.fire({
          icon: "success",
          title: "Registrado",
          text: "Técnica Eliminada",
          showConfirmButton: true,
        }).then((result) => {
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se puede eliminar, ya se está usando en una evaluación",
          showConfirmButton: true,
        }).then((result) => {
          location.reload();
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Error Eliminar la técnica e instrumento",
        timer: 2000,
        showConfirmButton: true,
      });
    },
  });
});
