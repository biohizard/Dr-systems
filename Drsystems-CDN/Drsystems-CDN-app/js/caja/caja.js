console.info("Run: File Caja");
$(document).ready(function () {
/*############################################################*/
  console.log("B " + 20 + " : " + "Entrada Salida");

  //--------------------------------------------------------------------------->  
  apiConecction();
//--------------------------------------------------------------------------->

   console.info("Run: Entrada Salida");
   
//--------------------------------------------------------------------------->
    //---> Begin: All Caja
    fechaIid = $("#start").val();
    allCaja(fechaIid);
    btnCancelar();
    cajaResumen();
//--------------------------------------------------------------------------->

//--------------------------------------------------------------------------->
    //-----> Begin: Reload  All Caja
    $("#start").change(function(){
      console.log("Run change fecha");
      fechaIid = $(this).val()
      allCaja(fechaIid);
      btnCancelar();
      cajaResumen();
    });
//--------------------------------------------------------------------------->  

//--------------------------------------------------------------------------->
    //-----> Begin: Reload  All Caja
    $("#reloadCaja").click(function () {
      console.log("Run click allcaja");
      fechaIid = $("#start").val();
      allCaja(fechaIid);
      btnCancelar();
      cajaResumen();
    });  
//--------------------------------------------------------------------------->
  
//--------------------------------------------------------------------------->
   $("#btnNewEntradaSalida").click(function (varFunction) {
     console.info("Disable button save");
     let type = "entradasalida"
     //-----> begin:  nuevo saldo inicial
     newSaldoinicial(type);

     $("#b-new-caja,#cajaCerrar").hide().attr("disabled","disabed");
     $("#idOperacion").val(Math.floor(Math.random() * (1000000 - 1)) + 1)
     
     /*
    |->TOOLCAJA.JS
    |----- inputNuevodisabled()
    |
    */     
    inputNuevodisabled()
    /*
    |->TOOLCAJA.JS
    |----- utilityUltimafecha()
    |
    */     
    utilityUltimafecha()

    //----->
    //)
    $("#buscador").click(function(){    
      $(this).val("")
      $("#nombreHelp").removeClass("text-muted")
      $("#nombreHelp").fadeIn().html('La Nombre es obligatoria para poder avanzar.').addClass("text-danger")
    })
    //----->
    
    $("#buscador").attr('disabled','disabled');

    //a) desabilita los imput
    $("#caja-nuevoFecha").val(" ")
  
    //----->
      $("#buscador").change(function () {
        if($(this).val() != "" ){
          $("#nombreHelp").removeClass("text-muted").removeClass("text-danger").fadeIn().html('El nombre es correcto.').addClass("text-success");
  
          //activa el boton de guardar
          //f)
          //f-1)
          inputNuevoenabled()
          //f-2)
          validarInput()
          
  
          }else{} 
      })    
    //----->
    
    //------------------------------------------------------------>
   });
//--------------------------------------------------------------------------->   

//--------------------------------------------------------------------------->
   $("#saldoinicial-create").click(function (varFunction) {
    console.info("Disable button save");
    let type = "inicial"
    //-----> begin:  nuevo saldo inicial
    newSaldoinicial(type);
    $("#b-new-caja,#cajaCerrar").hide().attr("disabled","disabed");
    $("#idOperacion").val(Math.floor(Math.random() * (1000000 - 1)) + 1)
    
    /*
   |->TOOLCAJA.JS
   |----- inputNuevodisabled()
   |
   */     
   inputNuevodisabled()
   /*
   |->TOOLCAJA.JS
   |----- utilityUltimafecha()
   |
   */     
   utilityUltimafecha()

   //----->
   //)
   $("#buscador").click(function(){    
     $(this).val("")
     $("#nombreHelp").removeClass("text-muted")
     $("#nombreHelp").fadeIn().html('La Nombre es obligatoria para poder avanzar.').addClass("text-danger")
   })
   //----->
   
   $("#buscador").attr('disabled','disabled');

   //a) desabilita los imput
   $("#caja-nuevoFecha").val(" ")
 
   //----->
     $("#buscador").change(function () {
       if($(this).val() != "" ){
         $("#nombreHelp").removeClass("text-muted").removeClass("text-danger").fadeIn().html('El nombre es correcto.').addClass("text-success");
 
         //activa el boton de guardar
         //f)
         //f-1)
         inputNuevoenabled()
         //f-2)
         validarInput()
         
 
         }else{} 
     })    
   //----->

   //------------------------------------------------------------>
  });
//--------------------------------------------------------------------------->

 /*
 ##########################################################
 #                 Begin : ONLY ONE                       #
 #########################################################
 */
 
 //----->
 //)
 $("#caja-nuevoFecha").change(function () {
  nuevaFechainput($(this).val())     
})

//----->
//)
$("#caja-nuevoFecha").click(function(){    
  $(this).val("")
  $("#fechaHelp").removeClass("text-muted");
  $("#fechaHelp").fadeIn().html('La fecha es obligatoria para poder avanzar.').addClass("text-danger");
  $("#buscador").attr('disabled','disabled')
})

/*
|->TOOLCAJA.JS
|----- autoComplete()
|
*/         
autoComplete()

//validarInput()

$("#b-new-caja").on('click',function(){
  $("#b-new-caja,#cajaCerrar").hide().attr('disabled','disabled');
  validarInput()
  //newRegistrocaja()
})

/*
##########################################################
#                 End : ONLY ONE                         #
#########################################################
*/

/*############################################################*/
});