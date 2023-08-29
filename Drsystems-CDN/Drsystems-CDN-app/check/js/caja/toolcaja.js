console.info("Run: File Tool Caja");

/*
|->TOOLCAJA.JS
|----- autoComplete()
|
*/
function autoComplete() {
    console.info("Run: Aautocomplete");
    //--->
    $("#buscador").autocomplete({
      minLength: 4,
      delay: 100,
      source: function (req, add) {
        // XMLHttpRequest --->
        $.getJSON(urlBuscadorAutocomplete, req, function (data) {
          var suggestions = [];
          $.each(data, function (i, val) {
            if (val.Buscador == "Error") {
              suggestions.push({
                id: "Error 101",
                value: "Busqueda fallida",
              });
            } else {
              suggestions.push({
                id: val.id_advance,
                value: val.firstname + " " + val.secondname,
              });
            }
          });
          add(suggestions);
        });
      },
      select: function (event, ui) {
        $("#result").val(" ").val(ui.item.id);
      },
    });
    //--->
}

// desabilita los imput
function inputNuevodisabled(){
    $("#buscador,#caja-notas,#caja-concepto,#caja-monto").val("");
    $("#buscador,#caja-notas,#caja-concepto,#caja-tipo,#caja-tipo,#caja-monto").attr('disabled','disabled');
  
    $("#buscador,#caja-notas,#caja-concepto,#caja-monto").click(function () {$(this).val("")})
  }
// Habilita los imput
function inputNuevoenabled(){
$("#buscador,#caja-notas,#caja-concepto,#caja-tipo,#caja-tipo,#caja-monto").attr('disabled',false);
}

function newSaldoinicial(type) {

   //<option value="inicial">Inicial</option>
    if(type == "inicial"){
      $("#caja-tipo").empty().append(" <option value=\"null\">- Opciones -</option><option value=\"inicial\">Inicial</option>")
    }else if(type == "entradasalida"){
      $("#caja-tipo").empty().append(" <option value=\"null\">- Opciones -</option><option value=\"entrada\">Entrada</option><option value=\"salida\">Salida</option>")
    }else{
      $("#caja-tipo").empty().append(" <option value=\"null\">- Opciones -</option>")
    }

}
