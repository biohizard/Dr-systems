console.log('Run: Usuarios')
/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
$(function(){
    usuariosView()
    usuariosNew()
})

//------------------------------------------------->
function usuariosView(){
	var settings = {
	"url": "http://localhost/server/2023/Dr-systems/Drsystems-API/index.php/user/userView",
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
        /*
        <tr>
        <td>1</td>
        <td>Jorge Rodriguez</td>
        <td>Admin</td>
        <td>jorge@luxza.com</td>
        <td>5515067867</td>
        <td><input type="checkbox" name="" id=""></td>
        </tr>


        "id": "1",
        "id_advance": "U-03fb5ca7539c770b6b",
        "time": "2020-07-14 11:07:47",
        "activo": "true",
        "user": "admin",
        "permissions": "admin",
        "email": "admin@gtvsa.com",
        "firstname": "Admin",
        "secondname": "Root",
        "telefono": "00001111",
        "puesto": "admin",
        "Message": "Datasuccessful"        
        */
        $("#allUser").fadeIn(3000).append("<tr><td>" + val.id + "</td><td>" + val.firstname + " " + val.secondname + "</td><td>" + val.user + "</</td><td>" + val.email + "</td><td>" + val.telefono + "</td><td><input type=\"checkbox\" name=\" \" id=\"" + val.id_advance + "\"></td></tr>");
        
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
}
//------------------------------------------------->

//------------------------------------------------->
function usuariosNew(){
    console.log('Run: Usuarios New')
    $("#btnGneUser").on( "click", function(){
        usuariosNewSave()
    })
}
function usuariosNewSave(){
    console.log('Run: Usuarios New Save')
        $("#newModal").removeAttr("class","show")
        $("#newModal").attr("style","")
        $("#newModal").attr("class","modal fade")
        $("#newModal").attr("role","")
        $( ".modal-backdrop" ).remove();
}
//------------------------------------------------->