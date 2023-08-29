/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log("Run file usuariosBorrar");

$(function() {
	/*
	###################################################
	#                 Begin : Delete User             #
	###################################################
	*/			
	//------------------------------------------------->
    //---> Delete User
    console.info('Run: Delete User');    
    $("#user-delete").on('click', function() {
        $("#btnDeleteUser").attr("disabled",false);    
    });	
    
    $('#updateModal').on('hidden.bs.modal', function (e) {
        $("#btnDeleteUser").attr("disabled","disabed");
    })

    $("#btnDeleteUser").on('click', function() {
        $("#btnDeleteUser").attr("disabled","disabed");
        deleteUser();
    });	
    //------------------------------------------------->
  });

//------------------------------------------------->
function deleteUser(){

    var settings = {
        "async"       : true,
        "crossDomain" : true,
        "url"         : url_user_delete,
        "method"      : "POST",
        "headers": {
        "xr8-api-key" : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
        },"data": {
        "id_advance"  : $("#iduserupdate").val(),
        }
    }

    var jqxhr = $.ajax(settings)
    .done(function (data){
        $("#deleteModal").modal('hide');
        allUser();                        
    })
    .fail(function(jqXHR,textStatus,errorThrown){
        console.info('Run: error alluser')
        xhrError(jqXHR, textStatus , errorThrown);
    })
    .always(function(){
        console.info('Run: allways alluser')        
    })

    console.warn(jqxhr)
}