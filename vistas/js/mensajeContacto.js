/* ===================================
  ACTIVAR MENSAJE
  =================================== */

$(".tabla_mensaje").on("click", ".btnActivar", function () {
  var idMensaje = $(this).attr("idMensaje");
  var estadoMensaje = $(this).attr("estadoMensaje");

  var datos = new FormData();
  datos.append("activarId", idMensaje);
  datos.append("activarMensaje", estadoMensaje);

  $.ajax({
    url: "ajax/MensajeContacto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        Swal.fire({
          title: "El usuario ha sido actualizado",
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

  if (estadoMensaje == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("ver");
    $(this).attr("estadoMensaje", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("visto");
    $(this).attr("estadoMensaje", 0);
  }
});

/* ===================================
VER USUARIO
=================================== */

$(".tabla_mensaje").on("click", ".btnVerMensaje", function () {
  var idMensaje = $(this).attr("idMensaje");

  var datos = new FormData();
  datos.append("idMensaje", idMensaje);

  $.ajax({
    url: "ajax/MensajeContacto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#showNombre").text(respuesta["nombre"]);
      $("#showCorreo").text(respuesta["correo"]);
      $("#showTelefono").text(respuesta["telefono"]);
      $("#showCompania").text(respuesta["compania"]);
      $("#showMensaje").text(respuesta["mensaje"]);

      $("#showFecha").text(respuesta["fecha"]);
    },
  });
});

/* ===================================
  ELIMINAR MENSAJE
  =================================== */

$(".tabla_mensaje").on("click", ".btnEliminarMensaje", function () {
  var idMensaje = $(this).attr("idMensaje");

  Swal.fire({
    title: "¿Está seguro de borrar el mensaje?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar mensaje!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=mensajeContacto&idMensaje=" + idMensaje;
    }
  });
});
