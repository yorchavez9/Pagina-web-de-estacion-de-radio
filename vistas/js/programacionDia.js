/* Mostradon categorias */
$(".programacionRadialSemana").on("click", ".btnDiaSemana", function () {
    var diaText = $(this).attr("diaText");
    window.location = "index.php?ruta=programacionRadial&diaText=" + diaText;
  });