
function clsCierres(){
    $("#cierresTxt").html("00.00 Grs")

    var $select = $('#cierres_origen,#cierres_origen_grs');
        $select.val("null");
        
        $("#cierres_origen_grs").empty().append("<option value=\"null\"> - Opciones -</option>")

        $("#generar_fino_pza,#generar_precio,#generar_importe").val("")

        //$('input[type="checkbox"]').not(this).prop('checked', false);
        
        //$("#btnModalCierres").attr("disabled",true)
}
function checkOnlyOne(){
    $(".checkboxone").on('click',function(){
        x = $('input[type="checkbox"]').not(this).prop('checked', false)    
    })
    activarCierres()
}

function activarCierres(){
    $(document).on('click', 'input[type="checkbox"]', function() {

        $(".loading-origen-x-mul").removeClass("d-none")
        $(".loading-origen-mul").addClass("d-none")
        
        
        let xyz = $('input[type="checkbox"]:checked').attr('class')
                xyz = xyz.split(" ")
    
        $("#cierre_id_advance,#cierre_id_advance_mul").val(xyz[2])
    
    
        let y = $(this).val();
    
        //--------------------->
        if($('input[type="checkbox"]').is(':checked')){
            clsCierres()
    
            $("#btnMenuCierres").attr("disabled",false)
    
            let checkEntregas = $('input[type="checkbox"]:checked').attr('class')
                checkEntregas = checkEntregas.split(" ")
            
            x = $("td.fino." + checkEntregas[2]).html()
            $("#cierresTxt,#cierresMultipleTxt").html(x)
    
            switch(checkEntregas[0]){
                case 'checkCierre':
                    //alert("cierre")
                    break;
                case 'checkEntregas':
                    //alert("entregas")
                    break;
                case 'checkECierres':   
                    //alert("cierres")
                    break;
                case 'checkPagos':   
                    //alert("pagos")
                    break;
                default:
                    //alert("default")
                    break;
              }
    
        }else{
            $("#btnMenuCierres").attr("disabled",true)
            //alert("checked false")
        }
        //--------------------->
    })
}