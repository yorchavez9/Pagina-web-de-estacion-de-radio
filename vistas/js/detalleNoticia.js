/* Mostradon categorias */
$("#seccion_noticia").on("click", ".btnMostrarDetalleNoticia", function () {
    var idNoticiaDetalle = $(this).attr("idNoticiaDetalle");
    window.location = "index.php?ruta=detalleNoticia&idNoticiaDetalle=" + idNoticiaDetalle;
  });