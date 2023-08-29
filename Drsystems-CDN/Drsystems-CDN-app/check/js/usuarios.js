apiConecction();
/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log("Run file usuariosBorrar");

$(function() {
	/*
	###################################################
	#                    Begin :  User                #
	###################################################
	*/			
	//------------------------------------------------->
		//---> Load User
		console.info('Run: Load User');
		//1ft
		$("#b-nuew-user").attr("disabled","disabed");
		//1ft
		$("#btnUpdateUser").attr("disabled","disabed");
		//1ft
		$("#btnDeleteUser").attr("disabled","disabed");					
		allUser();	
    //------------------------------------------------->
  });

//------------------------------------------------->
function allUser(){
	var settings = {
	"url": url_user_all + "?id_advance=&a181a603769c1f98ad927e7367c7aa51=b326b5062b2f0e69046810717534cb09",
	"method": "GET",
	"timeout": 0,
	"headers": {
		"Authorization": "Basic cm9vdDphZG1pbg=="
	},
	};

	var jqxhr = $.getJSON(settings)
	.done(function (data){
		$("#allUser").empty()
		//--->
		$.each(data, function(i, val) {
			if (val.telefono == null) {telefono = "vacio"}else{telefono = val.telefono}
			if (val.puesto == null) {puesto = "vacio"}else{puesto = val.puesto}

				if (val.user == 'admin') {
					$("#allUser").fadeIn(3000).append("<tr class=\"text-center table-primary\"><th scope=\"row\">#</th><td class=\"text-capitalize\">"+val.user+"</td><td class=\"text-capitalize\">"+val.firstname+"</td><td class=\"text-capitalize\">"+val.secondname+"</td><td>"+val.email+"</td><td>"+telefono+"</td><td class=\"text-uppercase\">"+puesto+"</td></tr>");
					}else{
						$("#allUser").fadeIn(3000).append("<tr class=\"text-center\"><th scope=\"row\"><input name=\"idX\" type=\"checkbox\" class=\"idAcheckbox\" id=\""+val.id_advance+"\"></th><td class=\"text-capitalize\">"+val.user+"</td><td class=\"text-capitalize\">"+val.firstname+"</td><td class=\"text-capitalize\">"+val.secondname+"</td><td>"+val.email+"</td><td>"+telefono+"</td><td class=\"text-uppercase\">"+puesto+"</td></tr>");
						}
				

			})				
		//--->
		console.info('Run: all user checkbox only one')
		$('input[name="idX"]').on('click', function(){$('input[name="idX"]').not(this).prop("checked", false);});				

		$('input[name="idX"]').on('change', function() {
			id_advance = $(this).attr("id");

			$("#iduserupdate").val(id_advance);

			oneUser(id_advance);
			$("#user-update").prop("disabled",false);
			$("#user-delete").prop("disabled",false);
			})
		
			$("#user-update").prop("disabled",true);
			$("#user-delete").prop("disabled",true);
		//--->				
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
//------------------------------------------------->
function oneUser(id_advance){
//--->			
var settings = {
	"url": url_user_one + "?id_advance="+id_advance+"&a181a603769c1f98ad927e7367c7aa51=b326b5062b2f0e69046810717534cb09",
	"method": "GET",
	"timeout": 0,
	"headers": {
	  "Authorization": "Basic cm9vdDphZG1pbg=="
	},
};
  
  var jqxhr = $.getJSON(settings)
  .done(function (data){
	//--->
	$.each(data, function(i, val) {

		$("#updateInputUsuario").val(val.user);
		$("#usuariodelete").html(val.user);

		$("#updateInputPermiso").val(val.permissions).change();
		$("#updateInputEmail").val(val.email);
		
		$("#updateInputNombre").val(val.firstname);
		$("#updateInputApellido").val(val.secondname);
			$("#nombredelete").html(val.firstname + " " + val.secondname);

		$("#updateInputTelefono").val(val.telefono);
		$("#updateInputPuesto").val(val.puesto);
		
		})
	//--->			
  })
  .fail(function(jqXHR,textStatus,errorThrown){
	  console.info('Run: error alluser')
	  xhrError(jqXHR, textStatus , errorThrown);
  })
  .always(function(){
	  console.info('Run: allways alluser')        
  })

  console.warn(jqxhr)
//--->		
}