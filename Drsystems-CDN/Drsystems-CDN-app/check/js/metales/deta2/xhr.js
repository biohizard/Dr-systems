/*##########################################################################
____  ______ _____________ 
\   \/  /   |   \______   \
 \     /    ~    \       _/
 /     \    Y    /    |   \
/___/\  \___|_  /|____|_  /
      \_/     \/        \/ 
###########Xhr()###############################################################*/
function Xhr(){
    console.log("%c Load Js GTV XHR ","color:#FA2A00; font-size:24px")
    apiConecction()
    xhrloadingTabsCierre()
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
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function refreshXhr(){
            console.log("%cXHR:  %cmetales/detalles refreshXhr", "color: blue", "color: yellow");
            xhrloadingTabsCierre()
            /*
            loadingTabsEntregas()
            loadingTabsCierres()
            loadingTabsPagos()

            loadingMetalesSaldo()
            */
            
        }
        /************************************/

        /**
        * Function     loadingTabsCierre
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function xhrloadingTabsCierre(){
            console.log("%cXHR:    %cmetales/detalles loadingTabsCierres", "color: blue", "color: yellow");
            $("#loadingMetalesCierre").fadeIn().empty()

            let id_advance = $("#id_advance_x").val();
            let jqxhr = $.getJSON(urlDbTabsCierreR + "/?name=tabsCierre&type=cierre&id=" + id_advance, function(data) {
                        })
                        .done(function(data){
                            $.each(data, function(i, val) {
                                if(val.Code == 104){
                                    $("#loadingMetalesCierres").fadeIn(3000).append('<tr><th>Sin Cierres</th></tr>')
                                }else if(val.status == "activo"){
                                    let m_id     = zerocien(parseInt())
                                    let mc_id    = zerocien(parseInt(val.id))

                                    let funColorCierres = cierreColors(val.detail_grs,val.detail_grs_original)
                                    let funCheckbox     = cierreCheckbox(val.detail_grs,val.detail_grs_original,val.id_advance)

                                    //Compra de Metales cliente $saldo
                                    $("#cliente_nombre").fadeIn(3000).html(val.firstname + ' ' + val.secondname)

                                    //#	ID Cierre	Fecha	Tipo	Status	Metal	Precio	Peso Original	Peso Actual
                                    let x_pagos = new Intl.NumberFormat("en-US").format(val.detail_precio)
                                    $("#loadingMetalesCierre")
                                        .fadeIn(3000)
                                        .append(
                                            '<tr class="cierresItem ' + funColorCierres + '" id="' + val.id_advance + '">' + 
                                                funCheckbox +
                                            '   <td class="'+ val.id_advance  +' cierre_id">'           + val.id                  + '</td>'      +
                                            '   <td class="'+ val.id_advance  +' cierre_fecha">'        + val.detail_fecha        + '</td>'      +
                                            '   <td class="'+ val.id_advance  +' cierre_tipo">'         + val.detail_tipo         + '</td>'      +
                                            '   <td class="'+ val.id_advance  +' cierre_status">'       + val.detail_status       + '</td>'      +
                                            '   <td class="'+ val.id_advance  +' cierre_precio">  $ '   + x_pagos                 + '</td>'      +
                                            '   <td class="'+ val.id_advance  +' cierre_grs_original">' + val.detail_grs_original + ' Grs </td>' +
                                            '   <td class="'+ val.id_advance  +' cierre_pesoactual">'   + val.detail_grs          + ' Grs </td>' +
                                            '</tr>'
                                        )
                                }else{}
                            })
                        })
                        .fail(function(data, jqXHR, textStatus, errorThrown) {
                            console.error("Error: Loading Xhr Cierre");
                            xhrError(jqXHR, textStatus, errorThrown);
                        })
                        .always(function(data){})
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
        function xhrsaveDataCierre(){
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
                        $('#cierreNuevo').modal('hide')
                        clsModalCierre()
                        refreshXhr()
                        console.info("Run: all user always");
                    }) 

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
        function xhrUpdateCierre(){

            let modificarCierreIdAdvance = $("#modificarCierreIdAdvance").val();
            let modificarCierrePrecio    = $("#modificarCierrePrecio").val();
            let modificarCierrePeso      = $("#modificarCierrePesoOri").val();

            let settings = {
                "url": urlDbTabsCierreU + '?type=cierreUpdate',
                "method": "POST",
                "timeout": 0,
                "headers": {
                    /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "id_advance"         : modificarCierreIdAdvance,
                    "detail_gr_original" : modificarCierrePeso,
                    "detail_precio"      : modificarCierrePrecio
                }
            };
        
            let jqxhr1 = $.ajax(settings)
                .done(function(data) {
                    $.each(data, function(i, val) {})
                })
                .fail(function(data, jqXHR, textStatus, errorThrown) {
                    console.info("Run: all user loading error");
                    xhrError(jqXHR, textStatus, errorThrown);
                })
                .always(function(data) {
                    clsModificarCierre()
                    refreshXhr()
                    $('#cierreModificar').modal('hide')
                })

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
        function xhrDeleteCierre(){

            let modificarCierreIdAdvance = $("#modificarCierreIdAdvance").val();
            let modificarCierrePrecio    = $("#modificarCierrePrecio").val();
            let modificarCierrePeso      = $("#modificarCierrePesoOri").val();

            let settings = {
                "url": urlDbTabsCierreD + '?type=cierreDelete',
                "method": "POST",
                "timeout": 0,
                "headers": {
                    /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "id_advance"         : modificarCierreIdAdvance
                }
            };
        
            let jqxhr1 = $.ajax(settings)
                .done(function(data) {
                    $.each(data, function(i, val) {})
                })
                .fail(function(data, jqXHR, textStatus, errorThrown) {
                    console.info("Run: all user loading error");
                    xhrError(jqXHR, textStatus, errorThrown);
                })
                .always(function(data) {
                    
                    clsModificarCierre()
                    clsBorrarCierre()

                    refreshXhr()
                    $('#cierreBorrar').modal('hide')
                    
                })

        }
        /************************************/

    /**************** CIERRE ********************/

    /**************** ENTREGAS ********************/

        function loadingVale() {
            console.log("%cXHR: %cloadinngVale", "color: red", "color: green");
                
                let settings = {
                    "url": urlValeR + "/?name=novale&type=actual",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Authorization": "Basic cm9vdDphZG1pbg==",
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {}
                };
                let jqxhr1 = $.ajax(settings)
                    .done(function(data){
                        $.each(data, function(i, val) {
                            $("#input_novale").html(parseInt(val.id)+1)
                        })
                    })
                    .fail(function(data, jqXHR, textStatus, errorThrown){xhrError(jqXHR, textStatus, errorThrown)})
                    .always(function(data){})
        }

    /**************** ENTREGAS ********************/
/*########################################################################*/

/*##########################################################################
            ___.            __________               __  .__
  ________ _\_ |__          \______   \ ____  __ ___/  |_|__| ____   ___________
 /  ___/  |  \ __ \   ______ |       _//  _ \|  |  \   __\  |/    \_/ __ \_  __ \
 \___ \|  |  / \_\ \ /_____/ |    |   (  <_> )  |  /|  | |  |   |  \  ___/|  | \/
/____  >____/|___  /         |____|_  /\____/|____/ |__| |__|___|  /\___  >__|
     \/          \/                 \/                           \/     \/
##########################################################################*/

    /**************** Cierre ********************/
        
        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function zerocien(x) {
            //x >1,=1,<9,=9   x = 1...9                      0009
            if (x == 1 || x <= 9) {
                y = "000" + x;
                //x >= 10 and x x == 99 x = 10...99     0099
            } else if (x == 10 || x <= 99) {
                y = "00" + x;
                //x >= 100 and x x == 999 x = 100...999 0999
            } else if (x == 100 || x <= 999) {
                y = "0" + x;
                //x >= 1000 x = 1000 .... °°            9999
            } else if (x >= 1000) {
                y = x;
            } else { y = x; }

            return y;
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
        function clsModalCierre(){
            console.info("Run: clscierre")
            $("#generar_c_fecha,#generar_c_tipo,#generar_c_grs,#generar_c_precio").val("")
        }
        /************************************/

        /**
        * Function     cierreColors
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function cierreColors(x,y){
            //Color
            if      (parseFloat(x) == 0)             {var colorCierres = "table-primary   cierreAbierto";}
            else if (parseFloat(y) == parseFloat(x)) {var colorCierres = "table-success   cierreActivo ";}
            else if (parseFloat(x) > 0)              {var colorCierres = "table-secondary cierreCerrado";}
            else                                     {var colorCierres = "table-danger    cierreError  ";}
            
            return colorCierres
        }
        /************************************/

        /**
        * Function     cierreColors
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function cierreCheckbox(x,y,z){
            //Color
            if      (parseFloat(x) == 0)             {var cierreCheckbox = '<th scope="row"></th>'}
            else if (parseFloat(y) == parseFloat(x)) {var cierreCheckbox = '<th scope="row"><input type="checkbox" name="" value="' + z +'" class="checkboxone cierreId ' + z + ' "> </th>'}
            else if (parseFloat(x) > 0)              {var cierreCheckbox = '<th scope="row"></th>'}
            else                                     {var cierreCheckbox = '<th scope="row"></th>'}
            
            return cierreCheckbox
        }
        /************************************/
    
        /**************** Cierre ********************/

    /**************** ENTREGAS ********************/

    /**************** ENTREGAS ********************/

/*########################################################################*/