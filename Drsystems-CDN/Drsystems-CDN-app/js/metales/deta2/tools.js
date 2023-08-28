/*##########################################################################
___________________   ________  .____
\__    ___/\_____  \  \_____  \ |    |
  |    |    /   |   \  /   |   \|    |
  |    |   /    |    \/    |    \    |___
  |____|   \_______  /\_______  /_______ \
                   \/         \/        \/
##########################################################################*/
function Tools(){
    console.log("%c Load Js GTV TOOLS ","color:#FA2A00; font-size:24px")
    checkOnlyOne()
    checkboxCierre()
}
/*########################################################################*/

/*##########################################################################
_______________ __________  ____________________.___________    _______    _________
\_   _____/    |   \      \ \_   ___ \__    ___/|   \_____  \   \      \  /   _____/
 |    __) |    |   /   |   \/    \  \/ |    |   |   |/   |   \  /   |   \ \_____  \
 |     \  |    |  /    |    \     \____|    |   |   /    |    \/    |    \/        \
 \___  /  |______/\____|__  /\______  /|____|   |___\_______  /\____|__  /_______  /
     \/                   \/        \/                      \/         \/        \/
##########################################################################*/

    /**************** Cierre ********************/
            
        /**
        * Function     checkOnlyOne
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function checkOnlyOne(){

            $(document).on('change',function() {
                console.log("%cTOOLS:  %ccheckOnlyOne ","color: cyan","color: pink");
                $(".checkboxone").on('click',function(){
                    x = $('input[type="checkbox"]').not(this).prop('checked',false)
                })

                if($('input[type="checkbox"]:checked').val() == undefined){

                    clsModificarCierre()
                    clsBorrarCierre()

                    $("#btnModalCierreModificar").addClass("disabled")
                    $("#btnModalCierreBorrar").addClass("disabled")

                //activarCierres()
                }

            })

        }
        /************************************/

        /**************** CIERRE ********************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function checkboxCierre(){
            console.log("%cTOOLS:  %cCierre checkbox load ","color: cyan","color: pink");
            
            clsModificarCierre()
            clsBorrarCierre()

            $(document).on('change','input[type="checkbox"]',function(){
                x = $('input[type="checkbox"]:checked').val()
                if($("." + x + " .cierre_grs_original").val() == $("." + x + " .cierre_pesoactual").val() ){
                    
                    //------>Modificar cierre
                    $("#btnModalCierreModificar") .removeClass("disabled")

                    $("#modificarCierreIdAdvance").val(x)
                    $("#modificarCierreIdcierre") .html($("." + x + ".cierre_id").html())
                    $("#modificarCierreFecha")    .html(   $("." + x + ".cierre_fecha").html())
                    $("#modificarCierreTipo")     .html(    $("." + x + ".cierre_tipo").html())
                    $("#modificarCierreStatus")   .html(  $("." + x + ".cierre_status").html())
                    
                    $("#modificarCierrePrecio")   .attr("placeholder",$("." + x + ".cierre_precio").html())
                    $("#modificarCierrePesoOri")  .attr("placeholder" ,$("." + x + ".cierre_grs_original").html())

                    //------>Modificar cierre

                    //------>Modificar cierre
                    $("#btnModalCierreBorrar").removeClass("disabled")

                    $("#borrarCierreIdAdvance").val(x)
                    $("#borrarCierreIdcierre") .html($("." + x + ".cierre_id").html())
                    $("#borrarCierreFecha")    .html(   $("." + x + ".cierre_fecha").html())
                    $("#borrarCierreTipo")     .html(    $("." + x + ".cierre_tipo").html())
                    $("#borrarCierreStatus")   .html(  $("." + x + ".cierre_status").html())
                    
                    $("#borrarCierrePrecio")   .html(  $("." + x + ".cierre_precio").html())
                    $("#borrarCierrePesoOri")  .html(  $("." + x + ".cierre_grs_original").html())
                    //------>Modificar cierre

                }else{}
            })
        }
        /************************************/

    /**************** CIERRE ********************/

/*########################################################################*/

/*##########################################################################
            ___.            __________               __  .__                     
  ________ _\_ |__          \______   \ ____  __ ___/  |_|__| ____   ___________ 
 /  ___/  |  \ __ \   ______ |       _//  _ \|  |  \   __\  |/    \_/ __ \_  __ \
 \___ \|  |  / \_\ \ /_____/ |    |   (  <_> )  |  /|  | |  |   |  \  ___/|  | \/
/____  >____/|___  /         |____|_  /\____/|____/ |__| |__|___|  /\___  >__|   
     \/          \/                 \/                           \/     \/       
##########################################################################*/

    /**************** CIERRE ********************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function clsModificarCierre(){
            console.log("%cTOOLS:  %c cls Modificar Cierre","color: cyan","color: pink");
                    $("#modificarIdAdvance")     .val("-Id Advance -")
                    $("#modificarCierreIdcierre").html("-Id-")
                    $("#modificarCierreFecha")   .html("- 00/00/0000 00:00:00 -")
                    $("#modificarCierreTipo")    .html("- Tipo -")
                    $("#modificarCierreStatus")  .html("- Status -")
                    $("#modificarCierrePrecio")  .attr("placeholder"," - $00.00 -")
                    $("#modificarCierrePesoOri") .attr("placeholder"," - 00.00 Grs -")
        }
        /************************************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function clsBorrarCierre(){
            console.log("%cTOOLS:  %c cls borrar Cierre","color: cyan","color: pink");
                    $("#borrarIdAdvance")     .val("-Id Advance -")
                    $("#borrarCierreIdcierre").html("-Id-")
                    $("#borrarCierreFecha")   .html("- 00/00/0000 00:00:00 -")
                    $("#borrarCierreTipo")    .html("- Tipo -")
                    $("#borrarCierreStatus")  .html("- Status -")
                    $("#borrarCierrePrecio")  .html(" - $00.00 -")
                    $("#borrarCierrePesoOri") .html(" - 00.00 Grs -")
        }
        /************************************/

    /**************** CIERRE ********************/

/*########################################################################*/