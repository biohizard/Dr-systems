//--------------------------------------------------------------->
//BEGIN
/*****************************************************************
 *                             BEGIN                             *
 *                         FUNCTION TOOLS                        *
 ****************************************************************/
 console.log("%cLoad File : %ctools", "color: cyan", "color: yellow");
function  allTools(){
    checkOnlyOne()
    changeOrigenGrs()
    origenOpciones()
    finoChange_C()

    finoChange()
    fino_eu_Change()

    
    
    /*


    plusEntrada()
    btnDeleteEntregas()    
    */
    $("#cierres_id_advance,#cierres_id_advance_mul").val(makeid(20))

}
function allModal(){
    console.log("%cRun: allModal\n\n A)clickModalSaldo\n B)clickModalCierre\n C)clickModalEntrega\n D)clickModalEntregaUnica%c\n", "line-height: 0.8;", "line-height: 1.7;")
        clickModalCierre()
        clickModalEntrega()
        clickModalCierres()
        clickModalPagos()
}
function allBtn(){
    btnCierre()
    btnEntrega()
    btnCierreS()
    btnPagos()
}
function loadXhr(){
    console.log("%cXHR: %cmetales/detalles loadXhr", "color: red", "color: green");

    loadingTabsCierre()
    loadingTabsEntregas()
    loadingTabsCierres()
    loadingTabsPagos()

    loadingMetalesSaldo()
}
function refreshXhr(){
    console.log("%cXHR: %cmetales/detalles refreshXhr", "color: red", "color: green");
    loadingTabsCierre()
    loadingTabsEntregas()
    loadingTabsCierres()
    loadingTabsPagos()

    loadingMetalesSaldo()
}
/************************************************************/
/*                           TOOLS                          */
/************************************************************/
function clearUnicaInput(){
    //Entregas
    $("#input_barra,#input_ley,#input_fino").val("")
    $("#input_fino").attr("title","barra * ley / 24k = fino");
    //Cierres
    $("#input_finopza,#input_importe").val("")
    //Pagos
    $("#input_total,#input_pagos,#input_saldo").val("")

    $("#input_eunvale,#input_eu_nolext,#input_eu_grsaf,#metales_eu_precio,#input_eu_barra,#input_eu_ley,#input_eu_fino,#input_eu_finopza,#input_eu_importe,#input_eu_pagos,#input_eu_total,#input_eu_saldo").val("")
}

function changeOrigenGrs(){
    $("#cierres_origen").on('change',function() {
        
        switch ($(this).val()) {
            case 'null':
                $("#cierres_origen_grs").empty().append("<option value=\"null\"> - Opciones -</option>")
                $("#generar_precio").val("")
              break;
            default:
                $(".loading-origen-x").removeClass("d-none")
                $(".loading-origen").addClass("d-none")

                $("#cierres_origen_grs").val("")
                loadingSelectCierre()                  
          }

    })
}
function origenOpciones(){
    
    $("#cierres_origen_grs").on('change',function() {
        
        let origenOpciones = $(this).val()
        origenOpciones = origenOpciones.split(" ")
        $("#generar_precio").val(origenOpciones[1])
    })    
}
function finoChange_C(){
    $("#generar_fino_pza").on('change',function() {
        let cierresTxt = $("#cierresTxt").html()
            cierresTxt = cierresTxt.split(" ")

        let generar_fino_pza = $("#generar_fino_pza").val()

        if(cierresTxt[0] >= parseFloat(generar_fino_pza)){
            
            let generar_fino_pza = parseFloat($(this).val())
            let generar_precio   = parseFloat($("#generar_precio").val())
            let importe          = parseFloat(generar_fino_pza * generar_precio)
            $("#generar_importe").val(importe)

        }else{
            alert("Fino/PZ debe de ser igual o menor al Peso Actual que esta en el paso 1")
            $(this).val("")
        }
        
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
function finoChange(){
    //A)
    $("#input_fino,#input_finopza").val("")
    $("#input_barra,#input_ley").on('click',function(){

        if($("#input_barra").val()){
            $(this).val("0")
            $("#input_fino").val("0")
        }
        if($("#input_ley").val()){
            $(this).val("0")
            $("#input_fino").val("0")
        }
        /*
        Fino/Pza
        importe
        pagos
        total
        saldo
        */
       $("#input_finopza,#input_importe,#input_pagos,#input_total,#input_saldo").val("")
    })

    /*
    B) 
        result fino  -> ba#rra * ley /24 para oro
        result salldo -> total + saldo - pagos = saldo
    */
    $("#input_barra,#input_ley").on('change',function() {
        /*
        id="input_barra" input_barra
        id="input_ley"   input_ley
        id="input_fino"  input_fino
        Formula
        input_barra * input_ley / 24
        */   
        /*
        inputCalcularImporte()
        inputCalcularSaldo()
        */
       /*
       Fino = B * l / 24
       */
       let input_barra = parseFloat($("#input_barra").val())
       let input_ley   = parseFloat($("#input_ley").val())
   
       if(input_barra > 0 && input_ley > 0){
           let input_fino = input_barra * input_ley / 24;
           $("#input_fino,#input_finopza").val(input_fino.toFixed(2))
           
           /*
           let xyz = $("#metales_precio").html();
           xyz = xyz.split(" ");
           
           let i_f = input_fino.toFixed(2) * xyz[1];
               i_f = i_f.toFixed(2);
               */
   
               //Result
               $("#input_fino").attr("title",input_barra + "*" + input_ley + "/24=" + input_fino);
               //$("#input_importe,#input_total").val(i_f)
               //$("#input_pagos").val(0)
       }

    })

    /*
    C) 
    * Cierres
    * input_finopza
    * input_fino
    */
    $("#input_finopza").on('click',function() {
        $(this).val("")
        /*
        Fino/Pza
        importe
        pagos
        total
        saldo
        */
        $("#input_importe,#input_pagos,#input_total,#input_saldo").val("")

        
    })

    $("#input_finopza").on('change',function() {
        
        if($("#input_barra").val() >= 0 || $("#input_ley").val() >= 0 || $("#input_barra").val() == "" || $("#input_ley").val() == "" ){
            console.log(1)
        }else{
            console.log(2)
        }

        //$("#input_barra,#input_ley").val(0)
        //$("#input_fino").val($(this).val())

            inputCalcularImporteFP()
            $("#input_pagos").val(0)

            inputCalcularSaldo()
    })

    /*
    D) 
    * Pagos
    */        
    $("#input_pagos").on('click',function() {
        $(this).val(0)
        inputCalcularSaldo()
    })
    $("#input_pagos").on('change',function() {
        inputCalcularSaldo()
    })    
    
}

function btnDisables(){
    $("#btnModalCierreSimple,#btnModalEntrega,#btnModalCierreDos").attr("disabled",true).removeClass('btn-primary').addClass('btn-secondary');
}
function btnEnables(){
    $("#btnModalCierreSimple,#btnModalEntrega,#btnModalCierreDos").attr("disabled",false).removeClass('btn-secondary').addClass('btn-primary');
}

function zeronull(x) {
    //x >1,=1,<9,=9   x = 1...9                      0009
    if (x == null || x==0) {
        y = "sin informacion";
    }

    return y;
}
function inputCalcularImporte(){
    /*
       id="input_barra"
       id="input_ley"
       id="input_fino"
       Formula
       input_barra * input_ley / 24
   */  
   
       //----->
       let input_barra = parseFloat($("#input_barra").val())
       let input_ley   = parseFloat($("#input_ley").val())
   
       if(input_barra > 0 && input_ley > 0){
           let input_fino = input_barra * input_ley / 24;
           $("#input_fino,#input_finopza").val(input_fino.toFixed(2))
           
           let xyz = $("#metales_precio").html();
           xyz = xyz.split(" ");
           
           let i_f = input_fino.toFixed(2) * xyz[1];
               i_f = i_f.toFixed(2);
   
               //Result
               $("#input_fino").attr("title",input_barra + "*" + input_ley + "/24=" + input_fino);
               $("#input_importe,#input_total").val(i_f)
               $("#input_pagos").val(0)
       }
       //----->    
       //return result;
}
function inputCalcularSaldo(){
    
    /*SALDO ORIGINAL*/
    let saldo = $("#metales_saldo").html()
        saldo = saldo.split(" ")
        saldo = parseFloat(saldo[1])
        saldo = saldo.toFixed(2);

    /*TOTAL*/        
    let total = parseFloat($("#input_total").val()); 
        total = total.toFixed(2)
    
    /*SALDO ACTUAL*/
    let saldo_actual =  $("#metales_saldo_actual").html()
        saldo_actual = saldo_actual.split(" ")
        saldo_actual = parseFloat(saldo_actual[1])
        saldo_actual = saldo_actual.toFixed(2);        

        if($("#input_pagos").val() == ""){

            //---------------->
            if($("#input_total").val() > 0){
                console.log("RUN X:1")
                $("#input_pagos").val(0)
                let pagos = 0;

                //saldo+total-pago
                let input_saldo = parseFloat(saldo_actual) + parseFloat(total) - pagos;
                input_saldo = input_saldo.toFixed(2)
                
                $("#input_saldo").attr("title",saldo_actual + "+" + total + "-" + pagos)

                /*saldo input*/
                $("#input_saldo").val(input_saldo)
                console.log("Run  saldo = saldo actual + total - pago")

            }else{console.log("RUN X:1.2")}
            //---------------->

        }else{
            
            //---------------->
            console.log("RUN X:2")
            let pagos = parseFloat($("#input_pagos").val()); 
            pagos = pagos.toFixed(2);

            let input_saldo = parseFloat(saldo_actual) + parseFloat(total) - parseFloat(pagos);
            input_saldo = input_saldo.toFixed(2)
            
            $("#input_saldo").attr("title",saldo_actual + "+" + total + "-" + pagos)
            
            /*saldo input*/
            $("#input_saldo").val(input_saldo)
            console.log("Run  saldo = saldo + total - pago")

            //---------------->

        }

}
function btnDeleteEntregas(){
    console.log("Run: btnDeleteEntregas")
    $(".btnDeleteEntregas").on('click',function(){
        let xxx = $(this).attr("class"); 
        let yyy = xxx.split(" "); 
            $("."+yyy[2]).remove();
    })
}
function inputSaldo(x){
    /*
    input_total
    input_pagos
    */

    /*input saldo  + Saldo print - pagos*/
    let input_saldo = $("#metales_saldo").html();
        input_saldo = input_saldo.split(" ");


        
    let input_pagos = $("#input_pagos").val();            

    //Result
    //$("#input_saldo").val(parseFloat(x) + parseFloat(input_saldo[1]) - parseFloat(input_pagos))
}
function changeFino() {

    $("#generarBarra,#generarLey").change(function() {

        if (isEmpty($("#generarBarra").val())) {
            //alert(1)  
        } else if (isEmpty($("#generarLey").val())) {
            //alert(2)
        } else {
            let a = parseFloat($("#generarBarra").val());
            let b = parseFloat($("#generarLey").val());
            let c = parseInt(24);

            let detail_fino = (a * b) / c;
            $("#generarFino").val(detail_fino.toFixed(2));
            

        }

    });
}
function makeid(length) {
    var result           = [];
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result.push(characters.charAt(Math.floor(Math.random() * 
 charactersLength)));
   }
   return result.join('');
}