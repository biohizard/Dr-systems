//-------------------------------------------------------------------->    
    function changeCierreS(){
        $("#input_cs_fino").on('click',function(){
            if($("#input_eu_grs").val()){
                $(this).val("")
                $("#input_cs_fino").val("")
            }             
        })
        $("#input_cs_fino").on('change',function() {
            inputCalcular_cs_Importe()
        })
        $("#input_cs_pagos").on('change',function() {
            inputCalcular_cs_Saldo()
        })
    }
    function inputCalcular_cs_Importe(){
        let input_fino_cs    = parseFloat($("#input_cs_fino").val())
        let input_precio_cs  = parseFloat($("#input_cs_precio").val().replace("$", ""))
        let input_importe_cs = input_fino_cs * input_precio_cs
            input_importe_cs = input_importe_cs.toFixed(2)

            $("#input_cs_importe,#input_cs_total").val(input_importe_cs)
    }
    function inputCalcular_cs_Saldo(){
        let input_saldoxhr_cs = parseFloat($("#xhrSaldo").html().replace("$", ""))
        let input_cs_total    = parseFloat($("#input_cs_total").val())
        let input_cs_pagos    = parseFloat($("#input_cs_pagos").val())
        
        let x = input_saldoxhr_cs + input_cs_total - input_cs_pagos;
        $("#input_cs_saldo").val(x.toFixed(2))
    }
    function inputCalcular_cs_clear(){
        $("#save_vale_cs,#input_cs_fino,#input_cs_precio,#input_cs_importe,#input_cs_total,#input_cs_pagos,#input_cs_saldo,#input_cs_observaciones").val(" ")
    }
//-------------------------------------------------------------------->

//-------------------------------------------------------------------->
console.log("%cLoad File : %centregaunica","color: cyan", "color: yellow");
/********************************/
/*          ENTREGA UNICA       */
/********************************/
/*
*   btnModalEntregaUnica
*   btnGenerarEntregaUnica
*/
function clickModalEntregaUnica(){
    $("#btnModalEntregaUnica").on('click',function() {
        
        clearUnicaInput()

        $(".ge-show").fadeOut().addClass("d-none")
        $(".ge-show-load").fadeIn().removeClass("d-none")

        btnId = $('input[type="checkbox"]:checked').val();
        
        $("#metalesPrecio").empty().append($(".precio_id." + btnId).text())
        $("#metalesPrecioInput").empty().val($(".precio_id." + btnId).text())
        
        /*carga la informacion del cierre*/
        loadingMetalesOne(btnId)
        let typeX = "unica"
        loadingVale(typeX)
    })
}
function btnEntregaUnica(){
    $("#btnGenerarEntregaUnica").on('click',function() { 
        saveEntregaUnica()
    })
}

function fino_eu_Change(){
    console.log("Run: fino_eu_Change")
    //A)input_eu_barra - input_eu_ley - input_eu_fino
    $("#input_eu_gr,#input_eu_ley").on('click',function(){
        if($("#input_eu_grs").val()){
            $(this).val("")
            $("#input_eu_fino").val("")
        }        
        if($("#input_eu_ley").val()){
            $(this).val("")
            $("#input_eu_fino").val("")
        }  
    })

    //B Calcular el fino 
    $("#input_eu_grs,#input_eu_ley").on('change',function() {
        inputCalcular_eu_Importe()
        //inputCalcular_eu_Saldo()
    })
    //c cierres
    $("#input_eu_precio").on('click',function(){
        if($("#input_eu_precio").val()){
            $(this).val("")
            $("#input_eu_importe").val("")
        }              
    })    
    $("#input_eu_precio").on('change',function() {
        inputCalcular_eu_ImporteFP()
    })

   //D
   $("#input_eu_finopza").on('click',function(){
        if($("#input_eu_finopza").val()){
            $(this).val("")
        }              
    })  

    $("#input_eu_finopza").on('change',function(){
        inputCalcular_eu_ImportePza()
    })  

    //E PAGOS
    $("#input_eu_pagos").on('click',function(){
        if($("#input_eu_pagos").val()){
            $(this).val("")
        }              
    })  

    $("#input_eu_pagos").on('change',function(){
        inputCalcular_eu_Saldo()
    })  
    

}

    function inputCalcular_eu_Importe(){
            //----->
            let input_barra  = parseFloat($("#input_eu_grs").val())
            let input_ley    = parseFloat($("#input_eu_ley").val())

            if(input_barra > 0 && input_ley > 0){
                let input_fino = input_barra * input_ley / 24;
                
                $("#input_eu_fino,#input_eu_finopza").val(input_fino.toFixed(2))

            }else{}
            //----->    
            //return result;
    }
    function inputCalcular_eu_ImporteFP(){
        let xyz = $("#input_eu_precio").val();  
        let i_f = $("#input_eu_fino").val();

        let importe = i_f*xyz;
            importe = importe.toFixed(2);

            $("#input_eu_fino").attr("title",input_barra + "*" + input_ley + "/24=" + input_fino);
            $("#input_eu_importe,#input_eu_total").val(importe)
    }    
    function inputCalcular_eu_ImportePza(){
        let xyz = $("#input_eu_precio").val();  
        let i_f = $("#input_eu_finopza").val();

        let importe = i_f*xyz;
            importe = importe.toFixed(2);

            $("#input_eu_fino").attr("title",input_barra + "*" + input_ley + "/24=" + input_fino);
            $("#input_eu_importe,#input_eu_total").val(importe)
    } 
    function inputCalcular_eu_Saldo(){
        let pagos = parseFloat($("#input_eu_pagos").val()); 
            pagos = pagos.toFixed(2);

        let total = parseFloat($("#input_eu_total").val()); 
            total = total.toFixed(2);
        
        let saldo_actual = parseFloat($(".saldoActual").html()); 
            saldo_actual = saldo_actual.toFixed(2);

        let input_saldo = parseFloat(saldo_actual) + parseFloat(total) - parseFloat(pagos);
            input_saldo = input_saldo.toFixed(2)

            $("#input_eu_saldo").val(input_saldo)
    }    
//-------------------------------------------------------------------->