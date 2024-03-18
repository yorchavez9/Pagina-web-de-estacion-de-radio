
  /* EDITAR USUARIO */
  
  $(".tabla_evento").on("click", ".btnEditarEvento", function () {
    var idEvento = $(this).attr("idEvento");
    var datos = new FormData();
    datos.append("idEvento", idEvento);
  
    $.ajax({
      url: "ajax/Eventos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_evento").val(respuesta["id_evento"]);
        $("#editTitulo").val(respuesta["titulo"]);
  
        if (respuesta["imagen"] != "") {
          $("#editPreviewImgEvento").attr("src", respuesta["imagen"]);
        } else {
          $("#editPreviewImgEvento").attr(
            "src",
            "vistas/img/banner/default.png"
          );
        }
  
        $("#imagenActualE").val(respuesta["imagen"]);
        $("#editFecha").val(respuesta["fecha"]);
      },
    });
  });
  
  /* ELIMINAR USUARIO */
  
  $(".tabla_evento").on("click", ".btnEliminarEvento", function () {
    var idEvento = $(this).attr("idEvento");
    var imagen = $(this).attr("imagen");
  
    Swal.fire({
      title: "¿Está seguro de borrar el evento?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar evento!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=eventos&idEvento=" + idEvento + "&imagen=" + imagen;
      }
    });
  });
  