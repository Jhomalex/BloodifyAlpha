
function init(){
   listarCM();
}


function listarCM() {
   $.getJSON("../ajax/cmedico.php?op=listar2",function(data){
       var datos='';
       $.each(data,function(key,valor){
           datos+='<div class="row">';
           datos+='<div class="col tCM s12 center">';
           datos+='<h5>'+valor.nom+'</h5>';
           datos+='</div>';
           datos+=valor.ub;
           datos+='</div>';
       });
       $('#centrosM').append(datos);
   });
 }
 
   
 init();

