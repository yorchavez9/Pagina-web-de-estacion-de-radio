/* Mostradon categorias */
$(".programacionTVSemana").on("click", ".btnDiaSemana", function () {
    var diaText = $(this).attr("diaText");
    window.location = "index.php?ruta=programacionTV&diaText=" + diaText;
  });