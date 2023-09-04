/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log('Run: Logout')

$(function(){
    clickSignin()
    timeUrl()
})

//------------------------------------------------->
function clickSignin(){
    $("#b_signin").on('click',function(varFunction){
        location.replace('../')
    })
}
//------------------------------------------------->

//------------------------------------------------->
function timeUrl(){
    valUrl =  $("#url").val();
    setTimeout( function(){window.location.href=valUrl},1000);
}
//------------------------------------------------->