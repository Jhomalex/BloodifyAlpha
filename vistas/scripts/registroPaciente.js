$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  closeOnSelect: false // Close upon selecting a date,
});
$(document).ready(function() {
  $('select').material_select();
});   

function init(){
  $("#formularioRec").on("submit",function(e)
  {
    guardaryeditarRec(e);
  })
    selectTS();
    selectCM();
}

function selectTS(){
  $.post("../ajax/receptores.php?op=selectTipoDeSangre",function (r){
    $('#tsangreRec').append(r);
//		$('#tsangreRec').selectpicker('render');
//    $('#tsangreRec').selectpicker('refresh');
    });
}

function selectCM(){
    $.post("../ajax/receptores.php?op=selectCentroMedico",function (r){
    $('#cMedicoRec').html(r);
//		$('#tipoSangre').selectpicker('render');
//		$('#tipoSangre').selectpicker('refresh');
  });
}

function guardaryeditarRec(e)
{
  e.preventDefault();
  var miData = new FormData($('#formularioRec')[0]);
  $.ajax({
      type:"POST",
      url:"../ajax/receptores.php?op=guardaryeditar",
      data:miData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(result){
        var $toastContent = $('<span>'+result+'</span>').add($('<button class="btn-flat toast-action">Desliza</button>'));
        Materialize.toast($toastContent, 10000);
        location.href="body.php";
      }
  });
}

init();