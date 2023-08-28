console.info("Run: File Resumen Caja");

/*
|->TOOLCAJA.JS
|----- autoComplete()
|
*/
function cajaResumen(){
//--->    
$("#btnResumen").click(function() {
    console.info("Run: Fuction Caja Resumen");

    if($(".idAcheckbox:checked").attr("id") == undefined){
        alert("Se tiene que selección una Entrada o Salida para  ver su resumen!")
    }else{

        var settings = {
            "url": url_caja_one + $('.idAcheckbox:checked').attr('id'),
            "method": "GET",
            "timeout": 0,
            "headers": {
              "Authorization": "Basic cm9vdDphZG1pbg=="
            },
          };
          
          $.ajax(settings)
          .done(function (data) {
                //---> each
                $.each(data, function (i, val){
                    
                    $("#crId").html(val.id)

                    $("#crGeneradoNombre").html(val.trabajadorNombre['firstname'] + " " + val.trabajadorNombre['secondname'] )
                    $("#crGeneradoFecha").html(val.time)
                    
                    $("#crFecha").html(val.cajaNuevaFecha)
                    $("#crNombre").html(val.usuarioNombre['firstname'] + " " + val.usuarioNombre['secondname'])
                    $("#crNotas").html(val.cajaNotas)

                    $("#crConcepto").html(val.cajaConcepto)
                    $("#crTipo").html(val.cajaTipo)

                    if(val.cajaTipo == "inicial"){
                        cajaSaldo = val.cajaSaldo
                    }else if(val.cajaTipo == "entrada"){                    
                        cajaSaldo = val.cajaEntrada
                    }else if(val.cajaTipo == "salida"){
                        cajaSaldo = val.cajaSalida
                    }
                    $("#crMonto").html("$" + cajaSaldo)
                })
                //---> each
          })
          .fail(function (jqXHR,textStatus,errorThrown) {
              xhrError(jqXHR,textStatus,errorThrown)
          })
          .always(function () {
            $('#resumenModal').modal('show')
          })

    }
    
});
//--->
}