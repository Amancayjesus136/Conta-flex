$('#switch_evaluacion').change(function () {
  if ($(this).is(':checked')) {
    $('#notas').removeClass('d-none');
  } else {
    $('#notas').addClass('d-none');
  }
})

$("#sede_evento_todos").click(function(){
  if($("#sede_evento_todos").is(':checked') ){
    $("#sede_evento > option").prop("selected","selected");
    $("#sede_evento").trigger("change");
  }else{
    $("#sede_evento > option").removeAttr("selected");
    $("#sede_evento").trigger("change");
  }
});