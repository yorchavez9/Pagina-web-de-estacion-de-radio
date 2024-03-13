
  
  /* ===================================
    EDITAR DATOS DE CONTACTO
    =================================== */
  
    $(".tabla_datos_contacto").on("click", ".btnEditarDatosContacto", function () {

  
        var idDatosContacto = $(this).attr("idDatosContacto");
      
        var datos = new FormData();
        datos.append("idDatosContacto", idDatosContacto);
      
        $.ajax({
          url: "ajax/DataContacto.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {
            $("#id_data_contacto").val(respuesta["id_data_contacto"]);
            $("#editLocalizacion").val(respuesta["localizacion"]);
            $("#editTelefono").val(respuesta["telefono"]);
            $("#editCorreo").val(respuesta["correo"]);
    
          },
        });
      });
      
      /* ===================================
        ELIMINAR CONDUCTOR
        =================================== */
      
      $(".tabla_datos_contacto").on("click", ".btnEliminarDatosContacto", function () {
        var idDatosContacto = $(this).attr("idDatosContacto");
      
        Swal.fire({
          title: "¿Está seguro de borrar los datos de contacto?",
          text: "¡Si no lo está puede cancelar la accíón!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Si, borrar!",
        }).then(function (result) {
          if (result.value) {
            window.location = "index.php?ruta=datosContacto&idDatosContacto=" + idDatosContacto;
          }
        });
      });
      