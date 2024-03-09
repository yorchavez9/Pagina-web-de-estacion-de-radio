/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#newImagen").change(function () {
  var input = this;
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#imagenPreview").attr("src", e.target.result).show();
    };
    reader.readAsDataURL(input.files[0]);
  }
});

/* ================================
VISTA PREVIA DE EDITAR IMAGEN
================================ */

$("#editImagen").change(function () {
  var input = this;
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#editImagenPreview").attr("src", e.target.result).show();
    };
    reader.readAsDataURL(input.files[0]);
  }
});

/* EDITAR USUARIO */

$(".tabla_banner").on("click", ".btnEditarBanner", function () {
  var idBanner = $(this).attr("idBanner");
  var datos = new FormData();
  datos.append("idBanner", idBanner);

  $.ajax({
    url: "ajax/Banner.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      $("#id_banner").val(respuesta["id_banner"]);

      if (respuesta["imagen"] != "") {
        $("#editImagenPreview").attr("src", respuesta["imagen"]);
      } else {
        $("#editImagenPreview").attr(
          "src",
          "vistas/img/banner/default.png"
        );
      }

      $("#imagenActual").val(respuesta["imagen"]);
    },
  });
});

/* ELIMINAR USUARIO */

$(".tabla_banner").on("click", ".btnEliminarBanner", function () {
  var idBanner = $(this).attr("idBanner");
  var imagen = $(this).attr("imagen");

  Swal.fire({
    title: "¿Está seguro de borrar la imagen?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar imagen!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=banners&idBanner=" + idBanner + "&imagen=" + imagen;
    }
  });
});
