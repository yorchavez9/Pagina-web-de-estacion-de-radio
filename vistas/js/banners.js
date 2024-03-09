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
