
/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#imagenAnuncioB").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewImgAnuncioB").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ================================
    VISTA PREVIA DE EDITAR IMAGEN
    ================================ */
  
  $("#EditImagenAnuncioB").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#editPreviewImgAnuncioB").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ===================================
  ACTIVAR ANUNACIO A
  =================================== */
  
  $(".tabla_anuncioB").on("click", ".btnActivar", function () {

    var idAnuncioB = $(this).attr("idAnuncioB");
    var estadoAnuncioB = $(this).attr("estadoAnuncioB");
  
    var datos = new FormData();
    datos.append("activarId", idAnuncioB);
    datos.append("activarAnuncioB", estadoAnuncioB);
  
    $.ajax({
      url: "ajax/Anunciob.ajax.php",
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
  
    if (estadoAnuncioB == 0) {
      $(this).removeClass("btn-success");
      $(this).addClass("btn-danger");
      $(this).html("Desactivado");
      $(this).attr("estadoAnuncioB", 1);
    } else {
      $(this).addClass("btn-success");
      $(this).removeClass("btn-danger");
      $(this).html("Activado");
      $(this).attr("estadoAnuncioB", 0);
    }
  });
  
  /* EDITAR ANUNACIO A */
  
  $(".tabla_anuncioB").on("click", ".btnEditarAnuncioB", function () {
    var idAnuncioB = $(this).attr("idAnuncioB");
    var datos = new FormData();
    datos.append("idAnuncioB", idAnuncioB);
  
    $.ajax({
      url: "ajax/Anunciob.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_anuncioB").val(respuesta["id_anuncioB"]);
  
        if (respuesta["imagen"] != "") {
          $("#editPreviewImgAnuncioB").attr("src", respuesta["imagen"]);
        } else {
          $("#editPreviewImgAnuncioB").attr(
            "src",
            "vistas/img/banner/default.png"
          );
        }
  
        $("#imagenActualAnuncioB").val(respuesta["imagen"]);

      },
    });
  });
  
  /* ELIMINAR ANUNACIO A */
  
  $(".tabla_anuncioB").on("click", ".btnEliminarAnuncioB", function () {
    var idAnuncioB = $(this).attr("idAnuncioB");
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
          "index.php?ruta=anunciob&idAnuncioB=" + idAnuncioB + "&imagen=" + imagen;
      }
    });
  });
  