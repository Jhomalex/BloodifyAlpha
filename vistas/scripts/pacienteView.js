function init(){
  
}

function mostrarPac(id){
   $.post('../ajax/receptores.php?op=mostrarPac',{idRec:id},function(data,status){
		data=JSON.parse(data);
      $("#perro").html(data.nombre+" "+data.apellido);
      $("#quienEs").html(data.descripcion);
      $("#quePaso").html(data.caso);
      $("#horarioPac").html(data.horario);
   })
 }
 $( "#target" ).click(function() {
  alert( "Handler for .click() called." );
});

 init();