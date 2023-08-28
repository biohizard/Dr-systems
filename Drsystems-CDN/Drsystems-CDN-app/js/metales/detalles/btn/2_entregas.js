function loadingVale(typeX) {
    //--->
    console.log("%cXHR: %cloadinngVale", "color: red", "color: green");
    
    if(typeX == "unica"){
        x_id="input_eu_nvale"
    }else if(typeX == "nueva"){
        x_id="input_emnvaleE1"
    }else if(typeX == "entrega"){
        x_id="input_novale"
    }else if(typeX == "cierresimple"){
        x_id="save_vale_cs"
    }else if(typeX == "save_cierredos"){
        x_id="save_cierredos"
}

    let jqxhr = $.getJSON(urlValeR + "/?name=novale&type=actual", function(data) {
        })
        .done(function(data) {
            $.each(data, function(i, val) {

                if(val.detail_id_advance == null){

                    }else{

                        }
                $("#"+x_id).val(parseInt(val.id)+1)

                })
        })
        .fail(function(data, jqXHR, textStatus, errorThrown) {
            //--->
            console.info("Run: all user loading error");
            xhrError(jqXHR, textStatus, errorThrown);
        })
        .always(function(data) {
//                $("#input_cs_precio").val($('.'+$('input[type="checkbox"]').val()+'.precio').html())
        })
        //--->  
}
function clsEntrega(){

    $("#input_nolext,#input_grsaf,#input_novale").val("0");
    $("#input_barra,#input_ley,#input_fino").val(" ");
}
