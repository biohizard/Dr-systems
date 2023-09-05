/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log('Run: Log Error')

$(function(){
    clickSignin()
    timeUrl()
})

//------------------------------------------------->
function timeUrl(){
    valUrl =  $("#url").val();
    setTimeout( function(){window.location.href=valUrl},1000);
}
//------------------------------------------------->

//------------------------------------------------->
function clickSignin(){
    $("#b_signin").on('click',function(varFunction){
        location.replace('../')
    })
}
//------------------------------------------------->