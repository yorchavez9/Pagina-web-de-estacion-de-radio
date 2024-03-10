
/* ===================================
  ACTIVAR USUARIO
  =================================== */

$(".tabla_video").on("click", ".btnActivar", function () {
  var idVideo = $(this).attr("idVideo");
  var estadoVideo = $(this).attr("estadoVideo");

  var datos = new FormData();
  datos.append("activarId", idVideo);
  datos.append("activarVideo", estadoVideo);

  $.ajax({
    url: "ajax/Video.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        Swal.fire({
          title: "El video ha sido actualizado",
          icon: "success",
          confirmButtonText: "¡Cerrar!",
        }).then(function (result) {
          if (result.value) {
            window.location = "usuarios";
          }
        });
      }
    },
  });

  if (estadoVideo == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoVideo", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoVideo", 0);
  }
});

/* ===================================
  EDITAR USUARIO
  =================================== */

$(".tabla_video").on("click", ".btnEditarVideo", function () {
  
  var idVideo = $(this).attr("idVideo");


  var datos = new FormData();
  datos.append("idVideo", idVideo);

  $.ajax({
    url: "ajax/Video.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_video").val(respuesta["id_video"]);
      $("#editTitulo").val(respuesta["titulo"]);
      $("#editVideo_url").val(respuesta["video_url"]);
    },
  });
});

/* ===================================
  ELIMINAR USUARIO
  =================================== */

$(".tabla_video").on("click", ".btnEliminarVideo", function () {
  var idVideo = $(this).attr("idVideo");

  Swal.fire({
    title: "¿Está seguro de borrar el video?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar video!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=videos&idVideo=" + idVideo;
    }
  });
});
