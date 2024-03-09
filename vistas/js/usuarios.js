/* ===================================
MOSTRANDO CONTRASEÑA
=================================== */

$(document).ready(function () {
  $("#show_hide_password a").on("click", function (event) {
    event.preventDefault();
    if ($("#show_hide_password input").attr("type") == "text") {
      $("#show_hide_password input").attr("type", "password");
      $("#show_hide_password i").addClass("bx-hide");
      $("#show_hide_password i").removeClass("bx-show");
    } else if ($("#show_hide_password input").attr("type") == "password") {
      $("#show_hide_password input").attr("type", "text");
      $("#show_hide_password i").removeClass("bx-hide");
      $("#show_hide_password i").addClass("bx-show");
    }
  });
});

/* ===================================
VALIDANDO EL CORREO SI EXISTE
=================================== */

$("#validarCorreo").change(function () {
  $(".alert").remove();

  let correo = $(this).val();

  let datos = new FormData();
  datos.append("validarCorreo", correo);

  $.ajax({
    url: "ajax/Usuario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (resp) {
      if (resp) {
        $("#validarCorreo")
          .parent()
          .after(
            '<div class="alert alert-warning">Este correo ya existe en la base de datos</div>'
          );
        $("#validarCorreo").val("");
      }
    },
    error: function (message) {
      alert("Errro");
    },
  });
});

/* ===================================
ACTIVAR USUARIO
=================================== */

$(".tabla_usuario").on("click", ".btnActivar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/Usuario.ajax.php",
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

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoUsuario", 0);
  }
});

/* ===================================
EDITAR USUARIO
=================================== */

$(".tabla_usuario").on("click", ".btnEditarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");

  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url: "ajax/Usuario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_usuario").val(respuesta["id_usuario"]);
      $("#editNombre").val(respuesta["nombre"]);
      $("#editApellidos").val(respuesta["apellidos"]);
      $("#editPerfil").val(respuesta["perfil"]);
      $("#editCorreo").val(respuesta["correo"]);
      $("#passwordActual").val(respuesta["password"]);
    },
  });
});

/* ===================================
ELIMINAR USUARIO
=================================== */

$(".tabla_usuario").on("click", ".btnEliminarUsuario", function () {

  var idUsuario = $(this).attr("idUsuario")

  Swal.fire({
    title: "¿Está seguro de borrar el usuario?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar usuario!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=usuarios&idUsuario=" + idUsuario;
    }
  });
});
