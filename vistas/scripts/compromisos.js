
$(document).ready(function(){
   $(".button-collapse").sideNav();
   $('select').material_select();
   $('.modal').modal();
});
function init(){
   listarCompromisos();
}


function listarCompromisos() {
   idDon=$('#donanteD').val();
   $.getJSON("../ajax/donacion.php?op=listar",function(data){
       var datos='';
       $.each(data,function(key,valor){
         datos+='<div class="row">';
         datos+='<div class="col s9 #d32f2f red darken-2" id="backRed">';
         datos+='<div class="col offset-2">';
         datos+='<h4>Código</h4>';
         datos+='<h5>'+valor.codRec+'</h5>';
         datos+='</div></div>';
         datos+=valor.estado;
         datos+='<div class="col #9e9e9e grey s12 center" id="backWhite">';
         datos+='<span class="flow-text col s12"><b>Paciente: </b>'+valor.nomRec+" "+valor.apRec+'</span>';
         datos+='<span class="flow-text col s12"><b>Centro Médico: </b>'+valor.cMedico+'</span>';
         datos+='</div></div>';
         datos+='<div id="modalDesactivar'+valor.idD+'" class="modal bottom-sheet">';
         datos+='<div class="modal-content">';
         datos+='<h5>¿Desea cancelar la donación?</h5>';
         datos+='<p>Cancele la donación si usted no podrá acudir al cento médico para relizarla.</p>';
         datos+='</div>';
         datos+='<div class="modal-footer">';
         datos+='<a onclick="desactivarDonac('+valor.idD+')" class="modal-action modal-close waves-effect waves-green btn-flat">Sí deseo cancelar</a>';
         datos+='<a class="modal-action modal-close waves-effect waves-green btn-flat">No deseo cancelar</a>';
         datos+='</div></div>';
       });
       $('#compromisosDiv').html(datos);
   });
 }

function desactivarDonac(id){
   $.post("../ajax/donacion.php?op=desactivar",{idD:id},function(e){
      var $toastContent = $('<span>'+e+'</span>').add($('<button class="btn-flat toast-action">Desliza</button>'));
         Materialize.toast($toastContent, 10000)
   });
   $('#compromisosDiv').html("");
   listarCompromisos();
}
   
 init();

