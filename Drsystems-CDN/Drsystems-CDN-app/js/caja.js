apiConecction();
/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log("Run file caja");

$(function(){
	/*
	###################################################
	#                    Begin :  Caja                #
	###################################################
	*/			
    //------------------------------------------------->
    fechaIid = $("#start").val();
    allCaja(fechaIid);
    //------------------------------------------------->
})

//------------------------------------------------->
function allCaja(fechaId) {
    //--->
    console.info("Run: All Caja " + fechaId);
    
    fechaIdAntes  = fechaId.split("-");  
    fechaMesAntes =  parseFloat(fechaIdAntes[1]);
  
    let nowMes  = new Date(); 
    nowMes      = nowMes.getMonth() + 1;
    
    //------>
    allCajaCancelados(fechaId);
    //------>

    console.log("Mes Pasado: " + fechaMesAntes + " " + nowMes)
  
    $("#saldoinicial-create,#btnNewEntradaSalida").hide(300);
    //----->ALERT
    $("#rMestabla").hide()
  
    urlX = url_caja_all + "?id_advance=&a181a603769c1f98ad927e7367c7aa51=b326b5062b2f0e69046810717534cb09&date=" + fechaId;
  
    var settings = {
      url:urlX,
      method: "GET",
      timeout: 0,
      headers: {
        Authorization: "Basic cm9vdDphZG1pbg==",
      },
    };
  
    $.ajax(settings)
      .done(function (data) {
        $("#allCaja").empty();
        $("#sMesalert,#rMesalert").hide(300);
  
        //---> each
        $.each(data, function (i, val) {
          
          if (val.Error == "104") {
            //----> IF
            /*
            Its use is: muestra el 
                                  -bottonsaldo inicial
                                  -alert saldo inicial
                                  -alert regstro encaja
                                           if(fechaMesAntes < nowMes){
            //----->BUTTON
            $("#saldoinicial-create,#btnNewEntradaSalida").hide(300);
          }else{
            $("#saldoinicial-create,#btnNewEntradaSalida").show(300);
          }
            */    
           $("#saldoinicial-create").show(300);
            //----->ALERT
            $("#sMesalert").show(300);
            //$("#rMesalert").show(300);
            
            //----> IF
          } else {
            //----> ELSE
  
            $("#btnNewEntradaSalida").show(300);
            //----->TABLE
            $("#rMestabla").show(300);
  
            //----->BUTTON
            
  
            if (val.origen_id_advance == null) {
              id_ori_adv = "vacio";
            } else {
              id_ori_adv = val.cajaResult;
            }
  
            if (val.cajaTipo == "entrada") {
              var colortr = "table-success";
              var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
              var tiporegistro ="entrada calcular calculaActivas " + i + "target";
            } else if (val.cajaTipo == "salida") {
              var colortr = "table-warning";
              var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
              var tiporegistro = "salida calcular calculaActivas " + i + "target";
            } else if (val.cajaTipo == "inicial") {
              var colortr = "table-info alert-link";
              var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
              var tiporegistro = "inicial calculaActivas " + i + "target";
            } else if (val.cajaTipo == "cancelado") {
                var colortr = "table-danger alert-link";
                var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
                var tiporegistro = "cancelado calculaActivas " + i + "target";
            }
            
            if(val.id < 10){
                id_xxx =  '000'+val.id
                }else if(val.id >= 10 && val.id <= 99){
                    id_xxx =  '00'+val.id
                    }else if(val.id >= 100 && val.id <= 999){
                        id_xxx =  '0'+val.id
                        }else if(val.id >= 1000){
                            id_xxx =  val.id
                            }

            $("#allCaja")
            .fadeIn(3000)
            .append(
                '<tr class="' + colortr + " " + tiporegistro + ' " id="' + val.id_advance + '"          >' +
                    '<th class="text-center " scope="row"><input name="idX" type="checkbox" class="idAcheckbox" id="' + val.id_advance + '"> </th>' +
                    '<td class="text-center text-lowercase"                                                                       >' + id_xxx + "</td>" +  
                    '<td class="text-center text-capitalize"                                                                      >' + val.cajaNuevaFecha + "</td>" +
                    '<td class="text-center text-capitalize text-left" id="' + val.cajaResult + '"                                >' + val.usuarioNombre['firstname'] + " " + val.usuarioNombre['secondname'] + '</td>' +

                    '<td class="text-center text-capitalize tipo"                                                                      >' + val.cajaTipo + "</td>" +
                    '<td class="text-capitalize text-left"                                                                        >' + val.cajaConcepto + "</td>" +
                    '<td class="text-center text-lowercase"                                                                       > <span class="alert-link  calcular entradaMonto">' + new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaEntrada) + "</span></td>" +
                    '<td class="text-center text-capitalize"                                                                      > <span class="alert-link  calcular salidaMonto">'  + new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaSalida) + "</span></td>" +
                    '<td class="text-center text-lowercase"                                                                       > <span class="alert-link  calcular saldoMonto '+ val.cajaTipo +'">'   + new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaSaldo) + "</span></td>" +
                '</tr>'
            );
            //---->
       
            //----> ELSE
          }
          
        })
        //---> each
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.info("Run: all user loading error");
        xhrError(jqXHR, textStatus, errorThrown);
      })
      .always(function (data) {
        console.log("val:" + data.length)
        
        if(data[0].Caja == "Error"){
         
        }else if(data.length == 1){
         
            // alert(1)
            calcCeldauno();
            subTotales();
            calcTotal();
            
        }else if(data.length >= 2){
       
            // alert(2)
            calcCeldauno();
            subTotales();
            calcTotal();
            calcAllceldas();
       
        }
        
        checkBoxOne()

      })
      
    //--->
}
function allCajaCancelados(fechaId) {
    //--->
    console.info("Run: All Caja " + fechaId);
    
    fechaIdAntes  = fechaId.split("-");  
    fechaMesAntes =  parseFloat(fechaIdAntes[1]);
  
    let nowMes  = new Date(); 
    nowMes      = nowMes.getMonth() + 1;
  
    console.log("Mes Pasado: " + fechaMesAntes + " " + nowMes)
  
    $("#saldoinicial-create,#btnNewEntradaSalida").hide(300);
    //----->ALERT
    $("#rCancelados").hide()
  
    urlX = url_caja_cancelados + "&date=" + fechaId;
  
    var settings = {
      url:urlX,
      method: "GET",
      timeout: 0,
      headers: {
        Authorization: "Basic cm9vdDphZG1pbg==",
      },
    };
  
    $.ajax(settings)
      .done(function (data) {
        $("#allCancelados").empty();
        $("#rCancelados").hide(300);
  
        //---> each
        $.each(data, function (i, val) {
          
          if (val.Error == "104") {
            //----> IF
            /*
            Its use is: muestra el 
                                  -bottonsaldo inicial
                                  -alert saldo inicial
                                  -alert regstro encaja
                                           if(fechaMesAntes < nowMes){
            //----->BUTTON
            $("#saldoinicial-create,#btnNewEntradaSalida").hide(300);
          }else{
            $("#saldoinicial-create,#btnNewEntradaSalida").show(300);
          }
            */    
           $("#saldoinicial-create").show(300);
            //----->ALERT
            //$("#sMesalert").show(300);
            //$("#rMesalert").show(300);
            
            //----> IF
          } else {
            //----> ELSE
  
            //$("#btnNewEntradaSalida").show(300);
            //----->TABLE
            $("#rCancelados").show(300);
  
            //----->BUTTON
            
  
            if (val.origen_id_advance == null) {
              id_ori_adv = "vacio";
            } else {
              id_ori_adv = val.cajaResult;
            }
  
            if (val.cajaTipo == "entrada") {
              var colortr = "table-success";
              var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
              var tiporegistro ="entrada calcular calculaActivas " + i + "target";
            } else if (val.cajaTipo == "salida") {
              var colortr = "table-warning";
              var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
              var tiporegistro = "salida calcular calculaActivas " + i + "target";
            } else if (val.cajaTipo == "inicial") {
              var colortr = "table-info alert-link";
              var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
              var tiporegistro = "inicial calculaActivas " + i + "target";
            } else if (val.cajaTipo == "cancelado") {
                var colortr = "table-danger alert-link";
                var saldotr = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaMonto);
                var tiporegistro = "cancelado calculaActivas " + i + "target";
            }
            
            if(val.id < 10){
                id_xxx =  '000'+val.id
                }else if(val.id >= 10 && val.id <= 99){
                    id_xxx =  '00'+val.id
                    }else if(val.id >= 100 && val.id <= 999){
                        id_xxx =  '0'+val.id
                        }else if(val.id >= 1000){
                            id_xxx =  val.id
                            }

            $("#allCancelados")
            .fadeIn(3000)
            .append(
                '<tr class="' + colortr + " " + tiporegistro + ' " id="' + val.id_advance + '"          >' +
                    '<th class="text-center " scope="row">X</th>' +
                    '<td class="text-center text-lowercase"                                                                       >' + id_xxx + "</td>" +  
                    '<td class="text-center text-capitalize"                                                                      >' + val.cajaNuevaFecha + "</td>" +
                    '<td class="text-center text-capitalize text-left" id="' + val.cajaResult + '"                                >' + val.usuarioNombre['firstname'] + " " + val.usuarioNombre['secondname'] + '</td>' +

                    '<td class="text-center text-capitalize tipo"                                                                      >' + val.cajaTipo + "</td>" +
                    '<td class="text-capitalize text-left"                                                                        >' + val.cajaConcepto + "</td>" +
                    '<td class="text-center text-lowercase"                                                                       > <span class="alert-link  calcular entradaMonto">' + new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaEntrada) + "</span></td>" +
                    '<td class="text-center text-capitalize"                                                                      > <span class="alert-link  calcular salidaMonto">'  + new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaSalida) + "</span></td>" +
                    '<td class="text-center text-lowercase"                                                                       > <span class="alert-link  calcular saldoMonto '+ val.cajaTipo +'">'   + new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(val.cajaSaldo) + "</span></td>" +
                '</tr>'
            );
            //---->
       
            //----> ELSE
          }
          
        })
        //---> each
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.info("Run: all user loading error");
        xhrError(jqXHR, textStatus, errorThrown);
      })
      .always(function (data) {
        console.log("val:" + data.length)
        
        /*
        if(data[0].Caja == "Error"){
         
        }else if(data.length == 1){
         
            // alert(1)
            calcCeldauno();
            subTotales();
            calcTotal();
       
        }else if(data.length >= 2){
       
            // alert(2)
            calcCeldauno();
          subTotales();
          calcTotal();
          calcAllceldas();
       
        }
        */

      })
    //--->
}