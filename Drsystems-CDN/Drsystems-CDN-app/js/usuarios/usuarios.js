console.log('Run: Usuarios')
/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
$(function(){
    usuariosNew()
})

//------------------------------------------------->
function usuariosView(){
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