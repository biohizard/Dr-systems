//--------------------------------------------------------------->
//BEGIN
/*****************************************************************
 *                             BEGIN                             *
 *                            Metales                            *
 *****************************************************************/
 console.log("%cLoad File : %cMetales", "color: cyan", "color: yellow");

//---> Metales
$(function() {
  /*############################################################*/ 
        apiConecction()
            //--------------------->
            loadingMetales()
            //---------------------> 
            checkOnlyOne()
            btnDetallesCierres()
  /*############################################################*/
  })


/*solo un checkbox se puede seleccionar*/
function checkOnlyOne(){
  $(document).on('click', 'input[type="checkbox"]', function() {
      x = $('input[type="checkbox"]').not(this).prop('checked', false);

      let y = $(this).val();

      
      //--------------------->
      if ($('input[type="checkbox"]').is(':checked')){
        /*
        $("#user-resume,#user-update,#user-delete").attr("disabled",false)
        $("#iduserupdate").val($(this).attr("id"))

        clearAll()
        readeClientesOne($('input[name="idX"]:checked').attr("id"))
        */       
        $("#btnDetallesCierres").attr("disabled",false)
        
      } else {
        /*
        $("#user-resume,#user-update,#user-delete").attr("disabled",true)
        $("#iduserupdate").val(0)        
        */
        $("#btnDetallesCierres").attr("disabled",true)
      }
      //--------------------->
  })
}  
/*metales/detalles/?since=origin&id=*/
function btnDetallesCierres(){
  //id=btnDetallesCierres
  $("#btnDetallesCierres").on('click',function() { 
    let x = $('input[type="checkbox"]:checked').attr("id")
    window.location.href= url_base + "metales/detalles/?since=origin&id=" + x;
  })  

}
/*****************************************************************
 *                              END                              *
 *                         FUNCTION Metales                      *
 *****************************************************************/
//END
 //--------------------------------------------------------------->