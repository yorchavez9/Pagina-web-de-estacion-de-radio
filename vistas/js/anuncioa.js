
/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#imagenAnuncioA").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewImgAnuncioA").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ================================
    VISTA PREVIA DE EDITAR IMAGEN
    ================================ */
  
  $("#EditImagenAnuncioA").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#editPreviewImgAnuncioA").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ===================================
  ACTIVAR ANUNACIO A
  =================================== */
  
  $(".tabla_anuncioA").on("click", ".btnActivar", function () {

    var idAnuncioA = $(this).attr("idAnuncioA");
    var estadoAnuncioA = $(this).attr("estadoAnuncioA");
  
    var datos = new FormData();
    datos.append("activarId", idAnuncioA);
    datos.append("activarAnuncioA", estadoAnuncioA);
  
    $.ajax({
      url: "ajax/Anuncioa.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        
      },
      error: function(){
        alert("Error")
      }
    });
  
    if (estadoAnuncioA == 0) {
      $(this).removeClass("btn-success");
      $(this).addClass("btn-danger");
      $(this).html("Desactivado");
      $(this).attr("estadoAnuncioA", 1);
    } else {
      $(this).addClass("btn-success");
      $(this).removeClass("btn-danger");
      $(this).html("Activado");
      $(this).attr("estadoAnuncioA", 0);
    }
  });
  
  /* EDITAR ANUNACIO A */
  
  $(".tabla_anuncioA").on("click", ".btnEditarAnuncioA", function () {
    var idAnuncioA = $(this).attr("idAnuncioA");
    var datos = new FormData();
    datos.append("idAnuncioA", idAnuncioA);
  
    $.ajax({
      url: "ajax/Anuncioa.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_anuncioA").val(respuesta["id_anuncioA"]);
  
        if (respuesta["imagen"] != "") {
          $("#editPreviewImgAnuncioA").attr("src", respuesta["imagen"]);
        } else {
          $("#editPreviewImgAnuncioA").attr(
            "src",
            "vistas/img/banner/default.png"
          );
        }
  
        $("#imagenActualAnuncioA").val(respuesta["imagen"]);

      },
    });
  });
  
  /* ELIMINAR ANUNACIO A */
  
  $(".tabla_anuncioA").on("click", ".btnEliminarAnuncioA", function () {
    var idAnuncioA = $(this).attr("idAnuncioA");
    var imagen = $(this).attr("imagen");
  
    Swal.fire({
      title: "¿Está seguro de borrar el anuncio?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar anuncio!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=anuncioa&idAnuncioA=" + idAnuncioA + "&imagen=" + imagen;
      }
    });
  });
  