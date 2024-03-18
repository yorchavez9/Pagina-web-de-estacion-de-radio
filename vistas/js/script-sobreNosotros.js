/* ===========================
EDITAR SOBRE NOSOTROS
=========================== */

$(".tabla_sobre_nosotros").on("click", ".btnEditarSobreNosotros", function () {
  var idSobreNosotros = $(this).attr("idSobreNosotros");
  var datos = new FormData();
  datos.append("idSobreNosotros", idSobreNosotros);

  $.ajax({
    url: "ajax/SobreNosotros.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#id_sobre_nosotros").val(respuesta["id_sobre_nosotros"]);
      $("#editTitulo").val(respuesta["titulo"]);
      $("#editDescripcion").val(respuesta["descripcion"]);
    },
  });
});


/* ===================================
ELIMINAR SOBRE NOSOTROS
=================================== */

$(".tabla_sobre_nosotros").on("click", ".btnEliminarSobreNosotros", function () {
  var idSobreNosotros = $(this).attr("idSobreNosotros");

  Swal.fire({
    title: "¿Está seguro de borrar el contenido?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=sobreNosotros&idSobreNosotros=" + idSobreNosotros;
    }
  });
});
