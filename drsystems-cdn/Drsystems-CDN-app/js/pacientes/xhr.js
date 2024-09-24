
/*##### C #####*/
//------------------------------------------------->
function pacientesNewJqxhr(){
    console.log('Run: Paciente New Xhr')
        
    var settings = {
        "async"       : true,
        "crossDomain" : true,
        "url"         : urlBaseApi + 'pacientes/pacientesNew',
        "method"      : "POST",
        "headers": {
        "xr8-api-key" : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
        },"data": {
        "user"        : $("#nuusername").val(),
        "permissions" : 'pacientes',
        "email"       : $("#nuemail").val(),
        "password"    : $("#nupassword").val(),
        "first"       : $("#nufirstName").val(),
        "second"      : $("#nulastName").val(),
        "tel"         : $("#nuPhone").val(),
        "puesto"      : 'dr'
        }
    }

    var jqxhr = $.ajax(settings)
        .done(function (data){
            console.info('Run: close modal new xhr paciente')
            var miModal = document.getElementById('newModal');
            var modalInstance = bootstrap.Modal.getInstance(miModal); 
            if (!modalInstance) {
            modalInstance = new bootstrap.Modal(miModal);
            }
            modalInstance.hide();   
        })
        .fail(function(jqXHR,textStatus,errorThrown){
            console.info('Run: error alluser')
            xhrError(jqXHR, textStatus , errorThrown);
        })
        .always(function(){
            pacientesViewJqxhr()
            console.info('Run: Loadpacientes xhr')        
        })

    console.warn(jqxhr)
}
//------------------------------------------------->

/*##### R #####*/
//------------------------------------------------->
function pacientesViewJqxhr(){
    console.log('Run: Paciente View Xhr')
    $("#allUser").fadeOut(1000).empty()
    modalLoadShow()
          
    var settings = {
        url: urlBaseApi + "pacientes/pacientesView",
        method: "GET",
        timeout: 0,
        headers: {
        Authorization: "Basic cm9vdDphZG1pbg==",
        },
    };
    
    var jqxhr = $.getJSON(settings)
        .done(function (data){  
            //--->
                if(data == "null"){
                    $("#allUser").append("<tr><td>no hay pacientes</td></tr>")
                }else{
                    $.each(data, function (i, val){

                        if(val.user == "admin"){
                            a = "<td></td>" 
                        }else{
                            a = "<td><input type=\"checkbox\" name=\"\" value=\"" + val.id_advance + "\"></td>" 
                        }
                            $("#allUser")
                            .append(
                                "<tr>" +
                                "<td class=\"" + val.id_advance + " id\">" + val.id           + "</td>" +
                                "<td ><span class=\"" + val.id_advance + " first\">" + val.firstname + "</span> <span class=\"" + val.id_advance + " second\">" + val.secondname + "</span></td>" +
                                "<td class=\"" + val.id_advance + " email\">" + val.email     + "</td>" +
                                "<td class=\"" + val.id_advance + " nophone\">" + val.telefono+ "</td>" +
                                a +
                                "</tr>"
                            )

                    })
                }
            //--->
        })
        .fail(function (jqXHR, textStatus, errorThrown){
        console.info("Run: error alluser");
        xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function (jqXHR, textStatus, errorThrown){
            modalLoadHide()
            $("#allUser").fadeIn(1000)
        })

    console.warn(jqxhr);
}
//------------------------------------------------->

/*##### U #####*/
//------------------------------------------------->
function updatePacientesJqxhr(){
    console.log('Run: Paciente Update Xhr')
    var settings = {
        "async"       : true,
        "crossDomain" : true,
        "url"         : urlBaseApi + 'pacientes/pacientesUpdate',
        "method"      : "POST",
        "headers": {
        "xr8-api-key" : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
        },
        "data": {
        "id_advance"  : $("#id_advance").val(),
        "permissions" : 'paciente',
        "email"       : $("#uuemail").val(),
        "first"       : $("#uufirstName").val(),
        "second"      : $("#uulastName").val(),
        "tel"         : $("#uuPhone").val(),
        "puesto"      : 'drpacientes'
        }
    }

    var jqxhr = $.ajax(settings)
        .done(function (data){
            console.log('Run: update modal closed')
            var updateModal = document.getElementById('updateModal');
            var modalInstance = bootstrap.Modal.getInstance(updateModal)
            if (!modalInstance) {
            modalInstance = new bootstrap.Modal(updateModal);
            }
            modalInstance.hide();       
        })
        .fail(function(jqXHR,textStatus,errorThrown){
            console.info('Run: error alluser')
            xhrError(jqXHR, textStatus , errorThrown);
        })
        .always(function(){
            pacientesViewJqxhr()
            $("#btnUpdate,#btnDelete").prop('disabled',true)
            console.info('Run: Loadpacientes xhr')        
        })
    
    console.warn(jqxhr)
}
//------------------------------------------------->

/*##### D #####*/
//------------------------------------------------->
function pacientesDeleteJqxhr(){
    console.log('Run: Paciente Delete Xhr')
    var settings = {
        "async"       : true,
        "crossDomain" : true,
        "url"         : urlBaseApi + 'pacientes/pacientesDelete',
        "method"      : "POST",
        "headers": {
        "xr8-api-key" : "ewf45r4435trge",
        "content-type" : "application/x-www-form-urlencoded",
        "cache-control": "no-cache"
        },
        "data": {
        "id_advance"  : $("#id_advance").val()
        }
    }

    var jqxhr = $.ajax(settings)
        .done(function (data){
            console.log('Run: delete modal closed')
            var deleteModal = document.getElementById('deleteModal');
            var modalInstance = bootstrap.Modal.getInstance(deleteModal)
            if (!modalInstance) {
            modalInstance = new bootstrap.Modal(deleteModal);
            }
            modalInstance.hide();  
        })
        .fail(function(jqXHR,textStatus,errorThrown){
            console.info('Run: error alluser')
            xhrError(jqXHR, textStatus , errorThrown);
        })
        .always(function(){
            pacientesViewJqxhr()
            $("#btnUpdate,#btnDelete").prop('disabled',true)
            console.info('Run: Loadpacientes xhr')        
        })
    
    console.warn(jqxhr)
}
//------------------------------------------------->