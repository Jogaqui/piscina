    $(document).ready(function () {
        $('#idprogramacion').change(function () {
            mostrarProgramacion();
        });
        $('#btnverificar').click(function () {
            verificarVacantes();
        });
    });
    
    function mostrarMensajeError(mensaje) {
      $(".alert").css('display', 'block');
      $(".alert").removeClass("hidden");
      $(".alert").addClass("alert-danger");
      $(".alert").html("<button type='button' class='close' dataclose='alert'> ×</button>" + "<span><b>Error!</b> " + mensaje + ".</span>");
      $('.alert').delay(5000).hide(400);
    }

    function mostrarProgramacion(){
        idprogramacion = document.getElementById("idprogramacion").value;
        $.get('/EncontrarProgramacion/' + idprogramacion, function(data){
             $('input[name=idprogramacion]').val(data[0].idprogramacion);
             $('input[name=vacante]').val(data[0].vacante);
         });
    }

    function verificarVacantes(){
        let vacante = parseInt($("#vacante").val(),10);
        if (vacante == 0){
            mostrarMensajeError("Ya no hay vacantes, seleccione otra programación");
            return false;
        }
        limpiar();
    }

    function limpiar(){
        $("#idprogramacion").val("0").change();
        $("#idalumno").val("0").change();
        $("#idprogramacion").val("0").change();
        $("#iddescuento").val("0").change();
        $("#idmonto").val('');
        $("#idpago").val("0").change();
    }