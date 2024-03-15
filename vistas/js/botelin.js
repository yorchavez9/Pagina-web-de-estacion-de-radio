/* ELIMINAR SUSCRIPTOR */

$(".tabla_suscriptor").on("click", ".btnEliminarSuscriptor", function () {
  var idSuscriptor = $(this).attr("idSuscriptor");

  Swal.fire({
    title: "¿Está seguro de borrar el suscriptor?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar suscriptor!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=suscriptor&idSuscriptor=" + idSuscriptor;
    }
  });
});
