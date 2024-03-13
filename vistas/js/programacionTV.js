/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#imagenTV").change(function () {
  var input = this;
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#previewImgTV").attr("src", e.target.result).show();
    };
    reader.readAsDataURL(input.files[0]);
  }
});

/* ================================
      VISTA PREVIA DE EDITAR IMAGEN
      ================================ */

$("#editimagenTV").change(function () {
  var input = this;
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#editPreviewImgTV").attr("src", e.target.result).show();
    };
    reader.readAsDataURL(input.files[0]);
  }
});

/* ===================================
    ACTIVAR PROGRAMACION TV
    =================================== */

$(".tabla_programacion_tv").on("click", ".btnActivar", function () {
  var idTV = $(this).attr("idTV");
  var estadoTV = $(this).attr("estadoTV");

  var datos = new FormData();
  datos.append("activarId", idTV);
  datos.append("activarTV", estadoTV);

  $.ajax({
    url: "ajax/ProgramacionTV.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {},
    error: function () {
      alert("Error");
    },
  });

  if (estadoTV == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoTV", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoTV", 0);
  }
});

/* EDITAR PROGRAMACION RADIAL */

$(".tabla_programacion_tv").on("click",".btnEditarProgramacionTV",function () {
    var idTV = $(this).attr("idTV");
    var datos = new FormData();
    datos.append("idTV", idTV);

    $.ajax({
      url: "ajax/ProgramacionTV.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_tv").val(respuesta["id_tv"]);

        $("#editId_conductor").val(respuesta["id_conductor"]);
        $("#id_conductorEdit").val(respuesta["id_conductor"]);

        $("#editDia").val(respuesta["dia"]);
        $("#idDia").val(respuesta["dia"]);

        $("#editTitulo").val(respuesta["titulo"]);

        if (respuesta["imagen"] != "") {
          $("#editPreviewImgTV").attr("src", respuesta["imagen"]);
        } else {
          $("#editPreviewImgTV").attr("src","vistas/img/banner/default.png");
        }

        $("#imagenActualTV").val(respuesta["imagen"]);

        $("#editHora").val(respuesta["hora"]);
      },
    });
  }
);

/* ELIMINAR PROGRAMACION TV */

$(".tabla_programacion_tv").on("click",".btnEliminarProgramacionTV",function () {
    var idTV = $(this).attr("idTV");
    var imagen = $(this).attr("imagen");

    Swal.fire({
      title: "¿Está seguro de borrar la programación?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar programación!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=programacionTV&idTV=" + idTV + "&imagen=" + imagen;
      }
    });
  }
);
