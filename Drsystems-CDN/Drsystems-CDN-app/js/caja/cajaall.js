/*
|->TOOLCAJA.JS
|----- utilityUltimafecha()
|----- [ Carga la Ultima fecha]
*/
function utilityUltimafecha(){
    console.info('utility Ultima fecha')
    urlX = url_caja_utility + "ultimafecha";
  
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
        //--->
        $.each(data, function (i, val){
            $("#ultimafecha").val(val.cajaNuevaFecha)
        })        
        $("#caja-nuevoFecha").attr('disabled',false);
    })
    .fail(function (jqXHR,textStatus,errorThrown) {
        xhrError(jqXHR,textStatus,errorThrown)
    })
    .always(function () {
    })
}

/*
|->TOOLCAJA.JS
|----- nuevaFechainpuz()
|---------> fechasInputs()
|---------> inputNuevoenabled()
|---------> inputNuevodisabled() <----> A)->bottonCajaNuevo()
*/
function nuevaFechainput(val){
    //--------------------------------------------->  
    d = new Date();
    m = d.getDate();
    
    n      = d.getMonth();
    let mesHoy = n + 1;
    
    let diaHoy = m;
        mesHoy = "0"+mesHoy;
    
    //--------------------------------------------->
        if($("#ultimafecha").val() == ""){
            date = new Date();
            year = date.getFullYear();
            month = date.getMonth()+1;
            dt = date.getDate();

            if (dt < 10) {
            dt = '0' + dt;
            }
            if (month < 10) {
            month = '0' + month;
            }

            fecha     = year+'-' + month + '-01';

        }else{
            fecha     = $("#ultimafecha").val();
        }  

        let fechax     = fecha.split("-");
    
        let annoFecha = fechax[0];
        let mesFecha  = fechax[1];
        let diaFecha  = fechax[2];
        //--------------------------------------------->
        let fechaUi    = val;
        fechaUi    = fechaUi.split("-");  
    
        let annoUi     = fechaUi[0];
        let mesUi      = fechaUi[1];
        let diaUi      = fechaUi[2];
    
    var xxx = fechasInputs(diaHoy,mesHoy,fecha,annoFecha,mesFecha,diaFecha,fechaUi,annoUi,mesUi,diaUi)
    console.clear()
    }
function fechasInputs(diaHoy,mesHoy,fecha,annoFecha,mesFecha,diaFecha,fechaUi,annoUi,mesUi,diaUi){
    console.log("js       print Dia Hoy"+ diaHoy + "mes Hoy: " +  mesHoy)
    console.log("js ajax  ultima Fecha:" + fecha + " ultima  Fecha Año:" + annoFecha + " ultima  Fecha mes:" + mesFecha + " ultima  Dia Mmes:" + diaFecha)
    console.log("js input fecha ui:" + fechaUi + " " + "año UI:" + annoUi + " " + "mes UI:" + mesUi + " " + "dia UI:" + diaUi)


    if(mesUi != mesHoy){
        console.log(1)
        console.log("js input fecha: El registro con Mes diferente al actual no son validas y no esta permitido")
        alert("El registro con Mes diferente al actual no son validas y no esta permitido");

        //$("#caja-nuevoFecha").val(" ")
    }else if (diaHoy < diaUi) {
        console.log(2)
        console.log("js input fecha: El registro con fecha mayor al dia de hoy no son validas y no esta permitido")
        alert("El registro con fecha mayor al dia de hoy no son validas y no esta permitido");

        //$("#caja-nuevoFecha").val(" ")
    }else if (diaFecha > diaUi) {
        console.log(3)
        console.log("js input fecha: El registro con fecha menores al ultimo registro no son validas y no esta permitido")
        alert("El registro con fecha menores al ultimo registro no son validas y no esta permitido");

        //$("#caja-nuevoFecha").val(" ")
    }else if (diaFecha > diaUi && mesFecha== mesUi){ 
        console.log(4)
        alert(1)

    }else{
        console.log(5)

            if($("#ultimafecha").val() != " " ){
                $("#fechaHelp").removeClass("text-danger").fadeIn().html('La fecha es correcto.').addClass("text-success");
                $("#buscador").attr('disabled',false);        
                }else{
                $("#buscador").attr('disabled','disabled')      
                }      
    }
}

function validarInput(){
    console.log("validar Inputs")  
    
    $("#caja-monto").on('click', function() {
    
      /*
        if($("#caja-concepto").val() == ""){
                
            alert("El campo Concepto es requerido para continuar")
            $("#caja-concepto").focus()

            }else if($("#caja-tipo").val() == null || $("#caja-tipo").val() == "null"){

              alert("El campo Tipo es requerido para continuar")
              $("#caja-tipo").focus()

              }else if($("#caja-monto").val() == ""){

                alert("El campo Monto es requerido para continuar")
                $("#caja-monto").focus()

                }else{
                    $("#b-new-caja,#cajaCerrar").show().attr("disabled", false);
                }        
        */
       $("#b-new-caja,#cajaCerrar").show().attr("disabled", false);
     })
      

  }

//----> Begin: click save caja
function newRegistrocaja(){
  
    idOperacion     = $("#idOperacion").val()
    saveApicaja     = true
    cajaIdAdvance   = $("#id_advance").val()
    cajaResult      = $("#result").val()
    cajaNuevaFecha  = $("#caja-nuevoFecha").val()
    cajaConcepto    = $("#caja-concepto").val()
    cajaNotas       = $("#caja-notas").val()
    cajaTipo        = $("#caja-tipo").val()
    cajaMonto       = $("#caja-monto").val()
    cajaFolio       = $("#caja-folio").val()
  
    console.log("run ticket copy");

    settings = {
      async: true,
      crossDomain: true,
      url: url_caja_new,
      method: "POST",
      headers: {
        "xr8-api-key"  : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache",
      },
      data: {
        cajaIdAdvance  : cajaIdAdvance,
        cajaResult     : cajaResult,
        cajaNuevaFecha : cajaNuevaFecha,
        cajaConcepto   : cajaConcepto,
        cajaNotas      : cajaNotas,
        cajaTipo       : cajaTipo,
        cajaSave       : saveApicaja,
        idOperacion    : idOperacion,
        cajaMonto      : cajaMonto,
        cajaFolio      : cajaFolio,                
      }
    };
  
    $.ajax(settings)
    .done(function (data) {
      //----->ALERT
      $("#sMesalert,#rMesalert").hide(300);
    
      //----->BUTTON        
      $("#saldoinicial-create").hide(300);
      $("#ticket-print").removeClass("d-none").fadeIn()
      $("#ticket-print").click(function () {printDiv()})
      
      /*no existe #ultimafecha*/
      //utilityUltimafecha()
    
      inputNuevodisabled()
      fechaIid = $("#start").val()
      //allCaja(fechaIid);
      
      $("#ticket-print").removeClass("d-none").fadeIn()
    
      $("#ticket-print").click(function () {
       // printDiv()
      })
    
    }).fail(function (jqXHR, textStatus, errorThrown) {
      
      //--->
      console.info("Run: error alluser");
      xhrError(jqXHR, textStatus, errorThrown);
      $('#saldoinicialModal').modal('hide')
      alert("Error: No se pudo guardar la informacion.")
      location.reload();
      //--->
    
    }).always(function (data) {
      
      //--->
      console.info("Run: allways alluser");
      $('#saldoinicialModal').modal('hide')
      fechaIid = $("#start").val();
      allCaja(fechaIid);
    });
  
      //--->
      console.info("Run: user new xhr");
      
      //---->
        
  }

  /***************************************************************************** 
   *                                                                           *
   *                                                                           *
   *                                  FUNCTION                                 *
   *                                  All Caja                                 *
   *                                                                           *
   *****************************************************************************/
  /*
  |->CAJA.JS
  |----- AllCaja
  |--------> Autocomplete
  |--------> calcCeldauno()
  |---------> subTotales()
  |--------------> calcSalida()
  |--------------> calcSaldo()
  |--------------> calcEntrada()
  |---------> calcTotal()
  |---------> calcAllceldas()
  */
   //---> Bein: All Caja
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

//--------------------------------------------------------------------------->
    //---> Begin: 
    /*
    *   Ccalcula la primera entrda o salida  + - el saldo inicial
    */
    function calcCeldauno() {
        console.info("Run calc Celdauno");
        //-----> y[0]
        let saldoInicial = $("#allCaja .inicial .saldoMonto").html();
        saldoInicial = saldoInicial.replace("$", "").replace(",", "");
        
        if(saldoInicial.lenght > 0){
          saldoInicial = parseFloat(saldoInicial); 
          //-----> x[0]
          let entradaMonto = $("#allCaja .calcular .entradaMonto").each(function (key) {});
          entradaMonto = entradaMonto[0].textContent.replace("$", "").replace(",", "");
          entradaMonto = parseFloat(entradaMonto);
    
          //-----> x[0]
          let salidaMonto = $("#allCaja .calcular .salidaMonto").each(function (key) {});
          salidaMonto = salidaMonto[0].textContent.replace("$", "").replace(",", "");
          salidaMonto = parseFloat(salidaMonto);
    
          if (entradaMonto != 0) {            
            saldoUno = (entradaMonto) + (saldoInicial);
            } else {
              saldoUno = (salidaMonto) - (saldoInicial);
              }
      
          $("#allCaja .1target .saldoMonto").html(new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(saldoUno));
        }

      }
//--------------------------------------------------------------------------->

//--------------------------------------------------------------------------->
    /*
    //---> Begin: calcTotal()
                    calcEntrada()
                    calcSalida()
                    calcSaldo()
            Calcula los subtitulos  Entrada ! Salida ! Saldo
    */
    function subTotales() {
    console.info("Run: subTotales");

    subtotalEntrada = calcEntrada()
    subtotalSalida  = calcSalida()
    subtotalSaldo   = calcSaldo()

    $("#allCaja").append(
        '<tr class="table-dark text-center text-dark">' +
        '<th scope="row"></th><td></td><td></td><td></td><td></td>' +
        '<td></td>' +
        '<td class="text-capitalize"><span class="alert-link">Entradas      </span></td>' +
        '<td class="text-capitalize"><span class="alert-link">Salidas       </span></td>' +
        '<td class="text-capitalize"><span class="alert-link">Saldo Inicial </span></td>' +
        '</tr>' +
        '<tr class="table-dark text-dark">' +
        '<th scope="row"></th><td></td><td></td>' +
        '<td class="text-capitalize text-left"><span class="alert-link">Subtotal </span></td><td></td>' +
        '<td></td>' +
        '<td class="text-capitalize text-center"><span class="alert-link">' + subtotalEntrada + '</span></td>' +
        '<td class="text-capitalize text-center"><span class="alert-link">' + subtotalSalida  + '</span></td>' +
        '<td class="text-capitalize text-center"><span class="alert-link">' + subtotalSaldo   + '</span></td>' +
        '</tr>'
    );
    }      
    //---> Begin:
    function calcEntrada() {
      let sumaEntrada = 0;    
        $("#allCaja .entrada .entradaMonto").each(function (key) {
          montoEntrada =$(this).html().replace("$", "").replace(",", "");
          sumaEntrada += parseFloat(montoEntrada);
        });
      return new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(sumaEntrada);
    }
    //---> Begin:
    function calcSalida() {
      let sumaSalida = 0;
        $("#allCaja .salida .salidaMonto").each(function (key) {
          montoSalida =$(this).html().replace("$", "").replace(",", "");
          sumaSalida += parseFloat(montoSalida);
        });
      return new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(sumaSalida);
    }
    //---> Begin:
    function calcSaldo() {
        montoSaldo = $(".inicial .saldoMonto").html().replace("$", "").replace(",", "");
        montoSaldo = parseFloat(montoSaldo);
    
        return new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(montoSaldo);
    }   
//--------------------------------------------------------------------------->

//--------------------------------------------------------------------------->
    /*
    //---> Begin: calcTotal()
                    calcEntrada()
                    calcSalida()
            Calcula  el Total  (Entrada) - (Salida) + (Saldo)                    
    */
   function calcTotal()  {
    
    //---->
    let sumaEntrada = 0;    
    $("#allCaja .entrada .entradaMonto").each(function (key) {
      montoEntrada =$(this).html().replace("$", "").replace(",", "");
      sumaEntrada += parseFloat(montoEntrada);
    });
    let sumaSalida = 0;
    $("#allCaja .salida .salidaMonto").each(function (key) {
      montoSalida =$(this).html().replace("$", "").replace(",", "");
      sumaSalida += parseFloat(montoSalida);
    });
    montoSaldo = $(".inicial .saldoMonto").html().replace("$", "").replace(",", "");
    montoSaldo = parseFloat(montoSaldo);
    
    //---->

    total = (sumaEntrada) + (montoSaldo) - (sumaSalida);
    total = new Intl.NumberFormat("en-US",{style: "currency",currency: "USD",}).format(total);

    $("#allCaja").append(
      '<tr class="table-primary text-dark">' +
        '<th scope="row"></th><td></td><td></td>' +
        '<td class="text-capitalize text-left"><span class="alert-link">Total </span></td>' +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        '<td></td><td class="text-capitalize text-center"><span class="alert-link">' + total + "</span></td>" +
      "</tr>"
    );
  }
//--------------------------------------------------------------------------->

//--------------------------------------------------------------------------->
//---> Begin:
/**
 * Calcula el saldo apartir del saldo 2
*/
function calcAllceldas() {
    //----->
      console.log("Run: calcAllceldas")
  
      entradaMonto = $("#allCaja .calcular .entradaMonto").each(function (key) {});
      salidaMonto  = $("#allCaja .calcular  .salidaMonto").each(function (key) {});
      saldoMonto   = $("#allCaja .calcular   .saldoMonto").each(function (key) {});
      imas         = entradaMonto.length + 1;
  
      for (var i = 0; i < entradaMonto.length; i++) {
      //----->
  
      /**********************************
       *      o$ + 1E = 1$
       **********************************/
  
      x = i + 1;
      y = i + 2;
      
        if(x > i){
  
          //----->
          if(x == entradaMonto.length){
          } else {
            entradaX = parseFloat(entradaMonto[x].textContent.replace("$", "").replace(",", ""));
            salidaX = parseFloat(salidaMonto[x].textContent.replace("$", "").replace(",", ""));
            
          }
          //----->        
  
          }else{
            entradaX = 0;
            salidaX  = 0;
          }
  
        saldoX = parseFloat(saldoMonto[i].textContent.replace("$", "").replace(",", ""));
  
        if (entradaX != 0) {
          resultadoX = (saldoX) + (entradaX);
        } else {
          resultadoX = (saldoX) - (salidaX);
        }
        
        resultadoX = new Intl.NumberFormat("en-US", {style: "currency",currency: "USD",}).format(resultadoX);
  
        $("#allCaja ." + y + "target .saldoMonto").html(resultadoX);
  
      //----->    
      }
  
    //----->
    }
//--------------------------------------------------------------------------->    
  
  
    //----->
  /*no existe #ultimafecha*/
  function utilityUltimafecha(){
    console.info('utility Ultima fecha')
    urlX = url_caja_utility + "ultimafecha";
  
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
      //--->
      $.each(data, function (i, val) {$("#ultimafecha").val(val.cajaNuevaFecha)});
      //--->
      setTimeout(function(){ $("#caja-nuevoFecha").attr('disabled',false) }, 1000);
      
    })
    .fail(function (jqXHR,textStatus,errorThrown) {
        xhrError(jqXHR,textStatus,errorThrown)
    })
    .always(function () {
    })
  }


  function btnCancelar(){
        var x = $("#btnCancelar").click(function () {
        var r = confirm("Deseas cancelar esta operacion !");
        if (r == true) {
            cancelarOperacion();
        } else {

        }  
    })
    x = " ";
/*

*/
  }    

  function cancelarOperacion(){
         
    var settings = {
        "url": url_caja_delete ,
        "method": "POST",
        "timeout": 0,
        "headers": {
          /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
          "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
          "id_advance": $(".idAcheckbox:checked").attr("id")
        }
      };
      
      $.ajax(settings).done(function (response) {
        console.log(response);
      }).fail(function (jqXHR, textStatus, errorThrown) {
        console.info("Run: all user loading error");
        xhrError(jqXHR, textStatus, errorThrown);
      })
      .always(function (data) {
        console.log("val:" + data.length)
        fechaIid = $("#start").val();
        allCaja(fechaIid);
      });  
  
  }