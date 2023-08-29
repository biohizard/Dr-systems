/*****************************************************************
 *                              BEGIN                            *
 *                              TABS                             *
 *****************************************************************/
 //BEGIN---------------------------------------------------------->

    //BEGIN:---------------------> tabs Cierres
    function loadingTabsCierre(){
        //--->
        console.log("%cXHR: %cmetales/detalles loadingTabsCierres", "color: red", "color: green");
        $("#loadingMetalesCierres").fadeIn().empty()

        let id_advance = $("#id_advance_x").val();

        let jqxhr = $.getJSON(urlDbTabsCierreR + "/?name=tabsCierre&type=cierre&id=" + id_advance, function(data) {
            })
            .done(function(data) {
                //--->
                $.each(data, function(i, val) {
                    
                    if(val.Code == 104){

                        $("#loadingMetalesCierres")
                            .fadeIn(3000)
                            .append(
                                '<tr><th>Sin Cierres</th></tr>'
                            );

                    }else{
                        let m_id  = zerocien(parseInt())
                        let mc_id = zerocien(parseInt(val.id))
                        
                        /*
                        if (parseFloat(val.detail_grs) == 0) {
                            checkbox =  '    <th scope="row"></th>';
                        } else {
                            checkbox = '    <th scope="row"><input type="checkbox" value="' + val.id_advance + '" class="checkCierre checkboxCierre" name="id_advance_cierre"></th>';
                        }
                        */
                        checkbox =  '    <th scope="row"></th>';


                        if (parseFloat(val.detail_grs) == 0) {
                            colorCierres = "table-danger";
                        } else if (parseFloat(val.detail_grs_original) == parseFloat(val.detail_grs)) {
                            colorCierres = "table-primary";
                        } else if (parseFloat(val.detail_grs) > 0) {
                            colorCierres = "table-success";
                        }else{
                            colorCierres = "";
                        }

                        //Compra de Metales cliente $saldo
                        $("#cliente_nombre")
                            .fadeIn(3000)
                            .html(val.firstname + ' ' + val.secondname)

                        //#	ID Cierre	Fecha	Tipo	Status	Metal	Precio	Peso Original	Peso Actual
                        let x_pagos = new Intl.NumberFormat("en-US").format(val.detail_precio)
                        /*
                        "id": "232",
                        "id_advance": "k0WlpYwV4XcPn5dquz2K",
                        "time": "2021-05-17 04:43:16",
                        "user_type": "clientes",
                        "user_id_advance": "C-zr8h0iji96crde4",
                        "detail_fecha": "2021-05-01 00:00:00",
                        "detail_status": "abierto",
                        "detail_tipo": "compra",
                        "detail_metal": null,
                        "detail_grs_original": "130.00",
                        "detail_grs": "130.00",
                        "detail_precio": "1150.00",
                        "saldo_saldo": "0.00",
                        "saldo_saldo_actual": "-150000.00",
                        "email": "biohizard@gmail.com",
                        "firstname": "jorge",
                        "secondname": "garibaldo"
                        */
                        $("#loadingMetalesCierres")
                            .fadeIn(3000)
                            .append(
                                '<tr class="cierresItem ' + colorCierres + '" id="' + val.id_advance + '">' +
                                     checkbox                                                +
                                '    <td class="'+ val.id_advance  +' cierre_id">'           + val.id                  + '</td>'      +
                                '    <td class="'+ val.id_advance  +' cierre_fecha">'        + val.detail_fecha        + '</td>'      +
                                '    <td class="'+ val.id_advance  +' cierre_tipo">'         + val.detail_tipo         + '</td>'      +
                                '    <td class="'+ val.id_advance  +' cierre_status">'       + val.detail_status       + '</td>'      +
                                '    <td class="'+ val.id_advance  +' cierre_precio">  $ '   + x_pagos                 + '</td>'      +
                                '    <td class="'+ val.id_advance  +' cierre_grs_original">' + val.detail_grs_original + ' Grs </td>' +
                                '    <td class="'+ val.id_advance  +' cierre_pesoactual">'   + val.detail_grs          + ' Grs </td>' +
                                '</tr>'
                            )
                    }

                    })
                    //--->
            })
            .fail(function(data, jqXHR, textStatus, errorThrown) {
                //--->
                console.info("Run: all user loading error");
                xhrError(jqXHR, textStatus, errorThrown);
            })
            .always(function(data) {
            })
            //--->  
    }
    //BEGIN:---------------------> tabs Cierres
    function loadingTabsEntregas(){
        //--->
        console.log("%cXHR: %cmetales/detalles loadingMetalesReaderEntregas", "color: red", "color: green");
        $("#loadingMetalesEntregas").fadeIn().empty()

        let id_advance = $("#id_advance_x").val();

        let jqxhr = $.getJSON(urlDbTabsEntregasR + "/?name=tabsEntregas&type=entregas&id=" + id_advance, function(data) {
            })
            .done(function(data) {
                //--->
                $.each(data, function(i, val) {

                    if(val.Code == 104){

                        $("#loadingMetalesEntregas")
                            .fadeIn(3000)
                            .append(
                                '<tr><th>Sin Entregas</th></tr>'
                            )

                    }else{
                        
                        if(parseInt(val.entregas_fino) == 0){
                            var xCheck  = ''
                            var x_color = 'bg-warning'
                            }else{
                                var x_color = ''
                                var xCheck  = '<input type="checkbox" class="checkEntregas checkboxEntregas ' + val.id_advance + '" name="id_advance_entregas">'
                            }

                        $("#loadingMetalesEntregas")
                            .fadeIn(3000)
                            .append(
                                '<tr class="' + x_color + ' ' +  val.id_advance + '">' +
                                '    <th scope="row">' + xCheck + '</th>' +
                                '    <td>' + val.id + '</td>' +
                                '    <td>' + val.time + '</td>' +
                                '    <td>' + zerocien(val.entregas_no_vale) + '</td>' +
                                '    <td>' + zeronull(val.entregas_no_ext) + '</td>' +
                                '    <td>' + val.entregas_grs_af + '</td>' +
                                '    <td>' + val.entregas_barra + ' Grs</td>' +
                                '    <td>' + val.entregas_ley + '</td>' +
                                '    <td class="finoOriginal ' + val.id_advance + '">' + val.entregas_fino_original + ' Grs</td>' +
                                '    <td class="fino bg-success ' + val.id_advance + '">' + val.entregas_fino + ' Grs</td>' +
                                '</tr>     '
                        )
                    }

                    })
                    //--->
            })
            .fail(function(data, jqXHR, textStatus, errorThrown) {
                //--->
                console.info("Run: all user loading error");
                xhrError(jqXHR, textStatus, errorThrown);
            })
            .always(function(data) {
            })
            //--->  
    }
    //BEGIN:---------------------> tabs cierres dos
    function loadingTabsCierres(){
        //--->
        console.log("%cXHR: %cmetales/detalles loadingMetalesReaderCierre", "color: red", "color: green");
        $("#loadingMetalesCierresdos").fadeIn().empty()

        let id_advance = $("#id_advance_x").val();

        let jqxhr = $.getJSON(urlDbTabsCierresR + "/?name=tabsCierres&type=cierres&id=" + id_advance, function(data) {
            })
            .done(function(data) {
                //--->
                $.each(data, function(i, val) {
                    if(val.Code == 104){

                        $("#loadingMetalesCierresdos")
                            .fadeIn(3000)
                            .append(
                                '<tr><th>Sin Cierres Dos</th></tr>'
                            )

                    }else{

                        $("#loadingMetalesCierresdos")
                        .fadeIn(3000)
                        .append(
                            '<tr>' +
                            '    <th scope="row"><input type="checkbox" value="' + val.m_id_advance + '" class="btnId" name="id_advance"></th>' +
                            '    <td>' + val.id + '</td>' +
                            '    <td>' + val.entregas_fecha + '</td>' +
                            '    <td>' + val.cierres_fino + ' Grs</td>' +
                            '    <td> $ ' + val.cierres_precio + '</td>' +
                            '    <td> $ ' + val.cierres_importe + '</td>' +
                            '</tr>     '
                        )

                    }

                })
                //--->
            })
            .fail(function(data, jqXHR, textStatus, errorThrown) {
                //--->
                console.info("Run: all user loading error");
                xhrError(jqXHR, textStatus, errorThrown);
            })
            .always(function(data) {
            })
            //--->  
    }
    //BEGIN:---------------------> tabs pagos
    function loadingTabsPagos(){
        //--->
        console.log("%cXHR: %cmetales/detalles loadingMetalesReaderPagos", "color: red", "color: green");
        $("#loadingMetalesPagos").fadeIn().empty()

        let id_advance = $("#id_advance_x").val();
        let jqxhr = $.getJSON(urlDbTabsPagosR + "?name=tabsPagos&type=pagos&id=" + id_advance, function(data) {
            })
            .done(function(data) {
                //--->
                $.each(data, function(i, val) {

                    if(val.Code == 104){

                        $("#loadingMetalesPagos")
                            .fadeIn(3000)
                            .append(
                                '<tr><th>Sin Pagos</th></tr>'
                            )

                    }else{
                        
                        let y_total = new Intl.NumberFormat("en-US").format(val.pagos_total)
                        let y_pagos = new Intl.NumberFormat("en-US").format(val.pagos_pagos)
                        let y_saldo = new Intl.NumberFormat("en-US").format(val.pagos_saldos )
                        
                        $("#loadingMetalesPagos")
                            .fadeIn(3000)
                            .append(
                                '<tr class=' + val.m_id_advance + '">' +
                                '    <th scope="row"><input type="checkbox" value="' + val.m_id_advance + '" class="checkPagos" name="id_advance"></th>' +
                                '    <td>   ' + val.id + '</td>' +
                                '    <td>   ' + val.entregas_fecha + '</td>' +
                                '    <td> $ ' + y_total + '</td>' +
                                '    <td> $ ' + y_pagos + '</td>' +
                                '    <td> $ ' + y_saldo+ '</td>' +
                                '    <td>'    + val.pagos_observaciones + '</td>' +
                                '</tr>'
                            )
                    }

                    })
                    //--->
            })
            .fail(function(data, jqXHR, textStatus, errorThrown) {
                //--->
                console.info("Run: all user loading error");
                xhrError(jqXHR, textStatus, errorThrown);
            })
            .always(function(data) {
            })
            //--->  
    }
//END------------------------------------------------------------>
/*****************************************************************
 *                               End                             *
 *                              TABS                             *
 *****************************************************************/

/*****************************************************************
 *                            - BEGIN -                          *
 *                              TABS                             *
 *                            Save Btn                           *
 *****************************************************************/
 //BEGIN---------------------------------------------------------->
    
    //BEGIN:---------------------> generar cierre
function saveDataCierre(){
        /*
            id="generar_c_fecha"
            id="generar_c_tipo"
            id="generar_c_metal"
            id="generar_c_grs"
            id="generar_c_precio"

            id_advance: U-03fb5ca7539c770b6b
            save_id_advance: C-zr8h0iji96crde4
            generar_c_fecha: 2021-05-10
            generar_c_tipo: compra
            generar_c_grs: 130
            generar_c_precio: 1150            
        */
            let id_advance      = $("#id_advance").val();
            let save_id_advance = $("#id_advance_x").val();
            
            let generar_c_fecha  = $("#generar_c_fecha").val();
            let generar_c_tipo   = $("#generar_c_tipo").val();
            let generar_c_grs    = $("#generar_c_grs").val();
            let generar_c_precio = $("#generar_c_precio").val();

            $('#cierreModal').modal('hide')
        
            let settings = {
                "url": urlDbTabsCierreC + '?type=cierre',
                "method": "POST",
                "timeout": 0,
                "headers": {
                    /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "id_advance"       : id_advance,
                    "save_id_advance"  : save_id_advance,
                    "generar_c_fecha"  : generar_c_fecha,
                    "generar_c_tipo"   : generar_c_tipo,
                    //"generar_c_metal"  : generar_c_metal,
                    "generar_c_grs"    : generar_c_grs,
                    "generar_c_precio" : generar_c_precio
                }
            };
        
            let jqxhr1 = $.ajax(settings).done(function(response) {
                    console.log("Run: Cierres")
                })
                .done(function(data) {
                    $.each(data, function(i, val) {})
                })
                .fail(function(data, jqXHR, textStatus, errorThrown) {
                    console.info("Run: all user loading error");
                    xhrError(jqXHR, textStatus, errorThrown);
                })
                .always(function(data) {
                    //clearUnicaInput()
                    clsModalCierre()
                    refreshXhr()      
                    console.info("Run: all user always");
                }) 

}
function saveEntrega(){
    console.log("BTN SAVE");
    /*
    --->    Generar Entrega
    input_id_advance

    --->    Entregas
    input_nolext
    input_grsaf

    input_barra
    input_ley
    input_fino

    --->    Cierres
     input_finopza
     input_importe

    --->    Pagos     
    input_pagos

    input_total
    input_saldo
    */
   /*
    let xyz = $("#metales_precio").html();
        xyz = xyz.split(" ");

    let abc = $("#metales_saldo_actual").html();
        abc = abc.split(" ");
    */

    let save_id_advance = $("#input_id_advance").val();
    
    //let save_precio     = xyz[1];
    //let metales_saldo_actual = abc[1];
    
    let save_nolext     = $("#input_nolext").val();
    let save_grsaf      = $("#input_grsaf").val();
    let input_emnvaleE1 = $("#input_novale").val();

    let save_barra      = $("#input_barra").val();
    let save_ley        = $("#input_ley").val();
    let save_fino       = $("#input_fino").val();

    /*
    let save_finopza    = $("#input_finopza").val();

    let save_importe    = $("#input_importe").val();
    let save_pagos      = $("#input_pagos").val();

    let save_total      = $("#input_total").val();
    let save_saldo      = $("#input_saldo").val();
    */
    
            /*
        save_id_advance: Un6jmxDklzUwyJBGbw9r
        save_nolext: 
        save_grsaf: 
        save_barra: 0
        save_ley : 0
        save_fino: 53.35
        save_finopza: 53.35
        save_pagos: 0
        save_total: 66954.25
        save_saldo: 116916.22    


        save_preio: 
        metales_saldo_actual: 
        save_nolext: 0
        save_grsaf: 0
        save_barra: 150
        save_ley: 12
        save_fino: 75.00
        save_id_advance_user: C-zr8h0iji96crde4
        save_vale: 101
            */
    //BEGIN: Entrega --------------------->
    /* 
    FECHA | N. VALE | NO. EXT | GRS A/F | BARRA | LEY | FINO | 
      *                                     *      *     *
    */

    //END: Entrega --------------------->
    //alert(": " + save_id_advance + ": " + save_nolext + ": " + save_grsaf + ": " + save_barra + ": " + save_ley + ": " + save_fino + ": " + save_finopza + ": " + save_importe + ": " + save_pagos + ": " + save_total + ": " + save_saldo )
    
    
    $('#entregaModal').modal('hide')

    let settings = {
        "url": urlDbTabsEntregasC + '?type=generarentregas',
        "method": "POST",
        "timeout": 0,
        "headers": {
            /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "save_id_advance" : save_id_advance,
            //"save_preio"      : save_precio,
            //"metales_saldo_actual": metales_saldo_actual,
            "save_nolext"     : save_nolext,
            "save_grsaf"      : save_grsaf,
            "save_vale"       : input_emnvaleE1,

            "save_barra"      : save_barra,
            "save_ley"        : save_ley,
            "save_fino"       : save_fino,
            /*
            "save_finopza"    : save_finopza,
            "save_pagos"      : save_pagos,
            "save_total"      : save_total,
            "save_saldo"      : save_saldo,*/
            //"save_id_advance"         : $('input[type="checkbox"]:checked').val(),
            "save_id_advance_user"    : $("#id_advance_x").val()
            
        }
    };

    let jqxhr1 = $.ajax(settings).done(function(response) {
            console.log("Run: Cierres")
        })
        .done(function(data) {
            $.each(data, function(i, val) {})
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
            //clearUnicaInput()
            clsEntrega()
            refreshXhr()            
            console.info("Run: all user always");
        })
}
function saveDataCierres(){
    let p1_cierresTxt        = $("#cierresTxt").html()
    let p1_cierre_id_advance = $("#cierre_id_advance").val()
    let p1_cierres_id_advance = $("#cierres_id_advance").val()
    
    
    //alert(p1_cierresTxt + "-" + p1_cierre_id_advance)

    let p2_cierres_origen     = $("#cierres_origen").val()
    let p2_cierres_origen_grs = $("#cierres_origen_grs").val()

    //alert(p2_cierres_origen +"-" + p2_cierres_origen_grs)

    let p3_generar_fino_pza   = $("#generar_fino_pza").val()
    let p3_generar_precio     = $("#generar_precio").val()
    let p3_generar_importe    = $("#generar_importe").val()

    //alert(p3_generar_fino_pza + "-" + p3_generar_precio + "-" + p3_generar_importe)

    let p4_generar_pagos         = $("#generar_pagos").val()
    let p4_generar_TipoPago      = $("#generar_TipoPago").val()
    let p4_generar_Observaciones = $("#generar_Observaciones").val()
  
    let p5_generar_saldo         = $("#xhrSaldo").html()

    //alert(p4_generar_pagos)    
    
    let settings = {
        "url": urlDbTabsCierresC + '?type=cierres',
        "method": "POST",
        "timeout": 0,
        "headers": {
            /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "save_id_advance_user"         : $("#id_advance_x").val(),
            "save_p1_cierresTxt"           : p1_cierresTxt,
            "save_p1_cierre_id_advance"    : p1_cierre_id_advance,
            "save_p1_cierres_id_advance"    : p1_cierres_id_advance,
            "save_p2_cierres_origen"       : p2_cierres_origen,
            "save_p2_cierres_origen_grs"   : p2_cierres_origen_grs,
            "save_p3_generar_fino_pza"     : p3_generar_fino_pza,
            "save_p3_generar_precio"       : p3_generar_precio,
            "save_p3_generar_importe"      : p3_generar_importe,
            "save_p4_generar_pagos"        : p4_generar_pagos,
            "save_p4_generar_TipoPago"     : p4_generar_TipoPago,
            "save_p4_generar_Observaciones": p4_generar_Observaciones,
            "save_p5_generar_saldo"        : p5_generar_saldo
        }
    };

    let jqxhr1 = $.ajax(settings).done(function(response) {
            console.log("Run: Cierres")
        })
        .done(function(data) {
            $.each(data, function(i, val) {})
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
            clsCierres()
            refreshXhr()
            $('#cierresModal').modal('hide')
            console.info("Run: all user always");
        })

}
function saveTabsPagos(){
    console.log("BTN SAVE");

    let generarPagoTotal     = $("#generarPagoTotal").val()
    let generarPago          = $("#generarPago").val()
    let generarTipoPago      = $("#generarTipoPago").val()
    let generarSaldo         = $("#generarSaldo").val()
    let generarObservaciones = $("#generarObservaciones").val()
    
    let settings = {
        "url": urlDbTabsPagosC + '?type=pagos',
        "method": "POST",
        "timeout": 0,
        "headers": {
            /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "save_id_advance"         : $('input[type="checkbox"]:checked').val(),
            "save_id_advance_user"    : $("#id_advance_x").val(),
            "generarPagoTotal"        : generarPagoTotal     ,
            "generarPago"             : generarPago          ,
            "generarTipoPago"         : generarTipoPago      ,
            "generarSaldo"            : generarSaldo         ,
            "generarObservaciones"    : generarObservaciones 
        }
    };

    let jqxhr1 = $.ajax(settings).done(function(response) {
            console.log("Run: Cierres")
        })
        .done(function(data) {
            $.each(data, function(i, val) {})
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
            //btnDisables()
            clsPagos()
            refreshXhr()
            console.info("Run: all user always");
        })

}
//END------------------------------------------------------------>
/*****************************************************************
 *                            - BEGIN -                          *
 *                              TABS                             *
 *                            Save Btn                           *
 *****************************************************************/

function loadingMetalesSaldo(){
    //--->
    console.log("%cXHR: %cmetales/detalles loadingMetalesSaldo", "color: red", "color: green");
    $("#loadingMetalesCierres").fadeIn().empty()

    let id_advance = $("#id_advance_x").val();

    let jqxhr = $.getJSON(urlSaldoR + "/?name=Saldo&type=saldo&id=" + id_advance, function(data) {
        })
        .done(function(data) {
            //--->
            $.each(data, function(i, val) {
                if(val.Error){
                    console.error("%cXHR: %cmetales/detalles Error DB saldo", "color: red", "color: yellow");
                }else{
                    //$("#btnModalSaldo").hide()
                    //$("#btnModalCierre,#btnModalEntrega,#btnentregasMultipleModal,#btnModalEntregaUnica,#reloadCaja").show()

                    $(".saldoActual").html(val.detail_saldo_actual)
            
                    $("#xhrCliente").html(val.firstname + " " + val.secondname)
                    $("#xhrSaldo").html(val.detail_saldo_actual)
                    $("#xhrCliente").show()
                    $("#xhrSaldotxt").show()
                }
            })
                //--->
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            //--->
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
        })
        //--->  
}
function loadingSelectCierre(){
    //--->
    $("#cierres_origen_grs").empty().append("<option value=\"null\"> - Opciones -</option>")

    let id_advance = $("#id_advance_x").val();
    
    let jqxhr = $.getJSON(urlDbTabsCierreR + "/?name=selectCierre&type=cierre&id=" + id_advance, function(data) {
        })
        .done(function(data) {
            //--->
            $.each(data, function(i, val) {
                if(val.detail_grs > 0){
                    let detail_grs = $("#cierres_origen_grs").append("<option value=\"" + val.detail_grs + " " + val.detail_precio + " " + val.id_advance +"\">" + val.detail_grs + " Grs - $" + val.detail_precio + "</option>");
                }
                
            })
            //--->
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            //--->
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
            $(".loading-origen-x").addClass("d-none")
            $(".loading-origen").removeClass("d-none")
        })
        //--->  
}
function loadingSelectCierreMul(){
    //--->
    $("#cierres_origen_grs_mul").empty().append("<option value=\"null\"> - Opciones -</option>")

    let id_advance = $("#id_advance_x").val();
    
    let jqxhr = $.getJSON(urlDbTabsCierreR + "/?name=selectCierre&type=cierre&id=" + id_advance, function(data) {
        })
        .done(function(data) {
            //--->
            $.each(data, function(i, val) {
                if(val.detail_grs > 0){
                    let detail_grs = $("#cierres_origen_grs_mul").append("<option value=\"" + val.detail_grs + " " + val.detail_precio + " " + val.id_advance +"\">" + val.detail_grs + " Grs - $" + val.detail_precio + "</option>");
                }
                
            })
            //--->
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
            $(".loading-origen-x-mul").addClass("d-none")
            
            $(".loading-origen-mul").removeClass("d-none")
        })
        //--->  
}