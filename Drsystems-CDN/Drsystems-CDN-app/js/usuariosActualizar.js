 /*
 #############################################################################
 #                Begin : Update User                                        #
 #############################################################################
 */
console.log("Run file usuariosActualizar");

$(function() {
	/*
	###################################################
	#                 Begin : Delete User             #
	###################################################
	*/			
	//------------------------------------------------->
    //---> Delete User
    console.info('Run: Delete User');    
    $("#user-update").on('click', function() {
        $("#btnUpdateUser").attr("disabled",false);    
    });	
    
    $('#deleteModal').on('hidden.bs.modal', function (e) {
        $("#btnUpdateUser").attr("disabled","disabed");
    })

    $("#btnUpdateUser").on('click', function() {
        $("#btnUpdateUser").attr("disabled","disabed");
        updateUser()
    });	
    //------------------------------------------------->
  });

//------------------------------------------------->
function updateUser(){
    var settings = {
        "async"       : true,
        "crossDomain" : true,
        "url"         : url_user_update,
        "method"      : "POST",
        "headers": {
        "xr8-api-key" : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
        },"data": {
        "id_advance"  : $("#iduserupdate").val(),
        "user"        : $("#updateInputUsuario").val(),
        "permissions" : $("#updateInputPermiso").val(),
        "email"       : $("#updateInputEmail").val(),
        "password"    : $("#updateInputPassword").val(),
        "first"       : $("#updateInputNombre").val(),
        "second"      : $("#updateInputApellido").val(),
        "tel"         : $("#updateInputTelefono").val(),
        "puesto"      : $("#updateInputPuesto").val()

        }
    }

    var jqxhr = $.ajax(settings)
    .done(function (data){
        allUser();
        $("#updateModal").modal('hide');                       
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