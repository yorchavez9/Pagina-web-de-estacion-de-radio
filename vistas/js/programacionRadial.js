
/* ================================
VISTA PREVIA DE NUEVA IMAGEN
================================ */

$("#imagenRadial").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewImgRadial").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ================================
    VISTA PREVIA DE EDITAR IMAGEN
    ================================ */
  
  $("#editImagenRadial").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#editPreviewImgRadial").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  
  /* ===================================
  ACTIVAR PROGRAMACION RADIAL
  =================================== */
  
  $(".tabla_programacion_radial").on("click", ".btnActivar", function () {

    var idRadial = $(this).attr("idRadial");
    var estadoRadial = $(this).attr("estadoRadial");
  
    var datos = new FormData();
    datos.append("activarId", idRadial);
    datos.append("activarRadial", estadoRadial);
  
    $.ajax({
      url: "ajax/ProgramacionRadial.ajax.php",
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
  
    if (estadoRadial == 0) {
      $(this).removeClass("btn-success");
      $(this).addClass("btn-danger");
      $(this).html("Desactivado");
      $(this).attr("estadoRadial", 1);
    } else {
      $(this).addClass("btn-success");
      $(this).removeClass("btn-danger");
      $(this).html("Activado");
      $(this).attr("estadoRadial", 0);
    }
  });
  
  /* EDITAR PROGRAMACION RADIAL */
  
  $(".tabla_programacion_radial").on("click", ".btnEditarProgramacionRadial", function () {
    var idRadial = $(this).attr("idRadial");
    var datos = new FormData();
    datos.append("idRadial", idRadial);
  
    $.ajax({
      url: "ajax/ProgramacionRadial.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#id_radial").val(respuesta["id_radial"]);

        $("#editId_conductor").val(respuesta["id_conductor"]);
        $("#id_conductorEdit").val(respuesta["id_conductor"]);


        $("#editDia").val(respuesta["dia"]);
        $("#idDia").val(respuesta["dia"]);

        $("#editTitulo").val(respuesta["titulo"]);
  
        if (respuesta["imagen"] != "") {
          $("#editPreviewImgRadial").attr("src", respuesta["imagen"]);
        } else {
          $("#editPreviewImgRadial").attr(
            "src",
            "vistas/img/banner/default.png"
          );
        }
  
        $("#imagenActualRadial").val(respuesta["imagen"]);

        $("#editHora").val(respuesta["hora"]);
      },
    });
  });
  
  /* ELIMINAR PROGRAMACION RADIAL */
  
  $(".tabla_programacion_radial").on("click", ".btnEliminarProgramacionRadial", function () {
    var idRadial = $(this).attr("idRadial");
    var imagen = $(this).attr("imagen");
  
    Swal.fire({
      title: "¿Está seguro de borrar la programación?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar programación!",
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=programacionRadial&idRadial=" + idRadial + "&imagen=" + imagen;
      }
    });
  });
  