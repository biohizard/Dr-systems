console.log("Load Js  Clientes");
$(function() {
/*############################################################*/ 
      apiConecction()
          //--------------------->
          loadXhr()

          //--------------------->
          clickModalCreateUser()
          btnCreateUser()

          clickModalUpdateUser()
          btnUpdateUser()

          clickModalDeleteUser()
          btnDeleteUser()
                    
          btnResume()
          //--------------------->
          $("#b-nuew-user").attr("disabled","disabed")

          //--------------------->
          checkOnlyOne()

/*############################################################*/
})

/*tools */
//--------------------------------------------------------------->
/*solo un checkbox se puede seleccionar*/
function checkOnlyOne(){
  $(document).on('click', 'input[type="checkbox"]', function() {
      x = $('input[type="checkbox"]').not(this).prop('checked', false);

      let y = $(this).val();

      
      //--------------------->
      if ($('input[type="checkbox"]').is(':checked')){

        $("#user-resume,#user-update,#user-delete").attr("disabled",false)
        $("#iduserupdate").val($(this).attr("id"))

        clearAll()
        readeClientesOne($('input[name="idX"]:checked').attr("id"))

      } else {
        $("#user-resume,#user-update,#user-delete").attr("disabled",true)
        $("#iduserupdate").val(0)        
      }
      //--------------------->
  })
}
function clearAll() {
  //create cliente clear
  $("#exampleInputFecha1,#exampleInputRfc1,#exampleInputPais1,#exampleInputgiro1,#exampleInputNombre,#exampleInputApellido,#exampleInputEmail,#exampleInputTelefono,#exampleInputRfc,#exampleInputCurp,#exampleInputDireccion").val("")
  //update cliente clear
  $("#updateInputFecha1,#updateInputRfc1,#updateInputPais1,#updateInputgiro1,#updateInputNombre,#updateInputApellido,#updateInputEmail,#updateInputTelefono,#updateInputRfc,#updateInputCurp,#updateInputDireccion").val("")
    
  $("#resumenInputFecha1,#resumenInputRfc1,#resumenInputPais1,#resumenInputgiro1,#resumenInputNombre,#resumenInputRfc,#resumenInputCurp,#resumenInputDireccion,#resumenInputTelefono,#resumenInputEmail").html("-Loading-")
}