/* ===================================
    EDITAR RANKING
    =================================== */

$(".tabla_ranking").on("click", ".btnEditarRanking", function () {
  var idRanking = $(this).attr("idRanking");

  var datos = new FormData();
  datos.append("idRanking", idRanking);

  $.ajax({
    url: "ajax/Ranking.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_ranking").val(respuesta["id_ranking"]);
      $("#editPuesto").val(respuesta["puesto"]);
      $("#editCancion").val(respuesta["cancion"]);
      $("#editArtista").val(respuesta["artista"]);
      $("#editLetra").val(respuesta["letra"]);
      $("#editVideo_url").val(respuesta["video_url"]);
    },
  });
});


/* ===================================
    ELIMINAR RANKING
    =================================== */

$(".tabla_ranking").on("click", ".btnEliminarRanking", function () {
  var idRanking = $(this).attr("idRanking");

  Swal.fire({
    title: "¿Está seguro de borrar el ranking?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=rankings&idRanking=" + idRanking;
    }
  });
});
