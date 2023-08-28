//--------------------------------------------------------------->
//BEGIN
/*****************************************************************
 *                             BEGIN                             *
 *                         FUNCTION XHR                          *
 *****************************************************************/
console.log("%cLoad File : %cbtndetalles", "color: cyan", "color: yellow");

//---> Create User
function clickModalCreateUser(){
    $("#user-create").on('click',function() { 
        $("#b-nuew-user").attr("disabled",false)
    })
}
function btnCreateUser(){
    $("#b-nuew-user").on('click',function() { 
        $("#b-nuew-user").attr("disabled","disabed")
        createClientes()
    })
}

//---> Update User
function clickModalUpdateUser(){
    $("#user-update").on('click',function() { 
        $("#btnUpdateUser").attr("disabled",false)
    })
}
function btnUpdateUser(){
    $("#btnUpdateUser").on('click',function() {
        $("#btnUpdateUser").attr("disabled","disabed")
        updateClientes()
    })
}

//---> Delete User
function clickModalDeleteUser(){
    $("#user-delete").on('click',function() {
        $("#btnDeleteUser").attr("disabled",false)
    })
}
function btnDeleteUser(){
    $("#btnDeleteUser").on('click',function() {
        $("#btnDeleteUser").attr("disabled","disabed")
        deleteClientes()
    })
}

//---> Resume User
function btnResume(){
    $("#user-resume").on('click',function() {

    })
}

  //---> Delete User


/*****************************************************************
 *                              END                              *
 *                         FUNCTION XHR                          *
 *****************************************************************/
//END
 //--------------------------------------------------------------->