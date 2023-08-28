console.log("%c Load Js GTV ", "font-size:30px");
/*==============================================
                Error XHR jQ                 
==============================================*/
function xhrError(jqXHR, textStatus, errorThrown) {
    if (jqXHR.status === 0) {
        fail_txt = "Not connection Verify Network [  Not Network ]. " + textStatus;
        } else if (jqXHR.status == 200) {
            fail_txt = "Requested page Ok [200]. " + textStatus;
            } else if (jqXHR.status == 404) {
                fail_txt = "Requested page not found [404]. " + textStatus;
                } else if (jqXHR.status == 500) {
                    fail_txt = "Internal Server Error [500]. " + textStatus;
                    } else if (exception === 'parsererror') {
                        fail_txt = "Requested JSON parse failed [  Json Fail ]. " + textStatus;
                        } else if (exception === 'timeout') {
                            fail_txt = "Time out error [   ]. " + textStatus;
                            } else if (exception === 'abort') {
                                fail_txt = "Ajax request aborted [  XHR aborted ]. " + textStatus;
                                } else {
                                    fail_txt = "Uncaught Error [  Fail  ]. " + jqXHR.responseText;
                                        }
    console.log("App: Msg XHR (AEx000002 [" + fail_txt + "] ).");
}
/*==============================================
                Error XHR jQ                 
==============================================*/

/*==============================================
                Var Empty                 
==============================================*/
function isEmpty(val) {
    return (val === undefined || val == null || val.length <= 0) ? true : false;
}
/*==============================================
                Var Empty                 
==============================================*/

function checkBoxOne() {
    var $checks = $('input[type="checkbox"]');
    $checks.click(function() {
        $checks.not(this).prop("checked", false);
    });
}

function empty(e) {
    switch (e) {
        case "":
        case 0:
        case "0":
        case null:
        case false:
        case typeof(e) == "undefined":
            return true;
        default:
            return false;
    }
}

function makeid(length) {
    var result           = [];
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result.push(characters.charAt(Math.floor(Math.random() * 
        charactersLength)));
    }
    return result.join('');
}