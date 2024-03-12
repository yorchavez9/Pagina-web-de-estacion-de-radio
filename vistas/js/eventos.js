
/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#imagenEvento").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewImgEvento").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ================================
    VISTA PREVIA DE EDITAR IMAGEN
    ================================ */
  
  $("#editImagenNoticia").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#editPreviewImgNoticia").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ===================================
  ACTIVAR NOTICIA
  =================================== */
  
  $(".tabla_evento").on("click", ".btnActivar", function () {

    var idEvento = $(this).attr("idEvento");
    var estadoEvento = $(this).attr("estadoEvento");
  
    var datos = new FormData();
    datos.append("activarId", idEvento);
    datos.append("activarEvento", estadoEvento);
  
    $.ajax({
      url: "ajax/Eventos.ajax.php",
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
  
    if (estadoEvento == 0) {
      $(this).removeClass("btn-success");
      $(this).addClass("btn-danger");
      $(this).html("Desactivado");
      $(this).attr("estadoEvento", 1);
    } else {
      $(this).addClass("btn-success");
      $(this).removeClass("btn-danger");
      $(this).html("Activado");
      $(this).attr("estadoEvento", 0);
    }
  });
  
  /* EDITAR USUARIO */
  
  $(".tabla_evento").on("click", ".btnEditarNoticia", function () {
    var idEvento = $(this).attr("idEvento");
    var datos = new FormData();
    datos.append("idEvento", idEvento);
  
    $.ajax({
      url: "ajax/Noticia.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_noticia").val(respuesta["id_noticia"]);
        $("#editTitulo").val(respuesta["titulo"]);
  
        if (respuesta["imagen"] != "") {
          $("#editPreviewImgNoticia").attr("src", respuesta["imagen"]);
        } else {
          $("#editPreviewImgNoticia").attr(
            "src",
            "vistas/img/banner/default.png"
          );
        }
  
        $("#imagenActualN").val(respuesta["imagen"]);
        $("#editFecha").val(respuesta["fecha"]);
        $("#editDescripcion").summernote("code", respuesta["descripcion"]);
      },
    });
  });
  
  /* ELIMINAR USUARIO */
  
  $(".tabla_evento").on("click", ".btnEliminarNoticia", function () {
    var idEvento = $(this).attr("idEvento");
    var imagen = $(this).attr("imagen");
  
    Swal.fire({
      title: "¿Está seguro de borrar la noticia?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar noticia!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=noticias&idEvento=" + idEvento + "&imagen=" + imagen;
      }
    });
  });
  