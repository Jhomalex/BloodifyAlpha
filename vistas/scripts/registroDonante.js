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
   $("#formularioDon").on("submit",function(e)
   {
      guardaryeditarDon(e);
   })
   selectTS();
 }
 
 function selectTS(){
  $.post("../ajax/receptores.php?op=selectTipoDeSangre",function (r){
    $('#tsangreDon').html(r);
    });
}
 
 function guardaryeditarDon(e)
 {
   e.preventDefault();
   var miData = new FormData($('#formularioDon')[0]);
   $.ajax({
       type:"POST",
       url:"../ajax/donantes.php?op=guardaryeditar",
       data:miData,
       cache:false,
       contentType:false,
       processData:false,
       success:function(result){
         var $toastContent = $('<span>'+result+'</span>').add($('<button class="btn-flat toast-action">Desliza</button>'));
         Materialize.toast($toastContent, 10000);
         // location.href="login.php";
       }
   });
 }
 
 init();