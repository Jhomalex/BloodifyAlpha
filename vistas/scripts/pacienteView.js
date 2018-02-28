function init(){
  var var1= $("#idPagAnterior").attr("value");
  mostrarPac(var1);
  verificarDonacion();
  $("#FormDonacion").on("submit",function(e)
   {
    donacion(e);
   })
}

function mostrarPac(id){
   $.post('../ajax/receptores.php?op=mostrarPac',{idRec:id},function(data,status){
		data=JSON.parse(data);
      $("#nomPac").html(data.nombre+" "+data.apellido);
      $("#quienEs").html(data.descripcion);
      $("#quePaso").html(data.caso);
      $("#horarioPac").html(data.horaCM);
      document.getElementById("perfilPacienteView").src = "../files/fotos_receptores/"+data.foto;
      $('#mapaDiv').append(data.ubicacionCM);
   });
 }

 function donacion(e){
  e.preventDefault();
   var miData = new FormData($('#FormDonacion')[0]);
   $.ajax({
       type:"POST",
       url:"../ajax/donacion.php?op=guardaryeditar",
       data:miData,
       cache:false,
       contentType:false,
       processData:false,
       success:function(result){
         var $toastContent = $('<span>'+result+'</span>').add($('<button class="btn-flat toast-action">Desliza</button>'));
         Materialize.toast($toastContent, 10000);
         verificarDonacion();
       }
   });
 }

 function verificarDonacion(){
   
   idRec=$('#receptorD').val();
   idDon=$('#donanteD').val();
   $.post("../ajax/donacion.php?op=verificarDonacion",
   {
      'receptorD':idRec,
      'donanteD':idDon
   },
   function (data){
      data=JSON.parse(data);
      if(data!="null"){
        if(data.estado=='1'){
          $("#donarBtn"+idRec).prop("disabled",true);
        }
      }
   })
 }

 init();