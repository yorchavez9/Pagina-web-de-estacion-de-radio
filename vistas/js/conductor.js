

/* ===================================
  ACTIVAR CONDUCTOR
  =================================== */

$(".tabla_conductor").on("click", ".btnActivar", function () {
  var idConductor = $(this).attr("idConductor");
  var estadoConductor = $(this).attr("estadoConductor");

  var datos = new FormData();
  datos.append("activarId", idConductor);
  datos.append("activarConductor", estadoConductor);

  $.ajax({
    url: "ajax/Conductor.ajax.php",
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
            window.location = "conductores";
          }
        });
      }
    },
  });

  if (estadoConductor == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoConductor", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoConductor", 0);
  }
});

/* ===================================
  EDITAR CONDUCTOR
  =================================== */

$(".tabla_conductor").on("click", ".btnEditarConductor", function () {

  var idConductor = $(this).attr("idConductor");

  var datos = new FormData();
  datos.append("idConductor", idConductor);

  $.ajax({
    url: "ajax/Conductor.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_conductor").val(respuesta["id_conductor"]);
      $("#editNombre").val(respuesta["nombre"]);
      $("#editApellidos").val(respuesta["apellidos"]);
      $("#editTipo").val(respuesta["tipo"]);
      $("#editCorreo").val(respuesta["correo"]);
      $("#editTelefono").val(respuesta["telefono"]);
      $("#editExperiencia").val(respuesta["experiencia"]);
      $("#editHabilidad").val(respuesta["habilidad"]);
    },
  });
});

/* ===================================
  ELIMINAR CONDUCTOR
  =================================== */

$(".tabla_conductor").on("click", ".btnEliminarConductor", function () {
  var idConductor = $(this).attr("idConductor");

  Swal.fire({
    title: "¿Está seguro de borrar el conductor?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar conductor!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=conductores&idConductor=" + idConductor;
    }
  });
});
