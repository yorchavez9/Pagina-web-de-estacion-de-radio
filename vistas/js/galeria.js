/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#newImagen").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#imagenPreviewG").attr("src", e.target.result).show();
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
        $("#editImagenPreviewGG").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* EDITAR GALERIA */
  
  $(".tabla_galeria").on("click", ".btnEditarGaleria", function () {
    var idGaleria = $(this).attr("idGaleria");
    var datos = new FormData();
    datos.append("idGaleria", idGaleria);
  
    $.ajax({
      url: "ajax/Galeria.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
  
        $("#id_galeria").val(respuesta["id_galeria"]);
        $("#editTipo").val(respuesta["tipo"]);
  
        if (respuesta["imagen"] != "") {
          $("#editImagenPreviewG").attr("src", respuesta["imagen"]);
        } else {
          $("#editImagenPreviewG").attr(
            "src",
            "vistas/img/banner/default.png"
          );
        }
  
        $("#imagenActualG").val(respuesta["imagen"]);
      },
    });
  });
  
  /* ELIMINAR GALERIA */
  
  $(".tabla_galeria").on("click", ".btnEliminarGaleria", function () {
    var idGaleria = $(this).attr("idGaleria");
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
          "index.php?ruta=galerias&idGaleria=" + idGaleria + "&imagen=" + imagen;
      }
    });
  });
  