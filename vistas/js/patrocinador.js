
  
  /* ===================================
    ELIMINAR PATROCINADOR
    =================================== */
  
  $(".tabla_patrocinador").on("click", ".btnEliminarPatrocinador", function () {
    var idPatrocinador = $(this).attr("idPatrocinador");
  
    Swal.fire({
      title: "¿Está seguro de borrar el patrocinador?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar!",
    }).then(function (result) {
      if (result.value) {
        window.location = "index.php?ruta=patrocinadores&idPatrocinador=" + idPatrocinador;
      }
    });
  });
  