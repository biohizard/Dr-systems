//--------------------------------------------------------------->
//BEGIN
/*****************************************************************
 *                             BEGIN                             *
 *                         FUNCTION XHR                          *
 *****************************************************************/
 console.log("%cLoad File : %cxhr", "color: cyan", "color: yellow");

//--->  Create
function createClientes() {
let settings = {
      async:       true,
      crossDomain: true,
      timeout:     0,      
      method:      "POST",
      url:         urlClienteC,      
      headers: {
                /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                "xr8-api-key"  : "ewf45r4435trge",
                "content-type" : "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
    },
    data: {
        fecha1:    $("#exampleInputFecha1").val(),
        rfc1:      $("#exampleInputRfc1").val(),
        pais1:     $("#exampleInputPais1").val(),
        giro1:     $("#exampleInputgiro1").val(),
        first:     $("#exampleInputNombre").val(),
        second:    $("#exampleInputApellido").val(),
        email:     $("#exampleInputEmail").val(),
        tel:       $("#exampleInputTelefono").val(),
        rfc:       $("#exampleInputRfc").val(),
        curp:      $("#exampleInputCurp").val(),
        direccion: $("#exampleInputDireccion").val()
      }
    }
    let jqxhr1 = $.ajax(settings).done(function(data) {    
        $.each(data, function(i, val) {
        })
        }).fail(function(data, jqXHR, textStatus, errorThrown) {
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        }).always(function(data) {
            $("#createModal").modal("hide")
            $("#allUser").fadeIn().empty()
            clearAll()
            loadXhr()
        })
}
//--->  all user
function readeClientesAll() {
//--->
console.log("%cXHR: %cmetales/detalles loadingSaldoActual", "color: red", "color: green");
$("#allUser").fadeIn().empty()
let settings={
    url:         url_clientes_all +
                 "?id_advance=&"+
                 "a181a603769c1f98ad927e7367c7aa51=b326b5062b2f0e69046810717534cb09",    
    async:       true,
    crossDomain: true,
    timeout:     0,      
    method:      "POST",
    "headers": {
                /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                "xr8-api-key"  : "ewf45r4435trge",
                "content-type" : "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
    },
    "data": {}
}
let jqxhr1 = $.ajax(settings).done(function(data) {  
                $.each(data, function(i, val) {
                //-------->

                if (val.telefono == null) {
                    telefono = "vacio";
                } else {
                    telefono = val.telefono;
                }
          
                if (val.puesto == null) {
                    puesto = "vacio";
                } else {
                   puesto = val.puesto;
                }

                  $("#allUser")
                    .append(
                      '<tr class="text-center">' +
                        '<th scope="row"><input name="idX" type="checkbox" class="idAcheckbox" id="' +
                        val.id_advance +
                        '"></th>' +
                        '<td class="text-capitalize">' +
                        val.firstname +
                        "</td>" +
                        '<td class="text-capitalize">' +
                        val.secondname +
                        "</td>" +
                        '<td class="text-lowercase">' +
                        val.email +
                        "</td>" +
                        '<td class="text-capitalize">' +
                        telefono +
                        "</td>" +
                        '<td class="text-lowercase">' +
                        val.rfc +
                        "</td>" +
                        '<td class="text-lowercase">' +
                        val.curp +
                        "</td>" +
                        '<td class="text-capitalize">' +
                        val.direccion +
                        "</td>" +
                        "</tr>"
                    )
                //-------->
                })
                }).fail(function(data, jqXHR, textStatus, errorThrown) {
                    xhrError(jqXHR, textStatus, errorThrown);
                }).always(function(data) {
                })
//--->
}
//--->  all user
function readeClientesOne(id_advance) {
    //--->


    let settings = {
        async:       true,
        crossDomain: true,
        timeout:     0,      
        method:      "POST",
        url:         url_clientes_one +
                     "?id_advance="   +
                     id_advance       +
                     "&a181a603769c1f98ad927e7367c7aa51=68934a3e9455fa72420237eb05902327",
        headers: {
                  /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                  "xr8-api-key"  : "ewf45r4435trge",
                  "content-type" : "application/x-www-form-urlencoded",
                  "cache-control": "no-cache",
        },
        data: {}
      }

      let jqxhr1 = $.ajax(settings).done(function(data) {    
          $.each(data, function(i, val) {

            //BIGIN: Update
                let a = moment().format(val.rs_fecha, "dd-mm-yyy")
                $("#updateInputFecha1").val(a)
                $("#updateInputRfc1").val(val.rs_rfc)
                $("#updateInputPais1").val(val.rs_pais)
                $("#updateInputgiro1").val(val.rs_giro)
        
                /*Datos del representante legal*/
                $("#updateInputNombre").val(val.firstname)
                $("#updateInputApellido").val(val.secondname)
                $("#updateInputEmail").val(val.email)
                $("#updateInputTelefono").val(val.telefono)
                $("#updateInputRfc").val(val.rfc)
                $("#updateInputCurp").val(val.curp)
                $("#updateInputDireccion").val(val.direccion)

            //BIGIN: Delete
                $("#nombredelete").html(val.firstname + " " + val.secondname)
                $("#emaildelete").html(val.email)

            //BIGIN: Resume
                $("#resumenInputFecha1").html(a)
                $("#resumenInputRfc1").html(val.rs_rfc)
                $("#resumenInputPais1").html(val.rs_pais)
                $("#resumenInputgiro1").html(val.rs_giro)
        
                /*Datos del representante legal*/
                $("#resumenInputNombre").html(val.firstname + " " + val.secondname)
                $("#resumenInputRfc").html(val.rfc)
                $("#resumenInputCurp").html(val.curp)
                $("#resumenInputDireccion").html(val.direccion)
                $("#resumenInputTelefono").html(val.telefono)
                $("#resumenInputEmail").html(val.email)
          })
          }).fail(function(data, jqXHR, textStatus, errorThrown) {
              console.info("Run: all user loading error");
              xhrError(jqXHR, textStatus, errorThrown);
          }).always(function(data) {
          })
    //--->
}
//--->  Update
function updateClientes() {
var settings = {
    url: urlClienteU,
    async:       true,
    crossDomain: true,
    timeout:     0,      
    method:      "POST",
    "headers": {
                /*"Authorization": "Basic cm9vdDphZG1pbg==",*/
                "xr8-api-key"  : "ewf45r4435trge",
                "content-type" : "application/x-www-form-urlencoded",
                "cache-control": "no-cache",
    },
    data: {
    id_advance: $("#iduserupdate").val(),

    fecha1: $("#updateInputFecha1").val(),
    rfc1: $("#updateInputRfc1").val(),
    pais1: $("#updateInputPais1").val(),
    giro1: $("#updateInputgiro1").val(),

    first: $("#updateInputNombre").val(),
    second: $("#updateInputApellido").val(),
    email: $("#updateInputEmail").val(),
    tel: $("#updateInputTelefono").val(),
    rfc: $("#updateInputRfc").val(),
    curp: $("#updateInputCurp").val(),
    direccion: $("#updateInputDireccion").val(),
    },
}
let jqxhr1 = $.ajax(settings).done(function(data) {    
    $.each(data, function(i, val) {
    })
    }).fail(function(data, jqXHR, textStatus, errorThrown) {
        console.info("Run: all user loading error");
        xhrError(jqXHR, textStatus, errorThrown);
    }).always(function(data) {
        $("#updateModal").modal("hide")
        $("#allUser").fadeIn().empty()
        clearAll()
        loadXhr()
    })
}  
//--->  Delete
function deleteClientes() {
    var settings = {
      async: true,
      crossDomain: true,
      url: url_clientes_delete,
      method: "POST",
      headers: {
        "xr8-api-key": "ewf45r4435trge",
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache",
      },
      data: {
        id_advance: $("#iduserupdate").val(),
      },
    };
  
    //--->
    console.info("Run: user new xhr");
    $.ajax(settings)
      .done(function (data) {
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        //--->
        console.info("Run: error alluser");
        xhrError(jqXHR, textStatus, errorThrown);
      })
      .always(function () {
        $("#deleteModal").modal("hide")
        $("#allUser").fadeIn().empty()
        clearAll()
        loadXhr()
      });
}

function loadXhr(){
    console.log("%cXHR: %cmetales/detalles loadXhr", "color: red", "color: green");
    readeClientesAll() 
//--------------------->
}

function refreshXhr(){
    console.log("%cXHR: %cmetales/detalles refreshXhr", "color: red", "color: green");
    readeClientesAll() 
//--------------------->
}
/*****************************************************************
 *                              END                              *
 *                         FUNCTION XHR                          *
 *****************************************************************/
//END
 //--------------------------------------------------------------->