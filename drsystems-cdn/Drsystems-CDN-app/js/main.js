console.log("%c Load Js DR Systems ", "font-size:30px");
console.log('Run: Main')

/*==============================================
                Error XHR jQ
==============================================*/
function xhrError(jqXHR, textStatus, errorThrown) {
    let failTxt;

    switch (jqXHR.status) {
        case 0:
            failTxt = `Not connection Verify Network [ Not Network ]. ${textStatus}`;
            break;
        case 200:
            failTxt = `Requested page Ok [200]. ${textStatus}`;
            break;
        case 404:
            failTxt = `Requested page not found [404]. ${textStatus}`;
            break;
        case 500:
            failTxt = `Internal Server Error [500]. ${textStatus}`;
            break;
        default:
            switch (errorThrown) {
                case 'parsererror':
                    failTxt = `Requested JSON parse failed [ Json Fail ]. ${textStatus}`;
                    break;
                case 'timeout':
                    failTxt = `Time out error [   ]. ${textStatus}`;
                    break;
                case 'abort':
                    failTxt = `Ajax request aborted [ XHR aborted ]. ${textStatus}`;
                    break;
                default:
                    failTxt = `Uncaught Error [ Fail ]. ${jqXHR.responseText}`;
                    break;
            }
            break;
    }

    console.log(`App: Msg XHR (AEx000002 [${failTxt}] ).`);
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
    $checks.click(function () {
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
        case typeof (e) == "undefined":
            return true;
        default:
            return false;
    }
}

function makeid(length) {
    var result = [];
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result.push(characters.charAt(Math.floor(Math.random() *
            charactersLength)));
    }
    return result.join('');
}

let host = location.href
    const myArray = host.split("/");
    if(myArray[2] == "localhost"){
        /** URLS */
        var dominioBase = "//localhost/server/2023/Dr-systems/"
        var urlBaseApi  = dominioBase + "drsystems-api/index.php/"
    }else{
        /** URLS */
        var dominioBase = "//siats.mx/dr-systems/"
        var urlBaseApi  = dominioBase + "drsystems-api/"
    }
