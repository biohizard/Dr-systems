/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log('Run: Login')

$(function(){
    clickSignin()
    clickDashboard()
})

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