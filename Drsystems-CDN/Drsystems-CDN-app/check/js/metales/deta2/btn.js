/*##########################################################################
____________________________   
\______   \__    ___/\      \  
 |    |  _/ |    |   /   |   \ 
 |    |   \ |    |  /    |    \
 |______  / |____|  \____|__  /
        \/                  \/ 
##########################################################################*/
function Btn(){
    console.log("%c Load Js GTV BTN ","color:#FA2A00; font-size:24px")
    btnRefreshTabs()

    btnCierre()
    btnUpdateCierre()
    btnDeleteCierre()

    btnModalEntregas()
}
/*########################################################################*/

/*##########################################################################
_______________ __________  ____________________.___________    _______    _________
\_   _____/    |   \      \ \_   ___ \__    ___/|   \_____  \   \      \  /   _____/
 |    __) |    |   /   |   \/    \  \/ |    |   |   |/   |   \  /   |   \ \_____  \ 
 |     \  |    |  /    |    \     \____|    |   |   /    |    \/    |    \/        \
 \___  /  |______/\____|__  /\______  /|____|   |___\_______  /\____|__  /_______  /
     \/                   \/        \/                      \/         \/        \/ 
##########################################################################*/

    /**************** Cierre ********************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function btnCierre(){
            $("#btnGenerarCierre").on('click',function() {
                console.log("%cBTN:   %cCIERRES/Cierre btn cierre", "color: blue", "color: yellow");
                xhrsaveDataCierre()
            })
        }
        /************************************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function btnUpdateCierre(){
            $("#updateCierre").on('click',function(){
                xhrUpdateCierre()
            })
        }
        /************************************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function btnDeleteCierre(){
            $("#deleteCierre").on('click',function(){
                xhrDeleteCierre()
            })
        }
        /************************************/

    /**************** Cierre ********************/

    /**************** Entregas ********************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function btnModalEntregas(){
            console.log("%cTOOLS:  %c Modal Entregas","color: cyan","color: pink");
            $("#btnMenuEntregas").on('click',function(){
                loadingVale()
            })
        }
        /************************************/

    /**************** Entregas ********************/


/*########################################################################*/

/*##########################################################################
            ___.            __________               __  .__                     
  ________ _\_ |__          \______   \ ____  __ ___/  |_|__| ____   ___________ 
 /  ___/  |  \ __ \   ______ |       _//  _ \|  |  \   __\  |/    \_/ __ \_  __ \
 \___ \|  |  / \_\ \ /_____/ |    |   (  <_> )  |  /|  | |  |   |  \  ___/|  | \/
/____  >____/|___  /         |____|_  /\____/|____/ |__| |__|___|  /\___  >__|   
     \/          \/                 \/                           \/     \/       
##########################################################################*/

    /**************** Cierre ********************/

        /**
        * Function     
        * @author      biohizard
        * @description {}
        * @param       {}
        * @return      {}
        **/
        /************************************/
        function btnRefreshTabs(){
            console.log("%cTOOLS:  %c Refresh Tabs","color: cyan","color: pink");
            $("#btnMenuRefresh").on('click',function(){refreshXhr()})
        }
        /************************************/

    /**************** Cierre ********************/

    /**************** Entregas ********************/

    /**************** Entregas ********************/

/*########################################################################*/