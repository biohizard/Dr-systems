/*
 #############################################################################
 #                 Begin : Delete User                                       #
 #############################################################################
*/
console.log('Run: Logout')

$(function(){
    clickSignin()
})

//------------------------------------------------->
function clickSignin(){
    $("#b_signin").on('click',function(varFunction){
        location.replace('../')
    })
}
//------------------------------------------------->