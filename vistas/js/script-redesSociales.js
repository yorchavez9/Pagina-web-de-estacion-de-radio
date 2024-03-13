
  
  /* ===================================
    EDITAR REDES SOCIALES
    =================================== */
  
  $(".tabla_redes_sociales").on("click", ".btnEditarRedesSociales", function () {

  
    var idRedes = $(this).attr("idRedes");
  
    var datos = new FormData();
    datos.append("idRedes", idRedes);
  
    $.ajax({
      url: "ajax/RedesSociales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_redes").val(respuesta["id_redes"]);
        $("#editFacebook").val(respuesta["facebook"]);
        $("#editWhatsapp").val(respuesta["whatsapp"]);
        $("#editYoutube").val(respuesta["youtube"]);
        $("#editLinkedin").val(respuesta["linkedin"]);
        $("#editTwitter").val(respuesta["twitter"]);
        $("#editTiktok").val(respuesta["tiktok"]);
        $("#editInstagram").val(respuesta["instagram"]);

      },
    });
  });
  
  /* ===================================
    ELIMINAR CONDUCTOR
    =================================== */
  
  $(".tabla_redes_sociales").on("click", ".btnEliminarRedesSociales", function () {
    var idRedes = $(this).attr("idRedes");
  
    Swal.fire({
      title: "¿Está seguro de borrar el la redes sociales?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar!",
    }).then(function (result) {
      if (result.value) {
        window.location = "index.php?ruta=redesSociales&idRedes=" + idRedes;
      }
    });
  });
  