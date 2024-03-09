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
    },error: function(message) {
        alert("Errro")
    }
  });
});
