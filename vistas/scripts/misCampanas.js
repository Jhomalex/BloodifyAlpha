function init(){
  listarCampanas();
}
function listarCampanas() {
   idDon=$('#donanteD').val();
   $.getJSON("../ajax/receptores.php?op=mostrar2",function(data){
       var datos='';
       $.each(data,function(key,valor){
         datos+='<form>'
         datos+='<div class="row">';
         datos+='<div class="col s12 #263238 blue-grey darken-4" id="campañasCol">';
         datos+='<p class="flow-text">Campaña para:</p>';
         datos+='<h4>'+valor.nomRec+" " +valor.apRec+'</h4>';
         datos+='<div class="col s6 center">';
         datos+='<p class="flow-text">Necesita: '+valor.necRec+' u.</p>';
         datos+='</div>';
         datos+='<div class="col s6 center">';
         datos+='<p class="flow-text">Progreso: '+valor.progRec+' u.</p>';
         datos+='</div></div>';
         datos+='<div class="col s12">';
         datos+='<a class="btn right z-depth-0 waves-effect col s4" onclick="descativarCampana('+valor.idRec+') id="idRec">DAR DE BAJA</a>';
         datos+='</div></div></div>';
         datos+='</form>';
       });
       $('#campañasDiv').html(datos);
   });
 }


 function descativarCampana(id){
    $.post("../ajax/receptores.php?op=desactivar",{idRec:id},function(e){
    var $toastContent = $('<span>'+e+'</span>').add($('<button class="btn-flat toast-action">Desliza</button>'));
        Materialize.toast($toastContent, 10000)
    });
    $('#campanasDiv').html("");
    listarCampanas();
}

 init();