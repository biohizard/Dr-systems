/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log('Run: Login')

$(function(){
    clickSignin()
    clickDashboard()
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

//------------------------------------------------->
function clickDashboard(){
    $("#b_dashboard").on('click',function(varFunction){
        location.replace('../dashboard/')
    })
}
//------------------------------------------------->