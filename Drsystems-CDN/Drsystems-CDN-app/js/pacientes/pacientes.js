console.log('Run: Pacientes')
/*
 #############################################################################
 #                 Begin : Delete Pacientes                                  #
 #############################################################################
*/
$(document).ready(function() {
    /*##### C #####*/
    pacientesNew()
    /*##### R #####*/
    pacientesViewJqxhr()
    /*##### U #####*/
    pacientesUpdate()
    /*##### D #####*/
    pacientesDelete()

    btnRefresh()
    
    btnConsultas()
    btnHistorial()
    btnRecetas()

    checkOnlyOne()
})

    function checkOnlyOne(){
        $("#btnUpdate,#btnDelete,#btnConsultas,#btnHistorial,#btnRecetas").prop('disabled',true)

        $(document).on('click', 'input[type="checkbox"]', function() {
            $("#btnUpdate,#btnDelete,#btnConsultas,#btnHistorial,#btnRecetas").prop('disabled',false)
            
            x = $('input[type="checkbox"]').not(this).prop('checked', false);
    
            let y = $(this).val();
    
            $("#id_advance").val(y)

            //--------------------->
            if ($('input[type="checkbox"]').is(':checked')){
                $("#uufirstName").val($("." + y + ".first").html())
                $("#uulastName").val( $("." + y + ".second").html())
                $("#uuusername").val($("." + y + ".user").html())
                $("#uupassword").val("*********")
                $("#uuemail").val($("." + y + ".email").html())
                $("#uuPhone").val($("." + y + ".nophone").html())

                $(".duFnText").html($("." + y + ".first").html())
                $(".duSnText").html($("." + y + ".second").html())
                $(".duUnText").html($("." + y + ".user").html())
                /*
            $("#user-resume,#user-update,#user-delete").attr("disabled",false)
            $("#iduserupdate").val($(this).attr("id"))
                */
            
            //readeClientesOne($('input[name="idX"]:checked').attr("id"))
    
            } else {
                $("#btnUpdate,#btnDelete,#btnConsultas,#btnHistorial,#btnRecetas").prop('disabled',true)
                clearAll()
                /*
            $("#user-resume,#user-update,#user-delete").attr("disabled",true)
            $("#iduserupdate").val(0)
            */
            }
            //--------------------->
        })
    }
    function clearAll(){
        $("#id_advance").val("")
        $("#nufirstName,#nulastName,#nuusername,#nupassword,#nuemail,#nuPhone").val("")
        $("#uufirstName,#uulastName,#uuusername,#uupassword,#uuemail,#uuPhone").val("")
        $(".duFnText , .duSnText , .duUnText").html("")
    }