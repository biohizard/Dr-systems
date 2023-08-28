//-------------------------------------------------------------------->
console.log("%cLoad File : %centregamultiple", "color: cyan", "color: yellow");
/********************************/
/*          ENTREGA MULTIPLE    */
/********************************/
function clickModalEntregaMultiple(){
    $("#btnentregasMultipleModal").on('click',function() {
        let typeX = "multiple"
        loadingVale(typeX)
    })
}

function btnEntregaMultiple(){
    $("#btnGenerarEntregaMultiple").on('click',function() {    
        /*
            input_cm_fino
            input_cm_precio
            input_cm_importe
            input_cm_total
            input_cm_pagos
            input_cm_saldo
            input_cs_observaciones
        */
       /*
        let emfecha = $("#input_emfecha").val();
        let emnvale = $("#input_emnvale").val();
        let emnoext = $("#input_emnoext").val();

        let emAntesf =[]; 
        $(".input_emAntesf").each(function(){
            emAntesf.push($(this).val());
        })
        
        let emGrs =[]; 
        $(".input_emGrs").each(function(){
            emGrs.push($(this).val());
        })
        
        let emLey =[]; 
        $(".input_emLey").each(function(){
            emLey.push($(this).val());
        })
        
        let emFinos =[]; 
        $(".input_emFinos").each(function(){
            emFinos.push($(this).val());
        })

        */
       let idEntrega = $('input[type="checkbox"]').val();

       let emFinos =[]; 
       $(".input_cm_fino").each(function(){
           emFinos.push($(this).val());
       })
       let emPrecio =[]; 
       $(".input_cm_precio").each(function(){
           emPrecio.push($(this).val());
       })
       let emImporte =[]; 
       $(".input_cm_importe").each(function(){
           emImporte.push($(this).val());
       })       

       let emTotal =[]; 
       $(".input_cm_total").each(function(){
           emTotal.push($(this).val());
       })
       let emPagos =[]; 
       $(".input_cm_pagos").each(function(){
           emPagos.push($(this).val());
       })
       let emSaldo =[]; 
       $(".input_cm_saldo").each(function(){
           emSaldo.push($(this).val());
       })                     

       let emObservaciones =[]; 
       $(".input_cs_observaciones").each(function(){
           emObservaciones.push($(this).val());
       })  

        saveMultipleEntrega(idEntrega,emFinos,emPrecio,emImporte,emTotal,emPagos,emSaldo,emObservaciones)
        
    })
}
//-------------------------------------------------------------------->
//-------------------------------------------------------------------->
function plusEntrada(){
    console.log("Run: plusEntrada")
    $("#plusEntrega").on('click',function(){
    let x = makeid(5);
        var large =
            '<!-- Begin: cierres no ' + x + '-->'+
            '<div class="cmItem  row col-10 offset-1 shadow-lg p-3 mb-5 bg-body rounded">'+
            '    <div class="col-2 offset-10 text-right text-danger text-xl"><i class="cmIBtn btnDeleteEntregas ' + x + ' bi bi-dash-circle-fill"></i></div>'+
            '    <!--Begin:-->'+
            '    <div class="col-12" >'+
            '      <h5 class="text-capitalize">cierres</h5>'+
            '      <div class="row">'+
            '        <div class="col-6">'+
            '          <div class="mb-3">'+
            '            <label for="firstName">Fino/Pza</label>'+
            '            <input type="text" class="form-control 1" id="input_cs_fino" placeholder="" value="" required="">'+
            '            <div class="invalid-feedback">Fino/Pza</div>'+
            '          </div>'+
            '          <div class="mb-3">'+
            '            <label for="firstName">Precio</label>'+
            '            <input type="text" class="form-control 1" id="input_cs_precio" placeholder="" value="" required="">'+
            '            <div class="invalid-feedback">Precio</div>'+
            '          </div> '+
            '        </div>'+
            '        <div class="col-6">'+
            '          <div class="mb-3">'+
            '            <label for="firstName">Importe</label>'+
            '            <input type="text" class="form-control 1" id="input_cs_importe" placeholder="" value="" required="" disabled>'+
            '            <div class="invalid-feedback">Importe</div>'+
            '          </div>   '+
            '        </div> '+
            '      </div>'+
            '    </div>'+
            '    <div class="col-12" >'+
            '      <h5 class="text-capitalize">pagos</h5>'+
            '      <div class="row">'+
            '        <div class="col-6">'+
            '          <div class="mb-3">'+
            '            <label for="firstName">total</label>'+
            '            <input type="text" class="form-control 1" id="input_cs_total" placeholder="" value="" required="" data-toggle="tooltip" data-placement="top" title=" = importe">'+
            '            <div class="invalid-feedback">Total Unico.</div>'+
            '          </div>'+
            '          <div class="mb-3">'+
            '            <label for="firstName">pagos</label>'+
            '            <input type="text" class="form-control 1" id="input_cs_pagos" placeholder="" value="" required="">'+
            '            <div class="invalid-feedback">Pago Unico.</div>'+
            '          </div>'+
            '        </div>'+
            '        <div class="col-6">'+
            '          <div class="mb-3">'+
            '            <label for="firstName">saldo</label>'+
            '            <input type="text" class="form-control 1" id="input_cs_saldo" placeholder="" value="" required="" data-toggle="tooltip" data-placement="top" title="saldo actual + total - pago" disabled>'+
            '            <div class="invalid-feedback">Saldo Unico.</div>'+
            '          </div>'+
            '        </div>'+
            '        <div class="col-12">'+
            '          <div class="mb-3">'+
            '           <label for="firstName">observaciones</label>'+
            '            <textarea name="textarea" rows="2" cols="50" class="form-control 1" id="input_cs_observaciones" data-placement="top" title=""></textarea>'+
            '            <div class="invalid-feedback">Saldo Unico.</div>'+
            '          </div>  '+
            '        </div>'+
            '      </div>'+
            '    </div>'+
            '    <!--End:-->'+
            '</div>'+
            '<!-- End: cierres no' + x + '-->'
        ;
        $("#multiEntregas").append(large)
        btnDeleteEntregas()
    })
}
//-------------------------------------------------------------------->