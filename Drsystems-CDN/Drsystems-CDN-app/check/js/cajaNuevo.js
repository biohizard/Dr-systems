 /*
 #############################################################################
 #                 Begin : New User                                          #
 #############################################################################
 */
console.log("Run file cajaNuevo");

$(function() {
	/*
	###################################################
	#                 Begin : New User                #
	###################################################
	*/			
    //------------------------------------------------->

    $("#btnNewEntradaSalida").on('click',function(varFunction){
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
    
      $("#b-new-caja").on('click',function(){
        $("#b-new-caja,#cajaCerrar").hide().attr('disabled','disabled');
        validarInput()
        //newRegistrocaja()
    })

    //------------------------------------------------->
})

//------------------------------------------------->    
function autoComplete(){
    console.info("Run: Aautocomplete");
    //--->
    $("#buscador").autocomplete({
      minLength: 4,
      delay: 100,
      source: function (req, add) {
        // XMLHttpRequest --->
        $.getJSON(urlBuscadorAutocomplete, req, function (data) {
          var suggestions = [];
          $.each(data, function (i, val) {
            if (val.Buscador == "Error") {
              suggestions.push({
                id: "Error 101",
                value: "Busqueda fallida",
              });
            } else {
              suggestions.push({
                id: val.id_advance,
                value: val.firstname + " " + val.secondname,
              });
            }
          });
          add(suggestions);
        });
      },
      select: function (event, ui) {
        $("#result").val(" ").val(ui.item.id);
      },
    });
    //--->
}
function inputNuevodisabled(){
    $("#buscador,#caja-notas,#caja-concepto,#caja-monto").val("");
    $("#buscador,#caja-notas,#caja-concepto,#caja-tipo,#caja-tipo,#caja-monto").attr('disabled','disabled');
  
    $("#buscador,#caja-notas,#caja-concepto,#caja-monto").click(function () {$(this).val("")})
}
function inputNuevoenabled(){
    $("#buscador,#caja-notas,#caja-concepto,#caja-tipo,#caja-tipo,#caja-monto").attr('disabled',false);
}
function newSaldoinicial(type){

   //<option value="inicial">Inicial</option>
    if(type == "inicial"){
      $("#caja-tipo").empty().append(" <option value=\"null\">- Opciones -</option><option value=\"inicial\">Inicial</option>")
    }else if(type == "entradasalida"){
      $("#caja-tipo").empty().append(" <option value=\"null\">- Opciones -</option><option value=\"entrada\">Entrada</option><option value=\"salida\">Salida</option>")
    }else{
      $("#caja-tipo").empty().append(" <option value=\"null\">- Opciones -</option>")
    }

}