
$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('select').material_select();
    
});
function init(){
    listarPacientes();
    
}

function listarPacientes() {
    $.getJSON("../ajax/receptores.php?op=listar2",function(data){
        var datos='';
        $.each(data,function(key,valor){
            datos+='<div class="row">';
            datos+='<div class="col s12">';
            datos+='<div class="card">';
            datos+='<div class="card-image  waves-block waves-light"">';
            datos+='<img class="activator class="responsive-img" height="200" src="../files/fotos_receptores/'+ valor.foto +' ">';
            datos+='<a class="btn-floating halfway-fab waves-effect waves-light #e53935 red darken-1" id="agregarBtn"><i class="material-icons">favorite</i>5</a>'
            datos+='<a class="btn-floating halfway-fab waves-effect waves-light red left"><i class="material-icons">share</i></a>';
            datos+='</div>';
            datos+='<div class="card-content">';
            datos+='<a  class="card-title activator grey-text text-darken-4">' + valor.nom + ' ' + valor.ap + '<i class="material-icons right">more_vert</i></a>';
            datos+='</div>';
            datos+='<div class="card-reveal">';
            datos+='<span class="card-title grey-text text-darken-4">' + valor.nom + ' ' + valor.ap + '<i class="material-icons right">close</i></span>';
            datos+='<p>'+valor.desc+'</p>';
            datos+='<div class="center-align">';
            datos+='<form method="POST" action="pacienteView.php">';
            datos+='<input name="idVal" id="idVal" type="hidden" value="'+valor.id+'">';
            datos+=valor.boton;
            datos+='<a class="btn halfway-fab waves-effect waves-light #e53935 red darken-1" id="saberMasBtn" href="pacienteView.php">Saber más</a>';
            datos+='</form>';
            datos+='<a class="btn halfway-fab waves-effect waves-light #e53935 red darken-1" id="agregarBtn">Donar</a>';
            datos+='</div>';
            datos+='</div>';
            datos+='</div>';
            datos+='</div>';
            datos+='</div>';
        });
        $('#peticionesDiv').append(datos);
    });
  }
  
  init();

