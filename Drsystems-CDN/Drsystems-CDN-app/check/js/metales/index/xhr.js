//--------------------------------------------------------------->
//BEGIN
/*****************************************************************
 *                             BEGIN                             *
 *                         FUNCTION XHR                          *
 *****************************************************************/
 console.log("%cLoad File : %cxhr", "color: cyan", "color: yellow");

//---> Delete User

function   loadingMetales(){
    //--->
    
      
      $("#loadingMetales").fadeOut().empty().fadeIn()
      
      let jqxhr = $.ajax(urlMetalesR + "?type=only_one",function (data) {
        console.log("Run: Cierres")
      })
      .done(function(data) {
          //--->
          $.each(data, function (i, val) {

            clientes_id = parseInt(val.id);
  
            //x >1,=1,<9,=9   x = 1...9                      0009
            if( clientes_id       == 1  || clientes_id   <= 9){
              detail_cliente_id = "000" + val.id           
            //x >= 10 and x x == 99 x = 10...99     0099
            }else if(clientes_id  == 10  || clientes_id  <= 99){
              detail_cliente_id = "00" +val.id;
            //x >= 100 and x x == 999 x = 100...999 0999
            }else if(clientes_id  == 100 || clientes_id  <= 999){
              detail_cliente_id = "0" + val.id
            //x >= 1000 x = 1000 .... °°            9999
            }else if(clientes_id  >= 1000){
              detail_cliente_id =val.id;
            }else{detail_cliente_id = val.id}
            /*###################*/
            
            $("#loadingMetales")
              .fadeIn(3000)
              .append(
                  '<tr>' +
                    '<th scope="row"><input type="checkbox" class="idAdvance" id="' + val.id_advance+'"></th>' +
                    '<td> ' + detail_cliente_id + '</td>'                                                      +
                    '<td class=\'text-capitalize\'> ' + val.firstname + ' ' + val.secondname +'</td>'          +
                    '<td> ' + val.telefono + '</td>'                                                           +
                    '<td> $' + val.s_saldo_actual + '</td>'                                                           +
                  '</tr>'   
              );
          })
          //--->
      })        
      .fail(function (data,jqXHR, textStatus, errorThrown) {
        //--->
        console.info("Run: all user loading error");
        xhrError(jqXHR, textStatus, errorThrown);
      })
      .always(function (data) {
        //--->
        console.info("Run: all user always");
      })
    //--->  
  }
//---> Delete User

/*****************************************************************
 *                              END                              *
 *                         FUNCTION XHR                          *
 *****************************************************************/
//END
 //--------------------------------------------------------------->