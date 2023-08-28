 /*
 #############################################################################
 #                 Begin : New User                                          #
 #############################################################################
 */
console.log("Run file usuariosNuevo");

$(function() {
	/*
	###################################################
	#                 Begin : New User                #
	###################################################
	*/			
	//------------------------------------------------->
		console.info('Run: New User');
		$("#user-new").on('click', function() {
			$("#exampleInputUsuario").val("");
			newUserCheck();
		});

		$("#b-nuew-user").on('click', function() {
            $("#b-nuew-user").attr("disabled","disabed");
			newUser();
		});
    //------------------------------------------------->
  });

//------------------------------------------------->
function newUserCheck(){
	checkInput(val="exampleInputNombre",  val2="nombreHelp",   val3="Nombre (s) ejemplo Juan Carlos.")
	checkInput(val="exampleInputApellido",val2="apellidoHelp", val3="Apellido (s) ejemplo Hernandez Garcia.")
	checkInput(val="exampleInputPuesto",  val2="puestoHelp",   val3="Puesto de trabajo ejemplo vendedor, supervisor, mantenimiento.")
	checkInput(val="exampleInputTelefono",val2="telefonoHelp", val3="Telefono ejemplo 55 1050 2040")

	checkInput(val="exampleInputUsuario", val2="usuarioHelp",  val3="Usuario min 8 caracteres Alfanumericos A-Z a-z 1-0.")
	checkInput(val="exampleInputPassword",val2="passwordHelp", val3="Password min 8 caracteres Alfanumericos A-Z a-z 1-0.")
	
	checkSelect(val="exampleInputPermiso",val2="permisoHelp",  val3="Permiso para el manejo del sistema.")
	
	checkInput(val="exampleInputEmail",   val2="emailHelp",    val3="Email ejemplo usuario@gmai.com recuerda el email se ocupará para recuperación del password.")
	findUser(val="exampleInputUsuario", val2="usuarioHelp",  val3="Usuario min 8 caracteres Alfanumericos A-Z a-z 1-0.")
}	
//------------------------------------------------->
function checkInput(val,val2,val3){
	
	clearInput(val,val2,val3);

	$("#" + val).on('change', function() {
		if($(this).val() != ""){
			$("#"+val2).removeClass("text-muted").removeClass("text-success").removeClass("text-danger").addClass("text-success").html("Ok, este campo SI es valido");
			}else{
				$("#"+val2).removeClass("text-muted").removeClass("text-success").removeClass("text-danger").addClass("text-danger").html("Ok, este campo NO es valido, " + val3);
				}
		valInput()
	});
	
}	
//------------------------------------------------->
function checkSelect(val,val2,val3){
	$("#"+val).on('change', function() {
		if(
			$(this).val()         != 'null'
		){
			$("#b-nuew-user").attr("disabled",false);
			$("#permisoHelp").removeClass("text-muted").removeClass("text-success").removeClass("text-danger").addClass("text-success").html("Ok, este campo SI es valido");
			}else{
				$("#b-nuew-user").attr("disabled","disabed");
				$("#permisoHelp").removeClass("text-muted").removeClass("text-success").removeClass("text-danger").addClass("text-danger").html("Ok, este campo NO es valido, Permiso para el manejo del sistema.");
				}
	});

	$("#"+val).on('change', function() {
		if($(this).val()         != 'null'){
			$(this).css({"background-color": "rgb(232, 240, 254) !important;"});
			}else{
				$(this).css({"background-color": "rgb(255, 255, 255) !important;"});
				}
		valInput()
	});
}	
//------------------------------------------------->
function valInput(){
	if(
		empty($('#exampleInputNombre').val())   == false && 
		empty($('#exampleInputApellido').val()) == false && 
		empty($('#exampleInputPuesto').val())   == false && 
		empty($('#exampleInputEmail').val())    == false &&
		empty($('#exampleInputUsuario').val())  == false &&
		empty($('#exampleInputPassword').val()) == false &&
		empty($('#exampleInputTelefono').val()) == false &&
		      $("#exampleInputPermiso").val()   != null
	){
		$("#b-nuew-user").attr("disabled",false);
		}else{
			$("#b-nuew-user").attr("disabled","disabed");
			}
}
//------------------------------------------------->
function clearInput(val,val2,val3){
	$("#" + val).click(function(){
		$(this).val("")
		$("#"+val2).removeClass("text-muted").removeClass("text-success").removeClass("text-danger").addClass("text-danger").html("Ok, este campo NO es valido, " + val3);
		$("#b-nuew-user").attr("disabled","disabed");
	});
}
//------------------------------------------------->
function findUser(val,val2,val3){

	$("#" + val).on('change', function() {
		
		x =  $("#"+val).val()
		console.log("findUser")
		
		let settings = {
			"url": url_user_find + x + "&a181a603769c1f98ad927e7367c7aa51=68934a3e9455fa72420237eb05902327",
			"method": "GET",
			"timeout": 0,
			"headers": {
			  "Authorization": "Basic cm9vdDphZG1pbg=="
			}
		  }

		var jqxhr = $.ajax(settings)
		.done(function (response) {
			console.log(response);
			if(response){
				if(response[0].Existence == true){
					alert("El usuario " + x + " ya exite")
					$("#exampleInputUsuario").val("")
					$("#usuarioHelp").removeClass("text-muted").removeClass("text-success").removeClass("text-danger").addClass("text-danger").html("Ok, este campo NO es valido, " + val3);
				}else{}
			}else{}
		})
		.fail(function(jqXHR,textStatus,errorThrown){
			console.info('Run: error alluser')
			xhrError(jqXHR, textStatus , errorThrown);
		})
		.always(function(){
			console.info('Run: allways alluser')			
		})

        console.warn(jqxhr)

	})
}
//------------------------------------------------->
function newUser(){
    var settings = {
        "async"       : true,
        "crossDomain" : true,
        "url"         : url_user_new,
        "method"      : "POST",
        "headers": {
        "xr8-api-key" : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
        },"data": {
        "user"        : $("#exampleInputUsuario").val(),
        "permissions" : $("#exampleInputPermiso").val(),
        "email"       : $("#exampleInputEmail").val(),
        "password"    : $("#exampleInputPassword").val(),
        "first"       : $("#exampleInputNombre").val(),
        "second"      : $("#exampleInputApellido").val(),
        "tel"         : $("#exampleInputTelefono").val(),
        "puesto"      : $("#exampleInputPuesto").val()
        }
    }

    var jqxhr = $.ajax(settings)
    .done(function (data){
        console.info('Run: reload alluser')
        allUser();
        $("#exampleModal").modal('hide');
        $("#exampleInputNombre,#exampleInputApellido,#exampleInputPuesto,#exampleInputTelefono,#exampleInputUsuario,#exampleInputPassword,#exampleInputPermiso,#exampleInputEmail").val("");
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